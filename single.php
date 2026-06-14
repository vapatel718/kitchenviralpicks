<?php

get_header();

while ( have_posts() ) : the_post();

	$post_id = get_the_ID();

	$price_key          = kvp_get_price_key( $post_id );
	$kvp_price          = kvp_get_price( $price_key, 'kvp_price', $post_id );
	$kvp_rating         = get_post_meta( $post_id, 'kvp_rating',         true );
	$kvp_review_count   = get_post_meta( $post_id, 'kvp_review_count',   true );
	$kvp_verdict_line   = get_post_meta( $post_id, 'kvp_verdict_line',   true );
	$kvp_amazon_url     = get_post_meta( $post_id, 'kvp_amazon_url',     true );
	$kvp_final_verdict  = get_post_meta( $post_id, 'kvp_final_verdict',  true );
	$kvp_best_for       = get_post_meta( $post_id, 'kvp_best_for',       true );
	$kvp_skip_if_detail = get_post_meta( $post_id, 'kvp_skip_if_detail', true );

	$buy_if_raw   = get_post_meta( $post_id, 'kvp_buy_if',        true );
	$skip_if_raw  = get_post_meta( $post_id, 'kvp_skip_if',       true );
	$pros_raw     = get_post_meta( $post_id, 'kvp_pros',          true );
	$cons_raw     = get_post_meta( $post_id, 'kvp_cons',          true );
	$specs_raw    = get_post_meta( $post_id, 'kvp_specs',         true );
	$kvp_pack_size = get_post_meta( $post_id, 'kvp_spec_pack_size', true );

	// Parse specs: rows separated by \n, each row is Key|Value
	$spec_pairs   = array();
	$kvp_capacity = get_post_meta( get_the_ID(), 'kvp_capacity', true );
	if ( $specs_raw ) {
		foreach ( kvp_split_lines( $specs_raw ) as $row ) {
			$parts = explode( '|', $row, 2 );
			if ( 2 === count( $parts ) ) {
				$key          = trim( $parts[0] );
				$val          = trim( $parts[1] );
				$spec_pairs[] = array( $key, $val );
				if ( empty( $kvp_capacity ) && 'capacity' === strtolower( $key ) ) {
					$kvp_capacity = $val;
				}
			}
		}
	}

	$cats        = get_the_category();
	$cat         = $cats ? $cats[0] : null;
	$crumb_title = preg_replace( '/ Review.*$/i', '', get_the_title() );
	$amazon_href = $kvp_amazon_url ? $kvp_amazon_url : '#';


