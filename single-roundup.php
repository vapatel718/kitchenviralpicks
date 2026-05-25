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
.kvp-roundup{max-width:780px;margin:0 auto;padding:0;}
.kvp-roundup *{box-sizing:border-box;}

/* HERO */
.rnd-hero{padding:3.5rem 1.5rem 2rem;border-bottom:0.5px solid var(--color-border-tertiary,#e5e5e5);}
.rnd-eyebrow{display:flex;align-items:center;gap:8px;font-size:11px;font-weight:500;color:#E8401C;letter-spacing:0.08em;text-transform:uppercase;margin-bottom:14px;margin-top:2rem;}
.rnd-eyebrow-dot{width:6px;height:6px;border-radius:50%;background:#E8401C;flex-shrink:0;}
.rnd-hero h1.rnd-title{font-family:'Playfair Display',serif;font-size:30px;font-weight:600;color:#1A1A1A;line-height:1.25;margin:0 0 16px;}
.rnd-byline-row{display:flex;align-items:center;gap:10px;margin-bottom:18px;flex-wrap:wrap;}
.rnd-byline-avatar{width:32px;height:32px;border-radius:50%;background:#E8401C;display:flex;align-items:center;justify-content:center;color:#fff;font-size:12px;font-weight:700;flex-shrink:0;}
.rnd-byline-text{font-size:13px;color:#666;}
.rnd-byline-text strong{color:#1A1A1A;font-weight:700;}
.rnd-disclosure{border-left:4px solid #E8401C;border-radius:0;padding:10px 14px;font-size:12px;color:#777;line-height:1.6;margin-bottom:18px;display:flex;gap:10px;align-items:flex-start;}
.rnd-methodology{font-size:14px;color:#555;line-height:1.75;margin-bottom:18px;}
.rnd-jump-link{display:inline-flex;align-items:center;gap:6px;font-size:13px;color:#E8401C;font-weight:700;border:1.5px solid rgba(232,64,28,0.3);border-radius:999px;padding:7px 16px;text-decoration:none;}

/* COMPARISON TABLE */
.rnd-table-section{padding:2rem 1.5rem;border-bottom:0.5px solid var(--color-border-tertiary,#e5e5e5);}
.rnd-section-label{font-size:11px;font-weight:700;color:#999;letter-spacing:0.08em;text-transform:uppercase;margin-bottom:12px;}
.rnd-compare-table{width:100%;border-collapse:collapse;font-size:13px;table-layout:fixed;}
.rnd-compare-table th{background:#E8401C;color:#fff;font-weight:700;font-size:11px;letter-spacing:0.06em;text-transform:uppercase;padding:10px 12px;text-align:center;}
.rnd-compare-table th:first-child{border-radius:8px 0 0 0;text-align:left;}
.rnd-compare-table th:last-child{border-radius:0 8px 0 0;}
.rnd-compare-table td{padding:10px 12px;border-bottom:0.5px solid #f0ece8;color:#1A1A1A;vertical-align:middle;font-size:13px;font-weight:500;text-align:center;}
.rnd-compare-table td:first-child{text-align:left;font-weight:700;}
.rnd-compare-table tr:last-child td{border-bottom:none;}
.rnd-compare-table tr:nth-child(even) td{background:#FFF8F5;}
.rnd-compare-table td a{color:#E8401C;text-decoration:none;font-weight:700;}
.rnd-winner-row td{background:rgba(232,64,28,0.04) !important;}
.rnd-winner-badge{display:inline-block;background:rgba(232,64,28,0.1);color:#E8401C;font-size:10px;font-weight:700;padding:2px 7px;border-radius:999px;margin-left:6px;vertical-align:middle;white-space:nowrap;}
.rnd-rating-pill{display:inline-flex;align-items:center;gap:3px;background:#FFF8F5;border:0.5px solid #e8d5cc;border-radius:999px;padding:3px 8px;font-size:12px;font-weight:700;color:#1A1A1A;}
.rnd-rating-pill .rnd-star{color:#E8401C;}
.rnd-reviews-bold{font-weight:700;color:#E8401C;}
.rnd-table-note{font-size:11px;color:#aaa;margin-top:8px;}
.rnd-compare-table .col-product{width:28%;}
.rnd-compare-table .col-price{width:12%;}
.rnd-compare-table .col-reviews{width:13%;}
.rnd-compare-table .col-rating{width:11%;}
.rnd-compare-table .col-capacity{width:10%;}
.rnd-compare-table .col-functions{width:10%;}
.rnd-compare-table .col-bestfor{width:16%;}
.rnd-table-price{font-size:13px;font-weight:700;color:#E8401C;}

/* EDITOR TOP PICK */
.rnd-toppick{margin:2rem 1.5rem;border:2px solid #E8401C;border-radius:12px;overflow:hidden;}
.rnd-toppick-header{background:#E8401C;padding:10px 18px;display:flex;align-items:center;gap:8px;}
.rnd-toppick-header span{color:#fff;font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;}
.rnd-toppick-body{padding:18px;display:grid;grid-template-columns:1fr auto;gap:16px;align-items:center;background:#fff;}
.rnd-toppick-name{font-family:'Playfair Display',serif;font-size:19px;font-weight:600;color:#1A1A1A;margin-bottom:6px;line-height:1.3;}
.rnd-toppick-reason{font-size:13px;color:#555;line-height:1.65;}
.rnd-toppick-cta{display:flex;flex-direction:column;align-items:flex-end;gap:6px;flex-shrink:0;}
.rnd-toppick-note{font-size:12px;color:#aaa;text-align:right;white-space:nowrap;line-height:1.5;}
.rnd-btn{display:inline-block;background:#E8401C;color:#fff;font-size:12px;font-weight:700;padding:10px 20px;border-radius:999px;text-decoration:none;white-space:nowrap;}
.rnd-btn-review{display:inline-block;background:#fff;color:#E8401C;font-size:12px;font-weight:700;padding:9px 20px;border-radius:999px;text-decoration:none;border:1.5px solid #E8401C;white-space:nowrap;}

/* PRODUCT CARDS */
.rnd-cards{padding:0 1.5rem 2rem;}
.rnd-card{border:0.5px solid #e8d5cc;border-radius:12px;overflow:hidden;margin-bottom:16px;background:#fff;}
.rnd-card-header{padding:16px 18px 0;}
.rnd-card-badge{display:inline-block;background:#FFF8F5;border:0.5px solid rgba(232,64,28,0.2);color:#E8401C;font-size:10px;font-weight:700;letter-spacing:0.07em;text-transform:uppercase;padding:4px 12px;border-radius:999px;margin-bottom:12px;}
.rnd-card-title-row{display:grid;grid-template-columns:1fr 96px;gap:14px;align-items:start;margin-bottom:14px;}
.rnd-card-name{font-family:'Playfair Display',serif;font-size:18px;font-weight:600;color:#1A1A1A;line-height:1.3;margin-bottom:8px;}
.rnd-card-review-count{font-size:22px;font-weight:700;color:#E8401C;line-height:1.1;margin-bottom:3px;}
.rnd-card-review-label{font-size:11px;color:#aaa;line-height:1.4;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:6px;}
.rnd-card-meta{font-size:13px;color:#888;}
.rnd-card-img{width:96px;height:96px;border-radius:8px;background:#F5F0EB;border:0.5px dashed rgba(232,64,28,0.3);display:flex;flex-direction:column;align-items:center;justify-content:center;gap:5px;flex-shrink:0;}
.rnd-card-img span{font-size:9px;color:#bbb;letter-spacing:0.04em;}
.rnd-card-body{padding:0 18px 16px;}
.rnd-card-divider{height:0.5px;background:#f0ece8;margin:0 0 14px;}
.rnd-body-label{font-size:10px;font-weight:700;color:#999;letter-spacing:0.07em;text-transform:uppercase;margin-bottom:7px;}
.rnd-body-text{font-size:15px;color:#444;line-height:1.8;}
.rnd-complaint-block{background:#FFF8F5;border-radius:8px;padding:11px 14px;margin-top:12px;}
.rnd-who-block{border-left:3px solid #E8401C;border-radius:0;padding:8px 12px;margin-top:12px;font-size:15px;color:#555;font-style:italic;line-height:1.65;}
.rnd-card-footer{padding:13px 18px;background:#FFF8F5;border-top:0.5px solid #f0ece8;}
.rnd-card-stat-price-row{display:flex;align-items:flex-start;gap:24px;margin-bottom:8px;flex-wrap:wrap;}
.rnd-price-block{display:flex;flex-direction:column;}
.rnd-price-tag{display:block;font-size:22px;font-weight:700;color:#E8401C;line-height:1.1;margin-bottom:3px;}
.rnd-price-note{display:block;font-size:11px;color:#aaa;line-height:1.4;}

/* USE CASE GRID */
.rnd-usecase-section{padding:2rem 1.5rem;border-top:0.5px solid var(--color-border-tertiary,#e5e5e5);}
.rnd-usecase-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;}
.rnd-usecase-card{background:#FFF8F5;border-radius:8px;border:0.5px solid rgba(232,64,28,0.12);padding:14px 16px;}
.rnd-usecase-scenario{font-size:10px;font-weight:700;color:#E8401C;letter-spacing:0.07em;text-transform:uppercase;margin-bottom:5px;}
.rnd-usecase-pick{font-size:15px;font-weight:700;color:#1A1A1A;margin-bottom:4px;line-height:1.35;}
.rnd-usecase-why{font-size:13px;color:#666;line-height:1.55;}

/* DECISION GUIDE */
.rnd-decision-section{padding:0 1.5rem 2rem;}
.rnd-decision-body{font-size:15px;color:#444;line-height:1.8;}
.rnd-decision-body p{margin-bottom:10px;}
.rnd-decision-body p:last-child{margin-bottom:0;}

/* FINAL VERDICT */
.rnd-verdict-section{margin:0 1.5rem 2rem;background:#E8401C;border-radius:12px;padding:24px 26px;}
.rnd-verdict-title{font-family:'Playfair Display',serif;font-size:20px;font-weight:600;color:#fff;padding-bottom:12px;border-bottom:0.5px solid rgba(255,255,255,0.25);margin-bottom:14px;}
.rnd-verdict-body{font-size:15px;color:rgba(255,255,255,0.92);line-height:1.8;margin-bottom:10px;}
.rnd-verdict-caveat{font-size:12px;color:rgba(255,255,255,0.65);font-style:italic;margin-bottom:20px;line-height:1.6;}
.rnd-btn-verdict{display:block;text-align:center;background:#fff;color:#E8401C;font-size:14px;font-weight:700;padding:13px;border-radius:999px;text-decoration:none;}

/* MOBILE */
@media(max-width:640px){
  .rnd-hero h1.rnd-title{font-size:22px;}
  .rnd-toppick-body{grid-template-columns:1fr;gap:12px;}
  .rnd-toppick-cta{align-items:flex-start;}
  .rnd-toppick-note{text-align:left;}
  .rnd-card-title-row{grid-template-columns:1fr 72px;}
  .rnd-card-img{width:72px;height:72px;}
  .rnd-card-review-count{font-size:18px;}
  .rnd-usecase-grid{grid-template-columns:1fr;}
  .rnd-compare-table{font-size:11px;}
  .rnd-compare-table td,.rnd-compare-table th{padding:8px 6px;}
  .rnd-compare-table .col-reviews,
  .rnd-compare-table .col-capacity,
  .rnd-compare-table .col-functions,
  .rnd-compare-table th:nth-child(3),
  .rnd-compare-table th:nth-child(5),
  .rnd-compare-table th:nth-child(6),
  .rnd-compare-table td:nth-child(3),
  .rnd-compare-table td:nth-child(5),
  .rnd-compare-table td:nth-child(6){display:none;}
  .rnd-compare-table .col-product{width:36%;}
  .rnd-compare-table .col-price{width:22%;}
  .rnd-compare-table .col-rating{width:18%;}
  .rnd-compare-table .col-bestfor{width:24%;}
}
</style>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
	$post_id = get_the_ID();
?>

<!-- ============================================================
     1. HERO
     ============================================================ -->
<div class="rnd-hero">
	<div class="rnd-eyebrow"><span class="rnd-eyebrow-dot"></span>Air fryer roundup &middot; <?php echo esc_html( get_the_date( 'F Y' ) ); ?></div>
	<h1 class="rnd-title"><?php the_title(); ?></h1>
	<div class="rnd-byline-row">
		<div class="rnd-byline-avatar">D</div>
		<div class="rnd-byline-text"><?php echo 'By <strong>Deborah</strong> &middot; Kitchen Researcher &amp; Product Analyst &middot; ' . esc_html( get_the_date( 'F j, Y' ) ); ?></div>
	</div>
	<div class="rnd-disclosure">
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
$functions_count = array( 1 => 4, 2 => 9, 3 => 6, 4 => 4, 5 => 4 );
?>
<div class="rnd-table-section">
	<p class="rnd-section-label"><?php esc_html_e( 'At a Glance — How These 5 Compare', 'kvp-theme' ); ?></p>
	<table class="rnd-compare-table">
		<colgroup>
			<col class="col-product">
			<col class="col-price">
			<col class="col-reviews">
			<col class="col-rating">
			<col class="col-capacity">
			<col class="col-functions">
			<col class="col-bestfor">
		</colgroup>
		<thead>
			<tr>
				<th><?php esc_html_e( 'Product', 'kvp-theme' ); ?></th>
				<th><?php esc_html_e( 'Price', 'kvp-theme' ); ?></th>
				<th><?php esc_html_e( 'Reviews', 'kvp-theme' ); ?></th>
				<th><?php esc_html_e( 'Rating', 'kvp-theme' ); ?></th>
				<th><?php esc_html_e( 'Capacity', 'kvp-theme' ); ?></th>
				<th><?php esc_html_e( 'Functions', 'kvp-theme' ); ?></th>
				<th><?php esc_html_e( 'Best For', 'kvp-theme' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php for ( $n = 1; $n <= 5; $n++ ) : ?>
			<tr<?php echo ( 1 === $n ) ? ' class="rnd-winner-row"' : ''; ?>>
				<td>
					<a href="#product-<?php echo esc_attr( $n ); ?>">
						<?php echo esc_html( $products[ $n ]['name'] ); ?>
					</a>
					<?php if ( 1 === $n ) : ?>
					<span class="rnd-winner-badge">Top pick</span>
					<?php endif; ?>
				</td>
				<td><span class="rnd-table-price"><?php echo esc_html( $products[ $n ]['price'] ); ?></span></td>
				<td><span class="rnd-reviews-bold"><?php echo esc_html( $products[ $n ]['reviews'] ); ?></span></td>
				<td>
					<span class="rnd-rating-pill">
						<span class="rnd-star">★</span>
						<?php echo esc_html( str_replace( '★', '', $products[ $n ]['rating'] ) ); ?>
					</span>
				</td>
				<td><?php echo esc_html( $products[ $n ]['capacity'] ); ?></td>
				<td><?php echo esc_html( $functions_count[ $n ] ); ?></td>
				<td><?php echo esc_html( $products[ $n ]['bestfor'] ); ?></td>
			</tr>
			<?php endfor; ?>
		</tbody>
	</table>
	<p class="rnd-table-note">Prices at time of writing &middot; May vary on Amazon &middot; Review counts verified May 2026</p>
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
<div class="rnd-toppick" id="roundup-top-pick">
	<div class="rnd-toppick-header"><span><?php esc_html_e( "Editor's Top Pick", 'kvp-theme' ); ?></span></div>
	<div class="rnd-toppick-body">
		<div>
			<?php if ( $toppick_name ) : ?>
			<p class="rnd-toppick-name"><?php echo esc_html( $toppick_name ); ?></p>
			<?php endif; ?>
			<?php if ( $toppick_reason ) : ?>
			<p class="rnd-toppick-reason"><?php echo esc_html( $toppick_reason ); ?></p>
			<?php endif; ?>
		</div>
		<?php if ( $toppick_url && $toppick_btn_label ) : ?>
		<div class="rnd-toppick-cta">
			<a href="<?php echo esc_url( $toppick_url ); ?>"
			   class="rnd-btn"
			   rel="nofollow sponsored"
			   target="_blank">
				<?php echo esc_html( $toppick_btn_label ); ?>
			</a>
			<?php if ( $toppick_price ) : ?>
			<p class="rnd-toppick-note">
				<span style="font-size:18px;font-weight:700;color:#E8401C;display:block;line-height:1.1;"><?php echo esc_html( $toppick_price ); ?></span>
				<span style="font-size:11px;color:#aaa;">at time of writing &middot; price may vary</span>
			</p>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>
</div>

<!-- ============================================================
     4. FIVE PRODUCT CARDS
     ============================================================ -->
<div class="rnd-cards">
<?php for ( $n = 1; $n <= 5; $n++ ) :
	$card_name         = get_post_meta( $post_id, "kvp_p{$n}_name", true );
	if ( empty( $card_name ) ) continue;

	$card_label        = get_post_meta( $post_id, "kvp_p{$n}_position_label", true );
	$card_image_url    = get_post_meta( $post_id, "kvp_p{$n}_image_url", true );
	$card_review_count = get_post_meta( $post_id, "kvp_p{$n}_review_count", true );
	$card_rating       = get_post_meta( $post_id, "kvp_p{$n}_rating", true );
	$card_price        = get_post_meta( $post_id, "kvp_p{$n}_price", true );
	$card_buyer_says   = get_post_meta( $post_id, "kvp_p{$n}_buyer_says", true );
	$card_complaint    = get_post_meta( $post_id, "kvp_p{$n}_complaint", true );
	$card_who          = get_post_meta( $post_id, "kvp_p{$n}_who_its_for", true );
	$card_btn_label    = get_post_meta( $post_id, "kvp_p{$n}_btn_label", true );
	$card_btn_url      = get_post_meta( $post_id, "kvp_p{$n}_btn_url", true );
	$card_btn_type     = get_post_meta( $post_id, "kvp_p{$n}_btn_type", true );
	$is_external       = ( 'external' === $card_btn_type );
?>
<div class="rnd-card" id="product-<?php echo esc_attr( $n ); ?>">
	<div class="rnd-card-header">
		<?php if ( $card_label ) : ?>
		<span class="rnd-card-badge"><?php echo esc_html( $card_label ); ?></span>
		<?php endif; ?>
		<div class="rnd-card-title-row">
			<div>
				<h2 class="rnd-card-name"><?php echo esc_html( $card_name ); ?></h2>
				<div class="rnd-card-stat-price-row">
					<div>
						<div class="rnd-card-review-count"><?php echo esc_html( $card_review_count ); ?></div>
						<div class="rnd-card-review-label">Verified reviews</div>
					</div>
					<div class="rnd-price-block">
						<span class="rnd-price-tag"><?php echo esc_html( $card_price ); ?></span>
						<span class="rnd-price-note">at time of writing &middot; price may vary</span>
					</div>
				</div>
				<?php if ( $card_rating ) : ?>
				<p class="rnd-card-meta"><?php echo esc_html( $card_rating ); ?></p>
				<?php endif; ?>
			</div>
			<div class="rnd-card-img">
				<?php if ( $card_image_url ) : ?>
				<img
					src="<?php echo esc_url( $card_image_url ); ?>"
					alt="<?php echo esc_attr( $card_name ); ?>"
					width="96"
					height="96"
					loading="lazy"
				>
				<?php else : ?>
				<svg width="32" height="32" viewBox="0 0 48 48" fill="none" aria-hidden="true">
					<rect x="4" y="10" width="40" height="28" rx="3" stroke="rgba(232,64,28,0.35)" stroke-width="2" fill="none"/>
					<circle cx="18" cy="21" r="5" stroke="rgba(232,64,28,0.35)" stroke-width="2" fill="none"/>
					<path d="M4 34 L16 24 L26 32 L34 26 L44 34" stroke="rgba(232,64,28,0.35)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
				</svg>
				<span><?php esc_html_e( 'Product image', 'kvp-theme' ); ?></span>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="rnd-card-body">
		<div class="rnd-card-divider"></div>
		<?php if ( $card_buyer_says ) : ?>
		<p class="rnd-body-label"><?php esc_html_e( 'What buyers say', 'kvp-theme' ); ?></p>
		<div class="rnd-body-text"><?php echo wp_kses_post( wpautop( $card_buyer_says ) ); ?></div>
		<?php endif; ?>
		<?php if ( $card_complaint ) : ?>
		<div class="rnd-complaint-block">
			<p class="rnd-body-label"><?php esc_html_e( 'The honest downside', 'kvp-theme' ); ?></p>
			<div class="rnd-body-text"><?php echo wp_kses_post( wpautop( $card_complaint ) ); ?></div>
		</div>
		<?php endif; ?>
		<?php if ( $card_who ) : ?>
		<p class="rnd-who-block"><?php echo esc_html( $card_who ); ?></p>
		<?php endif; ?>
	</div>
	<div class="rnd-card-footer">
		<?php if ( $card_btn_url && $card_btn_label ) : ?>
		<a href="<?php echo esc_url( $card_btn_url ); ?>"
		   class="<?php echo $is_external ? 'rnd-btn' : 'rnd-btn-review'; ?>"
		   <?php if ( $is_external ) : ?>rel="nofollow sponsored" target="_blank"<?php endif; ?>>
			<?php echo esc_html( $card_btn_label ); ?>
		</a>
		<?php endif; ?>
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
<div class="rnd-usecase-section">
	<p class="rnd-section-label"><?php esc_html_e( 'Which One Fits Your Kitchen?', 'kvp-theme' ); ?></p>
	<div class="rnd-usecase-grid">
		<?php foreach ( $scenarios as $s ) :
			$raw = get_post_meta( $post_id, $s['field'], true );
			if ( ! $raw ) continue;
			$parts       = explode( ' — ', $raw, 2 );
			$pick_name   = trim( $parts[0] );
			$pick_reason = isset( $parts[1] ) ? trim( $parts[1] ) : '';
		?>
		<div class="rnd-usecase-card">
			<p class="rnd-usecase-scenario"><?php echo esc_html( $s['label'] ); ?></p>
			<p class="rnd-usecase-pick"><?php echo esc_html( $pick_name ); ?></p>
			<?php if ( $pick_reason ) : ?>
			<p class="rnd-usecase-why"><?php echo esc_html( $pick_reason ); ?></p>
			<?php endif; ?>
		</div>
		<?php endforeach; ?>
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
<div class="rnd-verdict-section">
	<p class="rnd-verdict-title"><?php esc_html_e( 'Final Verdict', 'kvp-theme' ); ?></p>
	<div class="rnd-verdict-body">
		<?php echo wp_kses_post( wpautop( $final_verdict ) ); ?>
	</div>
	<?php if ( $verdict_btn_url && $verdict_btn_label ) : ?>
	<a href="<?php echo esc_url( $verdict_btn_url ); ?>"
	   class="rnd-btn-verdict"
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
