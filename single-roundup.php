<?php
/**
 * Template Name: Roundup Article
 * Template Post Type: post
 * Description: Template for multi-product roundup articles
 */

get_header();
?>

<div class="kvp-roundup">

<style>
/*
 * Roundup Article Template — styles scoped to .kvp-roundup
 *
 * Custom fields referenced in this template:
 * kvp_roundup_methodology
 * kvp_toppick_name, kvp_toppick_reason, kvp_toppick_price, kvp_toppick_btn_label, kvp_toppick_url
 * kvp_p1_name, kvp_p1_price, kvp_p1_reviews, kvp_p1_rating, kvp_p1_capacity, kvp_p1_bestfor
 * kvp_p1_position_label, kvp_p1_image_url, kvp_p1_review_count, kvp_p1_buyer_says
 * kvp_p1_complaint, kvp_p1_who_its_for, kvp_p1_btn_label, kvp_p1_btn_url, kvp_p1_btn_type
 * (kvp_p2_ through kvp_p5_ follow the same pattern)
 * kvp_scenario_small, kvp_scenario_large, kvp_scenario_budget, kvp_scenario_toprated
 * kvp_decision_guide, kvp_final_verdict, kvp_verdict_btn_label, kvp_verdict_btn_url
 */

.kvp-roundup {
	max-width: 800px;
	margin: 0 auto;
	padding: 0 16px 64px;
	font-family: var(--font-body);
	color: var(--color-text);
}

/* ---- Hero ---- */
.kvp-roundup .rnd-hero {
	padding: 32px 0 24px;
	border-bottom: 1px solid rgba(26, 26, 26, 0.1);
}
.kvp-roundup .rnd-title {
	font-family: var(--font-heading);
	font-size: 1.9rem;
	line-height: 1.2;
	color: var(--color-text);
	margin: 0 0 14px;
}
.kvp-roundup .rnd-byline {
	font-size: 0.875rem;
	color: #555; /* no CSS var available */
	margin: 0 0 16px;
}
.kvp-roundup .rnd-ftc {
	background: var(--color-background);
	border-left: 3px solid var(--color-accent);
	padding: 10px 14px;
	font-size: 0.8rem;
	color: #555; /* no CSS var available */
	margin: 0 0 16px;
	border-radius: 2px;
}
.kvp-roundup .rnd-methodology {
	font-size: 0.9rem;
	color: #555; /* no CSS var available */
	margin: 0 0 12px;
	line-height: 1.6;
}
.kvp-roundup .rnd-jump-link {
	display: inline-block;
	font-size: 0.875rem;
	color: var(--color-primary);
	text-decoration: underline;
}
.kvp-roundup .rnd-jump-link:hover {
	color: var(--color-accent);
}

/* ---- Section headings ---- */
.kvp-roundup .rnd-section-heading {
	font-family: var(--font-heading);
	font-size: 1.4rem;
	color: var(--color-text);
	margin: 0 0 18px;
	padding-bottom: 8px;
	border-bottom: 2px solid var(--color-primary);
}

/* ---- Comparison table ---- */
.kvp-roundup .rnd-table-section {
	margin: 36px 0;
}
.kvp-roundup .rnd-table-wrap {
	overflow-x: auto;
	-webkit-overflow-scrolling: touch;
}
.kvp-roundup .rnd-compare-table {
	width: 100%;
	border-collapse: collapse;
	font-size: 0.82rem;
	min-width: 520px;
}
.kvp-roundup .rnd-compare-table th {
	background: var(--color-primary);
	color: var(--color-white);
	padding: 10px 10px;
	text-align: left;
	font-family: var(--font-body);
	font-weight: 700;
	white-space: nowrap;
}
.kvp-roundup .rnd-compare-table td {
	padding: 10px 10px;
	border-bottom: 1px solid rgba(26, 26, 26, 0.08);
	vertical-align: middle;
}
.kvp-roundup .rnd-compare-table tr:nth-child(even) td {
	background: rgba(255, 248, 245, 0.7); /* no CSS var available */
}
.kvp-roundup .rnd-compare-table a {
	color: var(--color-primary);
	text-decoration: none;
	font-weight: 600;
}
.kvp-roundup .rnd-compare-table a:hover {
	text-decoration: underline;
}