?>
<main id="kvp-single-main">
<div class="kvp-single-wrap kvp-single">

	<!-- BREADCRUMB -->
	<nav class="crumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'kvp-theme' ); ?>">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kvp-theme' ); ?></a>
		<span aria-hidden="true" style="color:#ddd;">&#8250;</span>
		<?php if ( $cat ) : ?>
		<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo esc_html( $cat->name ); ?></a>
		<span aria-hidden="true" style="color:#ddd;">&#8250;</span>
		<?php endif; ?>
		<span style="color:#555;"><?php echo esc_html( $crumb_title ); ?></span>
	</nav>

	<!-- H1 -->
	<h1 class="h1"><?php the_title(); ?></h1>

	<!-- BYLINE -->
	<div class="byline">
		<strong><?php esc_html_e( 'By Deborah', 'kvp-theme' ); ?></strong>
		<span class="bdot" aria-hidden="true"></span>
		<span><?php esc_html_e( 'Kitchen Researcher &amp; Product Analyst', 'kvp-theme' ); ?></span>
		<span class="bdot" aria-hidden="true"></span>
		<span><?php echo esc_html( get_the_date( 'F Y' ) ); ?></span>
	</div>

	<!-- FTC DISCLOSURE — must appear before first affiliate link -->
	<div class="ftc" role="note">
		<svg class="ftc-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" aria-hidden="true">
			<circle cx="12" cy="12" r="10" stroke="#E8401C" stroke-width="1.8"/>
			<line x1="12" y1="8" x2="12" y2="12" stroke="#E8401C" stroke-width="2" stroke-linecap="round"/>
			<circle cx="12" cy="16" r="1" fill="#E8401C"/>
		</svg>
		<span>
			<strong style="color:#555;"><?php esc_html_e( 'Disclosure:', 'kvp-theme' ); ?></strong>
			<?php esc_html_e( 'KitchenViralPicks.com participates in the Amazon Associates Program. If you buy through our links we may earn a small commission — at no extra cost to you. This never affects our recommendations.', 'kvp-theme' ); ?>
		</span>
	</div>

	<!-- SCORE BAR — CTA button 1 of 3 -->
	<div class="score-bar">

		<div class="score-img">
			<?php
			$kvp_img = get_post_meta( get_the_ID(), 'kvp_product_image', true );
			if ( $kvp_img ) : ?>
				<img src="<?php echo esc_url( $kvp_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
			<?php elseif ( has_post_thumbnail() ) : ?>
				<?php echo get_the_post_thumbnail( get_the_ID(), 'medium', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
			<?php else : ?>
			<svg width="28" height="28" viewBox="0 0 48 48" fill="none" aria-hidden="true">
				<rect x="4" y="10" width="40" height="28" rx="3" stroke="rgba(232,64,28,0.35)" stroke-width="2" fill="none"/>
				<circle cx="18" cy="21" r="5" stroke="rgba(232,64,28,0.35)" stroke-width="2" fill="none"/>
				<path d="M4 34 L16 24 L26 32 L34 26 L44 34" stroke="rgba(232,64,28,0.35)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
			</svg>
			<span style="font-size:9px;color:#bbb;letter-spacing:0.04em;"><?php esc_html_e( 'Product image', 'kvp-theme' ); ?></span>
			<?php endif; ?>
		</div>

		<div>
			<?php
			$kvp_product_name  = get_post_meta( get_the_ID(), 'kvp_product_name', true );
			$kvp_card_verdict  = get_post_meta( get_the_ID(), 'kvp_card_verdict', true );
			$display_name      = ! empty( $kvp_product_name ) ? $kvp_product_name : get_the_title();
			?>
			<?php if ( $kvp_card_verdict ) : ?>
			<span class="kvp-pick-badge"><?php esc_html_e( 'KVP Pick', 'kvp-theme' ); ?></span>
			<?php endif; ?>
			<div class="score-title"><?php echo esc_html( $display_name ); ?></div>

			<?php if ( $kvp_price ) : ?>
			<div class="price-pill-row">
				<span class="price-pill">~$<?php echo esc_html( $kvp_price ); ?></span>
				<span class="price-note"><?php esc_html_e( 'at time of writing', 'kvp-theme' ); ?><br><?php esc_html_e( 'price may vary', 'kvp-theme' ); ?></span>
			</div>
			<?php endif; ?>

			<?php if ( $kvp_verdict_line ) : ?>
			<div class="verdict-line"><?php echo esc_html( $kvp_verdict_line ); ?></div>
			<?php endif; ?>

			<a href="<?php echo esc_url( $amazon_href ); ?>" rel="sponsored nofollow" target="_blank" class="btn-red">
				<?php esc_html_e( 'Check price on Amazon', 'kvp-theme' ); ?>
			</a>
		</div>

	</div>

	<!-- METRICS -->
	<?php if ( $kvp_rating || $kvp_review_count || $kvp_price || $kvp_capacity || $kvp_pack_size ) : ?>
	<div class="metrics">
		<?php if ( $kvp_rating ) : ?>
		<div class="mbox">
			<div class="mnum"><?php echo esc_html( $kvp_rating ); ?>&#9733;</div>
			<div class="mlbl"><?php esc_html_e( 'Amazon rating', 'kvp-theme' ); ?></div>
		</div>
		<?php endif; ?>
		<?php if ( $kvp_review_count ) : ?>
		<div class="mbox">
			<div class="mnum"><?php echo esc_html( $kvp_review_count ); ?></div>
			<div class="mlbl"><?php esc_html_e( 'Verified reviews', 'kvp-theme' ); ?></div>
		</div>
		<?php endif; ?>
		<?php if ( $kvp_price ) : ?>
		<div class="mbox">
			<div class="mnum">~$<?php echo esc_html( $kvp_price ); ?></div>
			<div class="mlbl"><?php esc_html_e( 'Current price', 'kvp-theme' ); ?></div>
		</div>
		<?php endif; ?>
		<?php if ( $kvp_capacity ) : ?>
		<div class="mbox">
			<div class="mnum"><?php echo esc_html( $kvp_capacity ); ?></div>
			<div class="mlbl"><?php esc_html_e( 'Capacity', 'kvp-theme' ); ?></div>
		</div>
		<?php elseif ( $kvp_pack_size ) : ?>
		<div class="mbox">
			<div class="mnum"><?php echo esc_html( $kvp_pack_size ); ?></div>
			<div class="mlbl"><?php esc_html_e( 'Pack Size', 'kvp-theme' ); ?></div>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<!-- ARTICLE BODY -->
	<?php if ( get_the_content() ) : ?>
	<div class="article-body">
		<?php
		add_filter( 'the_content', function( $content ) {
			$patterns = [
				'/<!--\s*kvp[^>]*-->/i',
				'/<div[^>]*class="[^"]*kvp-verdict-box[^"]*"[^>]*>.*?<\/div>/is',
				'/<div[^>]*class="[^"]*kvp-buy[^"]*"[^>]*>.*?<\/div>/is',
				'/<div[^>]*class="[^"]*kvp-skip[^"]*"[^>]*>.*?<\/div>/is',
				'/<div[^>]*class="[^"]*kvp-pros[^"]*"[^>]*>.*?<\/div>/is',
				'/<div[^>]*class="[^"]*kvp-cons[^"]*"[^>]*>.*?<\/div>/is',
				'/<div[^>]*class="[^"]*kvp-specs[^"]*"[^>]*>.*?<\/div>/is',
				'/<div[^>]*class="[^"]*kvp-final[^"]*"[^>]*>.*?<\/div>/is',
				'/<section[^>]*class="[^"]*kvp-[^"]*"[^>]*>.*?<\/section>/is',
			];
			return preg_replace( $patterns, '', $content );
		}, 10, 1 );
		the_content();
		?>
	</div>
	<?php endif; ?>

	<!-- WHO SHOULD BUY -->
	<?php
	$buy_if_items  = $buy_if_raw  ? kvp_split_lines( $buy_if_raw )  : array();
	$skip_if_items = $skip_if_raw ? kvp_split_lines( $skip_if_raw ) : array();
	if ( $buy_if_items || $skip_if_items ) :
	?>
	<div class="sec">
		<h2 class="sec-title"><?php esc_html_e( 'Who should buy this', 'kvp-theme' ); ?></h2>
		<div class="buy-grid">
			<?php if ( $buy_if_items ) : ?>
			<div class="buy-card b">
				<div class="buy-title b">&#10003; <?php esc_html_e( 'Buy it if you…', 'kvp-theme' ); ?></div>
				<ul class="buy-list">
					<?php foreach ( $buy_if_items as $item ) : ?>
					<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
			<?php if ( $skip_if_items ) : ?>
			<div class="buy-card s">
				<div class="buy-title s">&#10007; <?php esc_html_e( 'Skip it if you…', 'kvp-theme' ); ?></div>
				<ul class="buy-list">
					<?php foreach ( $skip_if_items as $item ) : ?>
					<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>

	<!-- PROS / CONS -->
	<?php
	$pros_items = $pros_raw ? array_filter( array_map( 'trim', explode( '|', $pros_raw ) ) ) : array();
	$cons_items = $cons_raw ? array_filter( array_map( 'trim', explode( '|', $cons_raw ) ) ) : array();
	if ( $pros_items || $cons_items ) :
	?>
	<div class="sec">
		<h2 class="sec-title"><?php esc_html_e( 'Pros and cons', 'kvp-theme' ); ?></h2>
		<div class="pc-grid">
			<?php if ( $pros_items ) : ?>
			<div class="pc-col p">
				<div class="pc-head p">&#8593; <?php esc_html_e( 'What buyers love', 'kvp-theme' ); ?></div>
				<ul class="pc-list">
					<?php foreach ( $pros_items as $item ) : ?>
					<li><span class="pc-icon p" aria-hidden="true">+</span><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
			<?php if ( $cons_items ) : ?>
			<div class="pc-col c">
				<div class="pc-head c">&#8595; <?php esc_html_e( 'What buyers dislike', 'kvp-theme' ); ?></div>
				<ul class="pc-list">
					<?php foreach ( $cons_items as $item ) : ?>
					<li><span class="pc-icon c" aria-hidden="true">&#8722;</span><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>

	<!-- SPECS TABLE -->
	<?php if ( $spec_pairs ) : ?>
	<div class="sec">
		<h2 class="sec-title"><?php esc_html_e( 'Quick specs', 'kvp-theme' ); ?></h2>
		<table class="specs">
			<tbody>
				<?php foreach ( $spec_pairs as $pair ) : ?>
				<tr>
					<td><?php echo esc_html( $pair[0] ); ?></td>
					<td><?php echo esc_html( $pair[1] ); ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php endif; ?>

	<!-- CTA 1 — mid-page price bar (always renders) -->
	<div class="cta1">
		<div>
			<?php if ( $kvp_price ) : ?>
			<div class="cta1-price">~$<?php echo esc_html( $kvp_price ); ?></div>
			<?php endif; ?>
			<div class="cta1-note"><?php esc_html_e( 'Price at time of writing · may vary on Amazon', 'kvp-theme' ); ?></div>
		</div>
		<a href="<?php echo esc_url( $amazon_href ); ?>" rel="sponsored nofollow" target="_blank" class="btn-cta1">
			<?php esc_html_e( 'Check price on Amazon', 'kvp-theme' ); ?>
		</a>
	</div>

	<!-- FINAL VERDICT — red box (always renders) — CTA button 3 of 3 -->
	<div class="final">
		<div class="final-badge"><?php esc_html_e( 'Final verdict', 'kvp-theme' ); ?></div>

		<?php if ( $kvp_rating ) : ?>
		<div class="final-score-row">
			<span class="final-score-num"><?php echo esc_html( $kvp_rating ); ?></span>
			<div>
				<div class="final-stars" aria-label="<?php esc_attr_e( '5 stars', 'kvp-theme' ); ?>">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
				<?php if ( $kvp_review_count ) : ?>
				<div class="final-sub">
					<?php
					/* translators: %s: review count */
					printf( esc_html__( 'Based on %s verified Amazon reviews', 'kvp-theme' ), esc_html( $kvp_review_count ) );
					?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if ( $kvp_final_verdict ) : ?>
		<p class="final-text"><?php echo esc_html( $kvp_final_verdict ); ?></p>
		<?php endif; ?>

		<a href="<?php echo esc_url( $amazon_href ); ?>" rel="sponsored nofollow" target="_blank" class="btn-red-block">
			<?php esc_html_e( 'Check price on Amazon →', 'kvp-theme' ); ?>
		</a>
	</div>

</div>
</main>

<?php endwhile; ?>
<?php get_footer();
