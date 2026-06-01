<?php
/**
 * KitchenViralPicks Theme Functions
 */

// ─── THEME SETUP ───────────────────────────────────────────────
function kvp_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption' ) );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'kvp-theme' ),
        'footer'  => __( 'Footer Menu', 'kvp-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'kvp_theme_setup' );

// ─── ENQUEUE STYLES & FONTS ────────────────────────────────────
function kvp_enqueue_assets() {
    wp_enqueue_style(
        'tabler-icons',
        'https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.31.0/dist/tabler-icons.min.css',
        array(),
        '3.31.0'
    );
    // Main stylesheet (self-hosted @font-face declared inside style.css)
    wp_enqueue_style(
        'kvp-style',
        get_stylesheet_uri(),
        array(),
        '20260513'
    );
}
add_action( 'wp_enqueue_scripts', 'kvp_enqueue_assets' );

// ─── DEQUEUE CONFLICTING WP STYLES ─────────────────────────────
add_action('wp_enqueue_scripts', function() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('classic-theme-styles');
}, 100);
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);


// ─── KVP REVIEW META BOX ───────────────────────────────────────

function kvp_review_meta_box_register() {
    add_meta_box(
        'kvp_review_fields',
        __( 'KVP Review Fields', 'kvp-theme' ),
        'kvp_review_meta_box_render',
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'kvp_review_meta_box_register' );

function kvp_review_meta_box_render( $post ) {
    wp_nonce_field( 'kvp_review_save', 'kvp_review_nonce' );

    $fields = [
        'kvp_product_name'   => [ 'label' => 'Product name (card display title)',  'type' => 'text'     ],
        'kvp_rating'         => [ 'label' => 'Rating (e.g. 4.8)',              'type' => 'text'     ],
        'kvp_review_count'   => [ 'label' => 'Review count (e.g. 19,265)',      'type' => 'text'     ],
        'kvp_price'          => [ 'label' => 'Price (e.g. ~$89.87)',            'type' => 'text'     ],
        'kvp_best_for'       => [ 'label' => 'Best for',                        'type' => 'text'     ],
        'kvp_skip_if_detail' => [ 'label' => 'Skip if (one-line summary)',      'type' => 'text'     ],
        'kvp_verdict_line'   => [ 'label' => 'Verdict line (one sentence)',     'type' => 'textarea' ],
        'kvp_card_verdict'   => [ 'label' => 'Card verdict snippet (1–2 sentences, shown on archive/homepage cards)', 'type' => 'text'     ],
        'kvp_verdict'        => [ 'label' => 'Card verdict (longer summary paragraph for archive cards)', 'type' => 'textarea' ],
        'kvp_amazon_url'     => [ 'label' => 'Amazon affiliate URL',            'type' => 'url'      ],
        'kvp_buy_if'         => [ 'label' => 'Buy if (one item per line)',      'type' => 'textarea' ],
        'kvp_skip_if'        => [ 'label' => 'Skip if (one item per line)',     'type' => 'textarea' ],
        'kvp_pros'           => [ 'label' => 'Pros (one item per line)',        'type' => 'textarea' ],
        'kvp_cons'           => [ 'label' => 'Cons (one item per line)',        'type' => 'textarea' ],
        'kvp_specs'          => [ 'label' => 'Specs (Label: Value, one per line)', 'type' => 'textarea' ],
        'kvp_final_verdict'  => [ 'label' => 'Final verdict paragraph',        'type' => 'textarea' ],
    ];

    echo '<table class="form-table" style="width:100%;">';

    foreach ( $fields as $key => $field ) {
        $value = get_post_meta( $post->ID, $key, true );
        echo '<tr>';
        echo '<th style="width:200px;padding:12px 10px;vertical-align:top;">';
        echo '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] ) . '</label>';
        echo '</th>';
        echo '<td style="padding:8px 10px;">';

        if ( 'textarea' === $field['type'] ) {
            echo '<textarea id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" rows="5" style="width:100%;font-family:monospace;font-size:13px;">' . esc_textarea( $value ) . '</textarea>';
        } elseif ( 'url' === $field['type'] ) {
            echo '<input type="url" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '" style="width:100%;" />';
        } else {
            echo '<input type="text" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '" style="width:100%;" />';
        }

        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
}

function kvp_review_meta_box_save( $post_id ) {
    if ( ! isset( $_POST['kvp_review_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['kvp_review_nonce'] ) ), 'kvp_review_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $text_fields = [
        'kvp_product_name',
        'kvp_rating',
        'kvp_review_count',
        'kvp_price',
        'kvp_best_for',
        'kvp_skip_if_detail',
        'kvp_card_verdict',
    ];

    $textarea_fields = [
        'kvp_verdict_line',
        'kvp_verdict',
        'kvp_buy_if',
        'kvp_skip_if',
        'kvp_pros',
        'kvp_cons',
        'kvp_specs',
        'kvp_final_verdict',
    ];

    foreach ( $text_fields as $key ) {
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
        }
    }

    foreach ( $textarea_fields as $key ) {
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, $key, sanitize_textarea_field( wp_unslash( $_POST[ $key ] ) ) );
        }
    }

    if ( isset( $_POST['kvp_amazon_url'] ) ) {
        update_post_meta( $post_id, 'kvp_amazon_url', esc_url_raw( wp_unslash( $_POST['kvp_amazon_url'] ) ) );
    }
}
add_action( 'save_post', 'kvp_review_meta_box_save' );

// ─── HELPERS ───────────────────────────────────────────────────
function kvp_split_lines( $raw ) {
	return array_filter( array_map( 'trim', preg_split( '/\r?\n/', (string) $raw ) ) );
}

// Price registry: reads from WP options (kvp_price_{key}) with post-meta fallback.
// To update a price site-wide: wp option update kvp_price_{key} "~$XX.XX"
function kvp_get_price( $key, $post_meta_fallback = 'kvp_price', $post_id = null ) {
	$option_key = 'kvp_price_' . $key;
	$price      = get_option( $option_key, '' );
	if ( ! $price && $post_id ) {
		$price = get_post_meta( $post_id, $post_meta_fallback, true );
	}
	if ( ! $price ) {
		return '';
	}
	$price = ltrim( trim( $price ), '~$' );
	return '~$' . esc_html( $price );
}

// Maps post slugs to canonical price registry keys. Add new slugs here when articles are published.
function kvp_get_price_key( $post_id ) {
	$slug = get_post_field( 'post_name', $post_id );
	$map  = [
		'cosori-turboblaze-air-fryer-review'                               => 'cosori_turboblaze',
		'instant-pot-vortex-plus-6qt-air-fryer-review'                     => 'instant_vortex_plus',
		'nordic-ware-half-sheet-pan-review'                                => 'nordic_ware_half_sheet_pan',
		'cuisinart-chefs-classic-enameled-cast-iron-dutch-oven-review-2026' => 'cuisinart_dutch_oven',
		'ninja-bn701-professional-plus-blender-review-2026'                => 'ninja_blender_bn701',
		'kitchenaid-artisan-5qt-stand-mixer-review-2026'                   => 'kitchenaid_artisan_5qt',
		'instant-pot-7-5qt-rio-wide-review-2026'                           => 'instant_pot_rio',
		'lodge-essential-enamel-braiser-review-2026'                       => 'lodge_enamel_braiser',
		'cosori-electric-kettle-1-7l-review-2026'                          => 'cosori_electric_kettle',
		'tramontina-12-inch-frying-pan-review'                             => 'tramontina_frying_pan',
		'carote-19-piece-pots-and-pans-set-review'                         => 'carote_pots_pans',
		'ninja-air-fryer-5-qt-review'                                      => 'ninja_air_fryer_5qt',
		'air-fryers-under-100-most-reviewed'                               => 'ninja_af101',
	];
	return isset( $map[ $slug ] ) ? $map[ $slug ] : '';
}

// Remove featured image from article body — image is output manually in score bar via single.php
add_filter( 'the_content', 'kvp_remove_featured_from_content', 5 );
function kvp_remove_featured_from_content( $content ) {
    if ( is_single() && has_post_thumbnail() ) {
        $thumb_id  = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_url( $thumb_id, 'full' );
        $medium_url = wp_get_attachment_image_url( $thumb_id, 'medium' );
        $large_url  = wp_get_attachment_image_url( $thumb_id, 'large' );
        // Strip any <img> tag referencing this attachment
        $content = preg_replace( '/<img[^>]+' . preg_quote( parse_url( $thumb_url, PHP_URL_PATH ), '/' ) . '[^>]*>/i', '', $content );
        $content = preg_replace( '/<img[^>]+' . preg_quote( parse_url( $medium_url, PHP_URL_PATH ), '/' ) . '[^>]*>/i', '', $content );
        $content = preg_replace( '/<img[^>]+' . preg_quote( parse_url( $large_url, PHP_URL_PATH ), '/' ) . '[^>]*>/i', '', $content );
        // Also strip wrapping <figure> or <p> that may be left empty
        $content = preg_replace( '/<figure[^>]*>\s*<\/figure>/i', '', $content );
        $content = preg_replace( '/<p>\s*<\/p>/i', '', $content );
    }
    return $content;
}