/* ---- Editor's top pick ---- */
.kvp-roundup .rnd-top-pick {
	background: var(--color-background);
	border-left: 4px solid var(--color-primary);
	padding: 22px 22px 22px 24px;
	margin: 36px 0;
	border-radius: 2px;
}
.kvp-roundup .rnd-top-pick-label {
	font-size: 0.68rem;
	text-transform: uppercase;
	letter-spacing: 0.12em;
	color: var(--color-primary);
	font-weight: 700;
	margin: 0 0 6px;
}
.kvp-roundup .rnd-top-pick-name {
	font-family: var(--font-heading);
	font-size: 1.25rem;
	color: var(--color-text);
	margin: 0 0 6px;
}
.kvp-roundup .rnd-top-pick-reason {
	font-size: 0.9rem;
	color: #444; /* no CSS var available */
	margin: 0 0 8px;
	line-height: 1.5;
}
.kvp-roundup .rnd-top-pick-price {
	font-size: 0.875rem;
	color: var(--color-primary);
	font-weight: 700;
	margin: 0 0 16px;
}

/* ---- Buttons ---- */
.kvp-roundup .rnd-btn {
	display: block;
	text-align: center;
	background: var(--color-primary);
	color: var(--color-white);
	padding: 13px 24px;
	border-radius: 4px;
	text-decoration: none;
	font-weight: 700;
	font-size: 0.9rem;
	transition: background 0.15s ease;
}
.kvp-roundup .rnd-btn:hover {
	background: var(--color-accent);
	color: var(--color-white);
	text-decoration: none;
}

/* ---- Product cards ---- */
.kvp-roundup .rnd-cards {
	margin: 36px 0;
}
.kvp-roundup .rnd-card {
	border: 1px solid rgba(26, 26, 26, 0.1);
	border-radius: 6px;
	padding: 22px;
	margin-bottom: 36px;
}
.kvp-roundup .rnd-card-badge {
	display: inline-block;
	background: var(--color-background);
	border: 1px solid var(--color-primary);
	color: var(--color-primary);
	font-size: 0.7rem;
	text-transform: uppercase;
	letter-spacing: 0.09em;
	font-weight: 700;
	padding: 3px 9px;
	border-radius: 20px;
	margin-bottom: 12px;
}
.kvp-roundup .rnd-card-inner {
	display: flex;
	flex-direction: column;
	gap: 18px;
}
.kvp-roundup .rnd-card-img-wrap {
	width: 100%;
	background: var(--color-background);
	border-radius: 4px;
	padding: 16px;
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 140px;
}
.kvp-roundup .rnd-card-img-wrap img {
	max-width: 100%;
	max-height: 200px;
	object-fit: contain;
	width: auto;
	height: auto;
}
.kvp-roundup .rnd-card-img-placeholder {
	display: flex;
	flex-direction: column;
	align-items: center;
	gap: 6px;
	color: #bbb; /* no CSS var available */
	font-size: 0.75rem;
}
.kvp-roundup .rnd-card-name {
	font-family: var(--font-heading);
	font-size: 1.35rem;
	color: var(--color-text);
	margin: 0 0 10px;
	line-height: 1.25;
}
.kvp-roundup .rnd-card-stat {
	font-size: 1.5rem;
	font-weight: 700;
	color: var(--color-primary);
	margin: 0;
	line-height: 1;
}
.kvp-roundup .rnd-card-stat-label {
	font-size: 0.72rem;
	color: #777; /* no CSS var available */
	margin: 2px 0 14px;
	text-transform: uppercase;
	letter-spacing: 0.05em;
}
.kvp-roundup .rnd-card-meta {
	font-size: 0.85rem;
	color: #555; /* no CSS var available */
	margin: 0 0 14px;
}
.kvp-roundup .rnd-card-prose {
	font-size: 0.95rem;
	line-height: 1.7;
	color: var(--color-text);
	margin-bottom: 12px;
}
.kvp-roundup .rnd-card-prose p {
	margin: 0 0 10px;
}
.kvp-roundup .rnd-card-prose p:last-child {
	margin-bottom: 0;
}
.kvp-roundup .rnd-card-complaint {
	font-size: 0.9rem;
	line-height: 1.65;
	color: #444; /* no CSS var available */
	margin-bottom: 14px;
}
.kvp-roundup .rnd-card-complaint p {
	margin: 0 0 8px;
}
.kvp-roundup .rnd-card-complaint p:last-child {
	margin-bottom: 0;
}
.kvp-roundup .rnd-card-who {
	font-style: italic;
	font-size: 0.9rem;
	border-left: 3px solid var(--color-primary);
	padding-left: 12px;
	color: var(--color-text);
	margin: 0 0 18px;
	line-height: 1.5;
}
.kvp-roundup .rnd-card-cta {
	margin-top: 4px;
}

