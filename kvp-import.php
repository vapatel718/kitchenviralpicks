<?php
/**
 * KVP Article Importer
 * Reads formatted .md files, parses YAML front matter, and creates/updates WordPress posts.
 *
 * Run with: wp eval-file wp-content/themes/kvp-theme/kvp-import.php
 */

define( 'KVP_CONTENT_DIR', '/Users/varunpatel/Documents/KVP-Content/formatted-contents /' );

$import_files = [
	KVP_CONTENT_DIR . 'cosori-turboblaze-air-fryer-review.md',
	KVP_CONTENT_DIR . 'ninja-air-fryer-5-qt-af141-review.md',
];

foreach ( $import_files as $filepath ) {
	kvp_import_article( $filepath );
}

// ---------------------------------------------------------------------------

function kvp_import_article( string $filepath ): void {
	$filename = basename( $filepath );

	if ( ! file_exists( $filepath ) ) {
		WP_CLI::error( "File not found: {$filename}", false );
		return;
	}

	$raw = file_get_contents( $filepath );

	// Split on opening --- and closing ---
	if ( ! preg_match( '/^---\n(.*?)\n---\n(.*)$/s', $raw, $parts ) ) {
		WP_CLI::error( "Could not parse YAML front matter in: {$filename}", false );
		return;
	}

	$fields       = kvp_parse_yaml( $parts[1] );
	$post_content = trim( $parts[2] );

	$title = $fields['title'] ?? '';
	if ( empty( $title ) ) {
		WP_CLI::error( "No title found in: {$filename}", false );
		return;
	}

	// Find existing post by exact title to avoid duplicates
	global $wpdb;
	$existing_id = $wpdb->get_var(
		$wpdb->prepare(
			"SELECT ID FROM {$wpdb->posts}
			 WHERE post_title = %s
			   AND post_type = 'post'
			   AND post_status != 'trash'
			 LIMIT 1",
			$title
		)
	);

	$post_data = [
		'post_title'   => $title,
		'post_content' => $post_content,
		'post_status'  => 'publish',
		'post_type'    => 'post',
	];

	if ( $existing_id ) {
		$post_data['ID'] = (int) $existing_id;
		$post_id         = wp_update_post( $post_data, true );
		$action          = 'Updated';
	} else {
		$post_id = wp_insert_post( $post_data, true );
		$action  = 'Created';
	}

	if ( is_wp_error( $post_id ) ) {
		WP_CLI::error(
			sprintf( 'Failed to %s "%s": %s', strtolower( $action ), $title, $post_id->get_error_message() ),
			false
		);
		return;
	}

	// Write all supported meta fields
	$meta_keys = [
		'kvp_price',
		'kvp_rating',
		'kvp_review_count',
		'kvp_verdict_line',
		'kvp_amazon_url',
		'kvp_buy_if',
		'kvp_skip_if',
		'kvp_pros',
		'kvp_cons',
		'kvp_specs',
		'kvp_final_verdict',
		'kvp_best_for',
		'kvp_skip_if_detail',
	];

	foreach ( $meta_keys as $key ) {
		if ( array_key_exists( $key, $fields ) ) {
			update_post_meta( $post_id, $key, $fields[ $key ] );
		}
	}

	// Assign category if front matter includes kvp_category slug
	if ( ! empty( $fields['kvp_category'] ) ) {
		$term = get_term_by( 'slug', $fields['kvp_category'], 'category' );
		if ( $term ) {
			wp_set_post_categories( $post_id, [ $term->term_id ], false );
		} else {
			WP_CLI::warning( "Category slug '{$fields['kvp_category']}' not found — category not assigned for: {$filename}" );
		}
	}

	WP_CLI::success( sprintf( '%s: "%s" (Post ID: %d)', $action, $title, $post_id ) );
}

// ---------------------------------------------------------------------------

/**
 * Minimal YAML parser for KVP front matter.
 *
 * Handles:
 *   - Scalar fields:  key: value  or  key: "quoted value"
 *   - Block lists:    kvp_pros:\n  - item   → joined with \n
 *   - Block maps:     kvp_specs:\n  Key: Val → stored as "Key|Val" joined with \n
 */
function kvp_parse_yaml( string $yaml ): array {
	$result       = [];
	$lines        = explode( "\n", $yaml );
	$current_key  = null;
	$current_type = null; // 'list' or 'map'
	$buffer       = [];

	foreach ( $lines as $line ) {
		if ( trim( $line ) === '' ) {
			continue;
		}

		// Child line: list item "  - value"
		if ( preg_match( '/^  - (.+)$/', $line, $m ) ) {
			if ( $current_key !== null ) {
				if ( $current_type === null ) {
					$current_type = 'list';
				}
				$buffer[] = trim( $m[1] );
			}
			continue;
		}

		// Child line: map entry "  Key: Value" (two-space indent, starts with letter)
		if ( preg_match( '/^  ([A-Za-z][^:]*): (.+)$/', $line, $m ) ) {
			if ( $current_key !== null ) {
				if ( $current_type === null ) {
					$current_type = 'map';
				}
				$buffer[] = trim( $m[1] ) . '|' . trim( $m[2] );
			}
			continue;
		}

		// Any top-level line — flush the current block first
		if ( $current_key !== null && ! empty( $buffer ) ) {
			$result[ $current_key ] = implode( "\n", $buffer );
		}
		$current_key  = null;
		$current_type = null;
		$buffer       = [];

		// Scalar:  key: value
		if ( preg_match( '/^([a-zA-Z_][a-zA-Z0-9_]*): (.+)$/', $line, $m ) ) {
			$result[ $m[1] ] = trim( $m[2], '"' );
			continue;
		}

		// Block key with no inline value:  key:
		if ( preg_match( '/^([a-zA-Z_][a-zA-Z0-9_]*):$/', $line, $m ) ) {
			$current_key = $m[1];
			continue;
		}
	}

	// Flush final block if file ends while still in a block
	if ( $current_key !== null && ! empty( $buffer ) ) {
		$result[ $current_key ] = implode( "\n", $buffer );
	}

	return $result;
}