/* ---- Use case grid ---- */
.kvp-roundup .rnd-usecase {
	margin: 40px 0;
}
.kvp-roundup .rnd-usecase-row {
	display: flex;
	flex-direction: column;
	gap: 3px;
	padding: 14px 0;
	border-bottom: 1px solid rgba(26, 26, 26, 0.08);
}
.kvp-roundup .rnd-usecase-row:last-child {
	border-bottom: none;
}
.kvp-roundup .rnd-usecase-scenario {
	font-size: 0.75rem;
	text-transform: uppercase;
	letter-spacing: 0.08em;
	color: var(--color-primary);
	font-weight: 700;
}
.kvp-roundup .rnd-usecase-pick {
	font-family: var(--font-heading);
	font-size: 1.05rem;
	color: var(--color-text);
}
.kvp-roundup .rnd-usecase-reason {
	font-size: 0.85rem;
	color: #555; /* no CSS var available */
}

/* ---- Decision guide ---- */
.kvp-roundup .rnd-decision {
	margin: 40px 0;
}
.kvp-roundup .rnd-decision-body {
	font-size: 0.95rem;
	line-height: 1.75;
	color: var(--color-text);
}
.kvp-roundup .rnd-decision-body p {
	margin: 0 0 14px;
}
.kvp-roundup .rnd-decision-body p:last-child {
	margin-bottom: 0;
}

/* ---- Final verdict ---- */
.kvp-roundup .rnd-verdict {
	background: var(--color-background);
	border-radius: 6px;
	padding: 28px;
	margin: 40px 0;
}
.kvp-roundup .rnd-verdict-body {
	font-size: 0.95rem;
	line-height: 1.75;
	color: var(--color-text);
	margin-bottom: 22px;
}
.kvp-roundup .rnd-verdict-body p {
	margin: 0 0 14px;
}
.kvp-roundup .rnd-verdict-body p:last-child {
	margin-bottom: 0;
}

/* ---- Desktop layout (768px+) ---- */
@media (min-width: 768px) {
	.kvp-roundup .rnd-title {
		font-size: 2.4rem;
	}
	.kvp-roundup .rnd-section-heading {
		font-size: 1.6rem;
	}
	.kvp-roundup .rnd-card-inner {
		flex-direction: row;
		align-items: flex-start;
	}
	.kvp-roundup .rnd-card-img-wrap {
		width: 220px;
		min-width: 220px;
		flex-shrink: 0;
		min-height: 200px;
	}
	.kvp-roundup .rnd-card-content {
		flex: 1;
	}
	.kvp-roundup .rnd-btn {
		display: inline-block;
		text-align: left;
	}
	.kvp-roundup .rnd-usecase-row {
		flex-direction: row;
		align-items: baseline;
		gap: 16px;
	}
	.kvp-roundup .rnd-usecase-scenario {
		min-width: 210px;
		flex-shrink: 0;
	}
}
</style>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
	$post_id = get_the_ID();
?>

<!-- ============================================================
     1. HERO
     ============================================================ -->
<div class="rnd-hero">
	<h1 class="rnd-title"><?php the_title(); ?></h1>
	<p class="rnd-byline">
		<?php echo 'By Deborah &middot; Kitchen Researcher &amp; Product Analyst &middot; ' . esc_html( get_the_date( 'F j, Y' ) ); ?>
	</p>
	<div class="rnd-ftc">
		<?php esc_html_e( 'KitchenViralPicks.com participates in the Amazon Associates Program. If you buy through our links we may earn a small commission — at no extra cost to you. This never affects our recommendations.', 'kvp-theme' ); ?>
	</div>
	<?php $methodology = get_post_meta( $post_id, 'kvp_roundup_methodology', true );
	if ( $methodology ) : ?>
	<p class="rnd-methodology"><?php echo esc_html( $methodology ); ?></p>
	<?php endif; ?>
	<a href="#roundup-top-pick" class="rnd-jump-link">
		<?php esc_html_e( 'Jump to top pick ↓', 'kvp-theme' ); ?>
	</a>
</div>

<!-- ============================================================
     2. AT-A-GLANCE COMPARISON TABLE
     ============================================================ -->
<?php
$products = array();
for ( $n = 1; $n <= 5; $n++ ) {
	$products[ $n ] = array(
		'name'     => get_post_meta( $post_id, "kvp_p{$n}_name", true ),
		'price'    => get_post_meta( $post_id, "kvp_p{$n}_price", true ),
		'reviews'  => get_post_meta( $post_id, "kvp_p{$n}_reviews", true ),
		'rating'   => get_post_meta( $post_id, "kvp_p{$n}_rating", true ),
		'capacity' => get_post_meta( $post_id, "kvp_p{$n}_capacity", true ),
		'bestfor'  => get_post_meta( $post_id, "kvp_p{$n}_bestfor", true ),
	);
}
?>
<div class="rnd-table-section">
	<h2 class="rnd-section-heading"><?php esc_html_e( 'At a Glance — How These 5 Compare', 'kvp-theme' ); ?></h2>
	<div class="rnd-table-wrap">
		<table class="rnd-compare-table">
			<thead>
				<tr>
					<th><?php esc_html_e( 'Product', 'kvp-theme' ); ?></th>
					<th><?php esc_html_e( 'Price', 'kvp-theme' ); ?></th>
					<th><?php esc_html_e( 'Reviews', 'kvp-theme' ); ?></th>
					<th><?php esc_html_e( 'Rating', 'kvp-theme' ); ?></th>
					<th><?php esc_html_e( 'Capacity', 'kvp-theme' ); ?></th>
					<th><?php esc_html_e( 'Best For', 'kvp-theme' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php for ( $n = 1; $n <= 5; $n++ ) : ?>
				<tr>
					<td>
						<a href="#product-<?php echo esc_attr( $n ); ?>">
							<?php echo esc_html( $products[ $n ]['name'] ); ?>
						</a>
					</td>
					<td><?php echo esc_html( $products[ $n ]['price'] ); ?></td>
					<td><?php echo esc_html( $products[ $n ]['reviews'] ); ?></td>
					<td><?php echo esc_html( $products[ $n ]['rating'] ); ?></td>
					<td><?php echo esc_html( $products[ $n ]['capacity'] ); ?></td>
					<td><?php echo esc_html( $products[ $n ]['bestfor'] ); ?></td>
				</tr>
				<?php endfor; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- ============================================================
     3. EDITOR'S TOP PICK
     ============================================================ -->
<?php
$toppick_name      = get_post_meta( $post_id, 'kvp_toppick_name', true );
$toppick_reason    = get_post_meta( $post_id, 'kvp_toppick_reason', true );
$toppick_price     = get_post_meta( $post_id, 'kvp_toppick_price', true );
$toppick_btn_label = get_post_meta( $post_id, 'kvp_toppick_btn_label', true );
$toppick_url       = get_post_meta( $post_id, 'kvp_toppick_url', true );
?>
<div class="rnd-top-pick" id="roundup-top-pick">
	<p class="rnd-top-pick-label"><?php esc_html_e( "Editor's Top Pick", 'kvp-theme' ); ?></p>
	<?php if ( $toppick_name ) : ?>
	<p class="rnd-top-pick-name"><?php echo esc_html( $toppick_name ); ?></p>
	<?php endif; ?>
	<?php if ( $toppick_reason ) : ?>
	<p class="rnd-top-pick-reason"><?php echo esc_html( $toppick_reason ); ?></p>
	<?php endif; ?>
	<?php if ( $toppick_price ) : ?>
	<p class="rnd-top-pick-price"><?php echo esc_html( $toppick_price ); ?></p>
	<?php endif; ?>
	<?php if ( $toppick_url && $toppick_btn_label ) : ?>
	<a href="<?php echo esc_url( $toppick_url ); ?>"
	   class="rnd-btn"
	   rel="nofollow sponsored"
	   target="_blank">
		<?php echo esc_html( $toppick_btn_label ); ?>
	</a>
	<?php endif; ?>
</div>

<!-- ============================================================
     4. FIVE PRODUCT CARDS
     ============================================================ -->
<div class="rnd-cards">
<?php for ( $n = 1; $n <= 5; $n++ ) :
	$card_name        = get_post_meta( $post_id, "kvp_p{$n}_name", true );
	if ( empty( $card_name ) ) continue;

	$card_label       = get_post_meta( $post_id, "kvp_p{$n}_position_label", true );
	$card_image_url   = get_post_meta( $post_id, "kvp_p{$n}_image_url", true );
	$card_review_count = get_post_meta( $post_id, "kvp_p{$n}_review_count", true );
	$card_rating      = get_post_meta( $post_id, "kvp_p{$n}_rating", true );
	$card_price       = get_post_meta( $post_id, "kvp_p{$n}_price", true );
	$card_buyer_says  = get_post_meta( $post_id, "kvp_p{$n}_buyer_says", true );
	$card_complaint   = get_post_meta( $post_id, "kvp_p{$n}_complaint", true );
	$card_who         = get_post_meta( $post_id, "kvp_p{$n}_who_its_for", true );
	$card_btn_label   = get_post_meta( $post_id, "kvp_p{$n}_btn_label", true );
	$card_btn_url     = get_post_meta( $post_id, "kvp_p{$n}_btn_url", true );
	$card_btn_type    = get_post_meta( $post_id, "kvp_p{$n}_btn_type", true );
	$is_external      = ( 'external' === $card_btn_type );
?>
<div class="rnd-card" id="product-<?php echo esc_attr( $n ); ?>">
	<?php if ( $card_label ) : ?>
	<span class="rnd-card-badge"><?php echo esc_html( $card_label ); ?></span>
	<?php endif; ?>
	<div class="rnd-card-inner">
		<div class="rnd-card-img-wrap">
			<?php if ( $card_image_url ) : ?>
			<img
				src="<?php echo esc_url( $card_image_url ); ?>"
				alt="<?php echo esc_attr( $card_name ); ?>"
				width="200"
				height="200"
				loading="lazy"
			>
			<?php else : ?>
			<div class="rnd-card-img-placeholder">
				<svg width="48" height="48" viewBox="0 0 48 48" fill="none" aria-hidden="true">
					<rect x="4" y="10" width="40" height="28" rx="3" stroke="rgba(232,64,28,0.35)" stroke-width="2" fill="none"/>
					<circle cx="18" cy="21" r="5" stroke="rgba(232,64,28,0.35)" stroke-width="2" fill="none"/>
					<path d="M4 34 L16 24 L26 32 L34 26 L44 34" stroke="rgba(232,64,28,0.35)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
				</svg>
				<span><?php esc_html_e( 'Product image', 'kvp-theme' ); ?></span>
			</div>
			<?php endif; ?>
		</div>
		<div class="rnd-card-content">
			<h2 class="rnd-card-name"><?php echo esc_html( $card_name ); ?></h2>
			<?php if ( $card_review_count ) : ?>
			<div class="rnd-card-stat"><?php echo esc_html( $card_review_count ); ?></div>
			<div class="rnd-card-stat-label"><?php esc_html_e( 'verified Amazon reviews', 'kvp-theme' ); ?></div>
			<?php endif; ?>
			<?php if ( $card_rating || $card_price ) : ?>
			<p class="rnd-card-meta">
				<?php if ( $card_rating ) : ?>
					<?php echo esc_html( $card_rating ); ?>
				<?php endif; ?>
				<?php if ( $card_rating && $card_price ) : ?>
					&nbsp;&middot;&nbsp;
				<?php endif; ?>
				<?php if ( $card_price ) : ?>
					<?php echo esc_html( $card_price ); ?> <span><?php esc_html_e( '(at time of writing — price may vary)', 'kvp-theme' ); ?></span>
				<?php endif; ?>
			</p>
			<?php endif; ?>
			<?php if ( $card_buyer_says ) : ?>
			<div class="rnd-card-prose">
				<?php echo wp_kses_post( wpautop( $card_buyer_says ) ); ?>
			</div>
			<?php endif; ?>
			<?php if ( $card_complaint ) : ?>
			<div class="rnd-card-complaint">
				<?php echo wp_kses_post( wpautop( $card_complaint ) ); ?>
			</div>
			<?php endif; ?>
			<?php if ( $card_who ) : ?>
			<p class="rnd-card-who"><?php echo esc_html( $card_who ); ?></p>
			<?php endif; ?>
			<?php if ( $card_btn_url && $card_btn_label ) : ?>
			<div class="rnd-card-cta">
				<a href="<?php echo esc_url( $card_btn_url ); ?>"
				   class="rnd-btn"
				   <?php if ( $is_external ) : ?>rel="nofollow sponsored" target="_blank"<?php endif; ?>>
					<?php echo esc_html( $card_btn_label ); ?>
				</a>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endfor; ?>
</div>

<!-- ============================================================
     5. SIDE-BY-SIDE USE CASE GRID
     ============================================================ -->
<?php
$scenarios = array(
	array(
		'label' => __( 'Cooking for 1–2 people', 'kvp-theme' ),
		'field' => 'kvp_scenario_small',
	),
	array(
		'label' => __( 'Cooking for 3–5 people', 'kvp-theme' ),
		'field' => 'kvp_scenario_large',
	),
	array(
		'label' => __( 'Tightest budget', 'kvp-theme' ),
		'field' => 'kvp_scenario_budget',
	),
	array(
		'label' => __( 'Highest rated', 'kvp-theme' ),
		'field' => 'kvp_scenario_toprated',
	),
);
$has_scenarios = false;
foreach ( $scenarios as $s ) {
	if ( get_post_meta( $post_id, $s['field'], true ) ) {
		$has_scenarios = true;
		break;
	}
}
if ( $has_scenarios ) :
?>
<div class="rnd-usecase">
	<h2 class="rnd-section-heading"><?php esc_html_e( 'Which One Fits Your Kitchen?', 'kvp-theme' ); ?></h2>
	<?php foreach ( $scenarios as $s ) :
		$raw = get_post_meta( $post_id, $s['field'], true );
		if ( ! $raw ) continue;
		$parts       = explode( ' — ', $raw, 2 );
		$pick_name   = trim( $parts[0] );
		$pick_reason = isset( $parts[1] ) ? trim( $parts[1] ) : '';
	?>
	<div class="rnd-usecase-row">
		<span class="rnd-usecase-scenario"><?php echo esc_html( $s['label'] ); ?></span>
		<span class="rnd-usecase-pick"><?php echo esc_html( $pick_name ); ?></span>
		<?php if ( $pick_reason ) : ?>
		<span class="rnd-usecase-reason"><?php echo esc_html( $pick_reason ); ?></span>
		<?php endif; ?>
	</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>

<!-- ============================================================
     6. DECISION GUIDE
     ============================================================ -->
<?php $decision_guide = get_post_meta( $post_id, 'kvp_decision_guide', true );
if ( $decision_guide ) : ?>
<div class="rnd-decision">
	<h2 class="rnd-section-heading"><?php esc_html_e( 'Which One Is Right for You?', 'kvp-theme' ); ?></h2>
	<div class="rnd-decision-body">
		<?php echo wp_kses_post( wpautop( $decision_guide ) ); ?>
	</div>
</div>
<?php endif; ?>

<!-- ============================================================
     7. FINAL VERDICT
     ============================================================ -->
<?php
$final_verdict     = get_post_meta( $post_id, 'kvp_final_verdict', true );
$verdict_btn_label = get_post_meta( $post_id, 'kvp_verdict_btn_label', true );
$verdict_btn_url   = get_post_meta( $post_id, 'kvp_verdict_btn_url', true );
if ( $final_verdict ) :
?>
<div class="rnd-verdict">
	<h2 class="rnd-section-heading"><?php esc_html_e( 'Final Verdict', 'kvp-theme' ); ?></h2>
	<div class="rnd-verdict-body">
		<?php echo wp_kses_post( wpautop( $final_verdict ) ); ?>
	</div>
	<?php if ( $verdict_btn_url && $verdict_btn_label ) : ?>
	<a href="<?php echo esc_url( $verdict_btn_url ); ?>"
	   class="rnd-btn"
	   rel="nofollow sponsored"
	   target="_blank">
		<?php echo esc_html( $verdict_btn_label ); ?>
	</a>
	<?php endif; ?>
</div>
<?php endif; ?>

<?php endwhile; endif; ?>

</div><!-- .kvp-roundup -->

<?php get_footer();
