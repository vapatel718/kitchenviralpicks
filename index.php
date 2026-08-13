<?php get_header(); ?>

<?php
if ( is_user_logged_in() && current_user_can( 'administrator' ) ) {
    $dbg_hero = new WP_Query( [
        'category_name'  => 'cookware',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'meta_key'       => 'kvp_deborah_rating',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
    ] );
    $dbg_af = new WP_Query( [
        'category_name'  => 'air-fryers',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
    ] );
    $dbg_cw = new WP_Query( [
        'tax_query'      => [ [ 'taxonomy' => 'category', 'field' => 'slug', 'terms' => [ 'cookware' ] ] ],
        'posts_per_page' => 1,
        'post_status'    => 'publish',
    ] );
    $dbg_kt = new WP_Query( [
        'tax_query'      => [ [ 'taxonomy' => 'category', 'field' => 'slug', 'terms' => [ 'kettles', 'multicooker' ], 'operator' => 'IN' ] ],
        'posts_per_page' => 1,
        'post_status'    => 'publish',
    ] );
    echo "<!--\n";
    echo "KVP DEBUG — WP_Query found_posts (admin only, temporary)\n";
    echo "hero_q  (cookware, ordered by kvp_deborah_rating):    found_posts=" . intval( $dbg_hero->found_posts ) . "\n";
    echo "af_q    (air-fryers, up to 4):                found_posts=" . intval( $dbg_af->found_posts ) . "\n";
    echo "cw_q    (cookware, up to 6):                  found_posts=" . intval( $dbg_cw->found_posts ) . "\n";
    echo "kt_q    (kettles + multicooker, up to 4):     found_posts=" . intval( $dbg_kt->found_posts ) . "\n";
    echo "-->\n";
}
?>

<div class="kvp-page-wrap">

  <!-- ================================================
       HERO SECTION
       ================================================ -->
  <section class="kvp-hero">
  <div class="kvp-inner">

    <div class="kvp-hero-text">
      <p class="kvp-hero-eyebrow">
        <span class="kvp-hero-dot"></span>
        <?php esc_html_e( 'Research-backed kitchen picks', 'kvp-theme' ); ?>
      </p>
      <h1 class="kvp-hero-h1">
        <?php esc_html_e( 'Stop guessing.', 'kvp-theme' ); ?><br>
        <?php esc_html_e( 'Buy the', 'kvp-theme' ); ?> <em><?php esc_html_e( 'right', 'kvp-theme' ); ?></em> <?php esc_html_e( 'pan.', 'kvp-theme' ); ?>
      </h1>
      <p class="kvp-hero-sub">
        <?php esc_html_e( "Deborah researches thousands of verified buyer reviews so you don't waste money on the wrong kitchen gear. Every pick is honest, every review is backed by real data.", 'kvp-theme' ); ?>
      </p>
      <a href="#reviews" class="kvp-hero-btn"><?php esc_html_e( 'See our top picks', 'kvp-theme' ); ?></a>
      <div class="kvp-hero-trust">
        <div class="kvp-trust-item">
          <span class="kvp-trust-dot"></span>
          <?php esc_html_e( 'No fake reviews', 'kvp-theme' ); ?>
        </div>
        <div class="kvp-trust-item">
          <span class="kvp-trust-dot"></span>
          <?php esc_html_e( 'Real buyer data', 'kvp-theme' ); ?>
        </div>
        <div class="kvp-trust-item">
          <span class="kvp-trust-dot"></span>
          <?php esc_html_e( 'Zero fluff', 'kvp-theme' ); ?>
        </div>
      </div>
    </div>

    <?php
    $hero_q = new WP_Query( [
        'category_name'  => 'cookware',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'meta_key'       => 'kvp_deborah_rating',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
    ] );
    $h_link    = '#';
    $h_name    = '';
    $h_rating   = '';
    $h_dr_label = '';
    $h_price   = '';
    $h_verdict = '';
    $h_img_url = '';
    if ( $hero_q->have_posts() ) {
        $hero_q->the_post();
        $h_link    = get_permalink();
        $h_name    = get_post_meta( get_the_ID(), 'kvp_product_name', true ) ?: get_the_title();
        $h_rating   = get_post_meta( get_the_ID(), 'kvp_deborah_rating', true ) ?: '8.0';
        $h_dr_label = get_post_meta( get_the_ID(), 'kvp_deborah_rating_label', true );
        $price_key = kvp_get_price_key( get_the_ID() );
        $h_price   = kvp_get_price( $price_key, 'kvp_price', get_the_ID() );
        $h_verdict = get_post_meta( get_the_ID(), 'kvp_card_verdict', true )
                     ?: get_post_meta( get_the_ID(), 'kvp_verdict_line', true )
                     ?: $h_verdict;
        $h_img_url = get_post_meta( get_the_ID(), 'kvp_product_image', true )
                     ?: ( has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'medium' ) : '' );
        wp_reset_postdata();
    }
    ?>

    <div class="kvp-hero-card">
      <span class="kvp-hero-card-badge"><?php esc_html_e( 'Top Pick — Non-Toxic Cookware', 'kvp-theme' ); ?></span>
      <div class="kvp-hero-card-img" role="presentation">
        <?php if ( $h_img_url ) : ?>
          <img src="<?php echo esc_url( $h_img_url ); ?>" alt="<?php echo esc_attr( $h_name ); ?>" style="max-height:100%;max-width:100%;object-fit:contain;">
        <?php else : ?>
          <svg width="52" height="52" viewBox="0 0 48 48" fill="none" aria-hidden="true">
            <path d="M7 34 L7 22 Q7 20 9 20 L31 20 Q33 20 33 22 L33 34 Q33 36 31 36 L9 36 Q7 36 7 34Z" fill="#E8401C" opacity="0.15"/>
            <path d="M7.5 20 Q8 15 20 15 Q32 15 32.5 20" fill="#E8401C" opacity="0.15"/>
            <path d="M33 28 L43 25" stroke="#E8401C" stroke-width="3.2" stroke-linecap="round" opacity="0.15"/>
          </svg>
        <?php endif; ?>
      </div>
      <div class="kvp-hero-card-body">
        <p class="kvp-hero-card-title"><?php echo esc_html( $h_name ); ?></p>
        <p class="kvp-hero-card-rating">
          <span class="kvp-card-dr">
            <span class="kvp-card-dr-score"><?php echo esc_html( $h_rating ); ?></span>
            <?php if ( $h_dr_label ) : ?>
            <span class="kvp-card-dr-label" style="background:<?php echo ( floatval( $h_rating ) >= 7.0 ) ? '#E8401C' : '#F76B35'; ?>;"><?php echo esc_html( $h_dr_label ); ?></span>
            <?php endif; ?>
          </span>
        </p>
        <p class="kvp-hero-card-price">~$<?php echo esc_html( $h_price ); ?></p>
        <p class="kvp-hero-card-price-note"><?php esc_html_e( 'at time of writing · price may vary', 'kvp-theme' ); ?></p>
        <div class="kvp-hero-card-verdict">&ldquo;<?php echo esc_html( $h_verdict ); ?>&rdquo;</div>
        <a href="<?php echo esc_url( $h_link ); ?>" class="kvp-hero-card-btn">
          <?php esc_html_e( 'Read full review', 'kvp-theme' ); ?>
        </a>
      </div>
    </div>

  </div><!-- .kvp-inner -->
  </section>


  <!-- ================================================
       TRUST PILLARS BAR
       ================================================ -->
  <section class="kvp-trust-bar" aria-label="<?php esc_attr_e( 'Why trust KitchenViralPicks', 'kvp-theme' ); ?>">
    <div class="kvp-inner">
      <div class="kvp-trust-pillar">
        <svg class="kvp-trust-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#F76B35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        <div class="kvp-trust-text">
          <span class="kvp-trust-headline"><?php esc_html_e( 'No sponsored reviews', 'kvp-theme' ); ?></span>
          <span class="kvp-trust-sub"><?php esc_html_e( 'Every pick is editorially independent', 'kvp-theme' ); ?></span>
        </div>
      </div>
      <div class="kvp-trust-pillar">
        <svg class="kvp-trust-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#F76B35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        <div class="kvp-trust-text">
          <span class="kvp-trust-headline"><?php esc_html_e( 'Every safety claim source-verified', 'kvp-theme' ); ?></span>
          <span class="kvp-trust-sub"><?php esc_html_e( 'FDA, EPA, and peer-reviewed citations', 'kvp-theme' ); ?></span>
        </div>
      </div>
      <div class="kvp-trust-pillar">
        <svg class="kvp-trust-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#F76B35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
        <div class="kvp-trust-text">
          <span class="kvp-trust-headline"><?php esc_html_e( 'Zero PFAS. Zero PTFE. Zero compromise.', 'kvp-theme' ); ?></span>
          <span class="kvp-trust-sub"><?php esc_html_e( 'Non-toxic cookware is all we cover', 'kvp-theme' ); ?></span>
        </div>
      </div>
    </div><!-- .kvp-inner -->
  </section>


  <!-- ================================================
       REVIEW SECTIONS
       ================================================ -->
  <section class="kvp-reviews" id="reviews">
  <div class="kvp-inner">

    <?php
    /* ---- Air Fryers — 2-col ---- */
    $af_q = new WP_Query( [
        'category_name'  => 'air-fryers',
        'posts_per_page' => 4,
        'post_status'    => 'publish',
    ] );
    if ( $af_q->have_posts() ) :
        $af_cat = get_category_by_slug( 'air-fryers' );
        // Split into roundup and regular — render roundup above section header
        $af_roundup = [];
        $af_regular = [];
        foreach ( $af_q->posts as $af_post ) {
            if ( get_post_meta( $af_post->ID, 'kvp_is_roundup', true ) === '1' ) {
                $af_roundup[] = $af_post;
            } else {
                $af_regular[] = $af_post;
            }
        }
    ?>
    <?php foreach ( $af_roundup as $post ) : setup_postdata( $post );
        $featured_img_url = get_post_meta( get_the_ID(), 'kvp_product_image', true );
        if ( ! $featured_img_url ) {
            $thumb_id = get_post_thumbnail_id();
            if ( $thumb_id ) {
                $featured_img_url = wp_get_attachment_image_url( $thumb_id, 'large' );
            }
        }
    ?>
    <div class="kvp-featured-wrap">
    <div class="kvp-featured-card">
        <div class="kvp-featured-img">
            <?php if ( $featured_img_url ) : ?>
                <img src="<?php echo esc_url( $featured_img_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy">
            <?php else : ?>
                <div class="kvp-featured-img-placeholder"></div>
            <?php endif; ?>
        </div>
        <div class="kvp-featured-body">
            <span class="kvp-buyers-guide-badge"><?php esc_html_e( "Buyer's Guide", 'kvp-theme' ); ?></span>
            <p class="kvp-featured-eyebrow"><?php esc_html_e( 'Air Fryers', 'kvp-theme' ); ?> &middot; <?php echo esc_html( get_post_meta( get_the_ID(), 'kvp_card_picks', true ) ); ?></p>            <p class="kvp-featured-desc"><?php esc_html_e( 'Deborah\'s data-backed picks for air fryers that actually earn repeat buyers.', 'kvp-theme' ); ?></p>
            <div class="kvp-featured-pills">
                <span class="kvp-featured-pill"><?php echo esc_html( get_post_meta( get_the_ID(), 'kvp_card_picks', true ) ); ?></span>
                <span class="kvp-featured-pill"><?php esc_html_e( 'Under $100', 'kvp-theme' ); ?></span>
                <span class="kvp-featured-pill"><?php esc_html_e( 'Deborah\'s top pick', 'kvp-theme' ); ?></span>
            </div>
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="kvp-featured-btn"><?php esc_html_e( 'See all picks', 'kvp-theme' ); ?> &rarr;</a>
        </div>
    </div>
    </div>
    <?php endforeach; wp_reset_postdata(); ?>
    <div class="kvp-sec-hdr">
      <h2 class="kvp-sec-title"><?php esc_html_e( 'Air Fryers', 'kvp-theme' ); ?></h2>
      <?php if ( $af_cat ) : ?>
      <a href="<?php echo esc_url( get_category_link( $af_cat->term_id ) ); ?>" class="kvp-sec-link">
        <?php esc_html_e( 'See all Air Fryer reviews →', 'kvp-theme' ); ?>
      </a>
      <?php endif; ?>
    </div>
    <div class="kvp-grid kvp-grid-2 kvp-grid--af">
      <?php foreach ( $af_regular as $post ) : setup_postdata( $post );
          $pname  = get_post_meta( get_the_ID(), 'kvp_product_name', true ) ?: get_the_title();
          $rating = get_post_meta( get_the_ID(), 'kvp_rating', true );
          $count  = get_post_meta( get_the_ID(), 'kvp_review_count', true );
          $dr       = get_post_meta( get_the_ID(), 'kvp_deborah_rating',       true );
          $dr_label = get_post_meta( get_the_ID(), 'kvp_deborah_rating_label', true );
          $price_key  = kvp_get_price_key( get_the_ID() );
          $price      = kvp_get_price( $price_key, 'kvp_price', get_the_ID() );
      ?>
      <div class="kvp-rc kvp-rc--horiz-mobile">
        <?php $kvp_img = get_post_meta( get_the_ID(), 'kvp_product_image', true ); ?>
        <div class="kvp-rc-img" role="presentation">
          <?php if ( $kvp_img ) : ?>
            <img src="<?php echo esc_url( $kvp_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy" />
          <?php elseif ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
          <?php else : ?>
            <svg width="36" height="36" viewBox="0 0 48 48" fill="none" opacity="0.15" aria-hidden="true"><path d="M7 34 L7 22 Q7 20 9 20 L31 20 Q33 20 33 22 L33 34 Q33 36 31 36 L9 36 Q7 36 7 34Z" fill="#E8401C"/><path d="M7.5 20 Q8 15 20 15 Q32 15 32.5 20" fill="#E8401C"/><path d="M33 28 L43 25" stroke="#E8401C" stroke-width="3.2" stroke-linecap="round"/></svg>
          <?php endif; ?>
        </div>
        <div class="kvp-rc-body">
          <p class="kvp-rc-cat"><?php esc_html_e( 'Air Fryers', 'kvp-theme' ); ?></p>
          <p class="kvp-rc-title"><?php echo esc_html( $pname ); ?></p>
          <p class="kvp-rc-meta">
            <?php if ( $dr ) : ?>
            <span class="kvp-card-dr">
              <span class="kvp-card-dr-score"><?php echo esc_html( $dr ? number_format( floatval( $dr ), 1 ) : $rating ); ?></span>
              <?php if ( $dr && $dr_label ) : ?>
              <span class="kvp-card-dr-label" style="background:<?php echo ( floatval( $dr ) >= 7.0 ) ? '#E8401C' : '#F76B35'; ?>;"><?php echo esc_html( $dr_label ); ?></span>
              <?php endif; ?>
            </span>
            <?php endif; ?>
          </p>
          <?php if ( $price ) : ?>
          <p class="kvp-rc-price">~$<?php echo esc_html( $price ); ?></p>
          <p class="kvp-rc-price-note"><?php esc_html_e( 'at time of writing · price may vary', 'kvp-theme' ); ?></p>
          <?php endif; ?>
          <div class="kvp-rc-spacer"></div>
          <a href="<?php the_permalink(); ?>" class="kvp-rc-btn"><?php esc_html_e( 'Read review', 'kvp-theme' ); ?></a>
        </div>
      </div>
      <?php endforeach; wp_reset_postdata(); ?>
    </div>
    <?php else : ?>
    <div class="kvp-sec-hdr">
      <h2 class="kvp-sec-title"><?php esc_html_e( 'Air Fryers', 'kvp-theme' ); ?></h2>
    </div>
    <div class="kvp-grid kvp-grid-2 kvp-grid--af">
      <div class="kvp-rc kvp-rc--coming-soon">
        <div class="kvp-rc-body">
          <p class="kvp-rc-title"><?php esc_html_e( 'Reviews coming soon', 'kvp-theme' ); ?></p>
        </div>
      </div>
    </div>
    <?php endif; ?>


    <?php
    /* ---- Cookware — 3-col ---- */
    $cw_q = new WP_Query( [
        'tax_query'      => [
            [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => ['cookware'],
            ],
        ],
        'posts_per_page' => 6,
        'post_status'    => 'publish',
    ] );
    if ( $cw_q->have_posts() ) :
        $cw_cat = get_category_by_slug( 'cookware' );
    ?>
    <div class="kvp-sec-hdr">
      <h2 class="kvp-sec-title"><?php esc_html_e( 'Cookware', 'kvp-theme' ); ?></h2>
      <?php if ( $cw_cat ) : ?>
      <a href="<?php echo esc_url( get_category_link( $cw_cat->term_id ) ); ?>" class="kvp-sec-link">
        <?php esc_html_e( 'See all Cookware reviews →', 'kvp-theme' ); ?>
      </a>
      <?php endif; ?>
    </div>
    <div class="kvp-grid kvp-grid-3">
      <?php while ( $cw_q->have_posts() ) : $cw_q->the_post();
          $pname  = get_post_meta( get_the_ID(), 'kvp_product_name', true ) ?: get_the_title();
          $rating = get_post_meta( get_the_ID(), 'kvp_rating', true );
          $count  = get_post_meta( get_the_ID(), 'kvp_review_count', true );
          $dr       = get_post_meta( get_the_ID(), 'kvp_deborah_rating',       true );
          $dr_label = get_post_meta( get_the_ID(), 'kvp_deborah_rating_label', true );
          $price_key  = kvp_get_price_key( get_the_ID() );
          $price      = kvp_get_price( $price_key, 'kvp_price', get_the_ID() );
      ?>
      <div class="kvp-rc">
        <?php $kvp_img = get_post_meta( get_the_ID(), 'kvp_product_image', true ); ?>
        <div class="kvp-rc-img" role="presentation">
          <?php if ( $kvp_img ) : ?>
            <img src="<?php echo esc_url( $kvp_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy" />
          <?php elseif ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
          <?php else : ?>
            <svg width="36" height="36" viewBox="0 0 48 48" fill="none" opacity="0.15" aria-hidden="true"><path d="M7 34 L7 22 Q7 20 9 20 L31 20 Q33 20 33 22 L33 34 Q33 36 31 36 L9 36 Q7 36 7 34Z" fill="#E8401C"/><path d="M7.5 20 Q8 15 20 15 Q32 15 32.5 20" fill="#E8401C"/><path d="M33 28 L43 25" stroke="#E8401C" stroke-width="3.2" stroke-linecap="round"/></svg>
          <?php endif; ?>
        </div>
        <div class="kvp-rc-body">
          <p class="kvp-rc-cat"><?php esc_html_e( 'Cookware', 'kvp-theme' ); ?></p>
          <p class="kvp-rc-title"><?php echo esc_html( $pname ); ?></p>
          <p class="kvp-rc-meta">
            <?php if ( $dr ) : ?>
            <span class="kvp-card-dr">
              <span class="kvp-card-dr-score"><?php echo esc_html( $dr ? number_format( floatval( $dr ), 1 ) : $rating ); ?></span>
              <?php if ( $dr && $dr_label ) : ?>
              <span class="kvp-card-dr-label" style="background:<?php echo ( floatval( $dr ) >= 7.0 ) ? '#E8401C' : '#F76B35'; ?>;"><?php echo esc_html( $dr_label ); ?></span>
              <?php endif; ?>
            </span>
            <?php endif; ?>
          </p>
          <?php if ( $price ) : ?>
          <p class="kvp-rc-price">~$<?php echo esc_html( $price ); ?></p>
          <p class="kvp-rc-price-note"><?php esc_html_e( 'at time of writing · price may vary', 'kvp-theme' ); ?></p>
          <?php endif; ?>
          <div class="kvp-rc-spacer"></div>
          <a href="<?php the_permalink(); ?>" class="kvp-rc-btn"><?php esc_html_e( 'Read review', 'kvp-theme' ); ?></a>
        </div>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php else : ?>
    <div class="kvp-sec-hdr">
      <h2 class="kvp-sec-title"><?php esc_html_e( 'Cookware', 'kvp-theme' ); ?></h2>
    </div>
    <div class="kvp-grid kvp-grid-3">
      <div class="kvp-rc kvp-rc--coming-soon">
        <div class="kvp-rc-body">
          <p class="kvp-rc-title"><?php esc_html_e( 'Reviews coming soon', 'kvp-theme' ); ?></p>
        </div>
      </div>
    </div>
    <?php endif; ?>


    <?php
    /* ---- Kettles + Multicooker — 2-col combined ---- */
    $kt_q = new WP_Query( [
        'tax_query'      => [
            [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => ['kettles', 'multicooker'],
                'operator' => 'IN',
            ],
        ],
        'posts_per_page' => 4,
        'post_status'    => 'publish',
    ] );
    if ( $kt_q->have_posts() ) :
        $kt_cat = get_category_by_slug( 'kettles' );
    ?>
    <div class="kvp-sec-hdr">
      <h2 class="kvp-sec-title"><?php esc_html_e( 'Kettles & Multicookers', 'kvp-theme' ); ?></h2>
      <?php if ( $kt_cat ) : ?>
      <a href="<?php echo esc_url( get_category_link( $kt_cat->term_id ) ); ?>" class="kvp-sec-link">
        <?php esc_html_e( 'See all reviews →', 'kvp-theme' ); ?>
      </a>
      <?php endif; ?>
    </div>
    <div class="kvp-grid kvp-grid-2 kvp-grid--kt kvp-grid--last">
      <?php while ( $kt_q->have_posts() ) : $kt_q->the_post();
          $pname  = get_post_meta( get_the_ID(), 'kvp_product_name', true ) ?: get_the_title();
          $rating = get_post_meta( get_the_ID(), 'kvp_rating', true );
          $count  = get_post_meta( get_the_ID(), 'kvp_review_count', true );
          $dr       = get_post_meta( get_the_ID(), 'kvp_deborah_rating',       true );
          $dr_label = get_post_meta( get_the_ID(), 'kvp_deborah_rating_label', true );
          $price_key  = kvp_get_price_key( get_the_ID() );
          $price      = kvp_get_price( $price_key, 'kvp_price', get_the_ID() );
          $cats   = get_the_terms( get_the_ID(), 'category' );
          $cname  = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->name : '';
      ?>
      <div class="kvp-rc kvp-rc--horiz-mobile">
        <?php $kvp_img = get_post_meta( get_the_ID(), 'kvp_product_image', true ); ?>
        <div class="kvp-rc-img" role="presentation">
          <?php if ( $kvp_img ) : ?>
            <img src="<?php echo esc_url( $kvp_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy" />
          <?php elseif ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
          <?php else : ?>
            <svg width="36" height="36" viewBox="0 0 48 48" fill="none" opacity="0.15" aria-hidden="true"><path d="M7 34 L7 22 Q7 20 9 20 L31 20 Q33 20 33 22 L33 34 Q33 36 31 36 L9 36 Q7 36 7 34Z" fill="#E8401C"/><path d="M7.5 20 Q8 15 20 15 Q32 15 32.5 20" fill="#E8401C"/><path d="M33 28 L43 25" stroke="#E8401C" stroke-width="3.2" stroke-linecap="round"/></svg>
          <?php endif; ?>
        </div>
        <div class="kvp-rc-body">
          <p class="kvp-rc-cat"><?php echo esc_html( $cname ); ?></p>
          <p class="kvp-rc-title"><?php echo esc_html( $pname ); ?></p>
          <p class="kvp-rc-meta">
            <?php if ( $dr ) : ?>
            <span class="kvp-card-dr">
              <span class="kvp-card-dr-score"><?php echo esc_html( $dr ? number_format( floatval( $dr ), 1 ) : $rating ); ?></span>
              <?php if ( $dr && $dr_label ) : ?>
              <span class="kvp-card-dr-label" style="background:<?php echo ( floatval( $dr ) >= 7.0 ) ? '#E8401C' : '#F76B35'; ?>;"><?php echo esc_html( $dr_label ); ?></span>
              <?php endif; ?>
            </span>
            <?php endif; ?>
          </p>
          <?php if ( $price ) : ?>
          <p class="kvp-rc-price">~$<?php echo esc_html( $price ); ?></p>
          <p class="kvp-rc-price-note"><?php esc_html_e( 'at time of writing · price may vary', 'kvp-theme' ); ?></p>
          <?php endif; ?>
          <div class="kvp-rc-spacer"></div>
          <a href="<?php the_permalink(); ?>" class="kvp-rc-btn"><?php esc_html_e( 'Read review', 'kvp-theme' ); ?></a>
        </div>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php else : ?>
    <div class="kvp-sec-hdr">
      <h2 class="kvp-sec-title"><?php esc_html_e( 'Kettles & Multicookers', 'kvp-theme' ); ?></h2>
    </div>
    <div class="kvp-grid kvp-grid-2 kvp-grid--kt kvp-grid--last">
      <div class="kvp-rc kvp-rc--coming-soon">
        <div class="kvp-rc-body">
          <p class="kvp-rc-title"><?php esc_html_e( 'Reviews coming soon', 'kvp-theme' ); ?></p>
        </div>
      </div>
    </div>
    <?php endif; ?>

  </div><!-- .kvp-inner -->
  </section>


  <!-- ================================================
       BROWSE BY CATEGORY
       ================================================ -->
  <section class="kvp-cat-strip">
  <div class="kvp-inner">
    <h2 class="kvp-cat-strip-title"><?php esc_html_e( 'Browse by category', 'kvp-theme' ); ?></h2>

    <?php
    $uncategorized_id = get_cat_ID( 'Uncategorized' );
    $cookware_guides_term = get_term_by( 'slug', 'cookware-guides', 'category' );
    $cookware_guides_id = $cookware_guides_term ? $cookware_guides_term->term_id : 0;
    $all_cats = get_categories( [
        'hide_empty' => false,
        'orderby'    => 'name',
        'order'      => 'ASC',
        'exclude'    => [ $uncategorized_id, $cookware_guides_id ],
    ] );
    $cat_icons = [
        'air-fryers'   => '<svg width="64" height="64" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <rect x="14" y="18" width="52" height="50" rx="8" stroke="#E8401C" stroke-width="1.8"/>
  <line x1="14" y1="32" x2="66" y2="32" stroke="#E8401C" stroke-width="1.5" opacity="0.5"/>
  <circle cx="40" cy="24" r="5" stroke="#E8401C" stroke-width="2"/>
  <circle cx="40" cy="24" r="2.5" fill="#E8401C"/>
  <rect x="20" y="36" width="40" height="8" rx="3" stroke="#E8401C" stroke-width="2"/>
  <rect x="24" y="38" width="12" height="4" rx="1.5" stroke="#E8401C" stroke-width="1.2" opacity="0.6"/>
  <rect x="40" y="38" width="16" height="4" rx="1.5" stroke="#E8401C" stroke-width="1.2" opacity="0.4"/>
  <rect x="16" y="48" width="48" height="16" rx="5" stroke="#E8401C" stroke-width="2"/>
  <rect x="30" y="56" width="20" height="4" rx="2" stroke="#E8401C" stroke-width="1.5"/>
  <rect x="19" y="65" width="8" height="4" rx="2" stroke="#E8401C" stroke-width="1.5"/>
  <rect x="53" y="65" width="8" height="4" rx="2" stroke="#E8401C" stroke-width="1.5"/>
</svg>',
        'bakeware'     => '<svg width="64" height="64" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <rect x="10" y="38" width="64" height="8" rx="3" stroke="#E8401C" stroke-width="2"/>
  <rect x="10" y="42" width="64" height="22" rx="4" stroke="#E8401C" stroke-width="2.5"/>
  <ellipse cx="26" cy="40" rx="8" ry="7" stroke="#E8401C" stroke-width="2"/>
  <ellipse cx="42" cy="40" rx="8" ry="7" stroke="#E8401C" stroke-width="2"/>
  <ellipse cx="58" cy="40" rx="8" ry="7" stroke="#E8401C" stroke-width="2"/>
  <circle cx="24" cy="35" r="1.2" fill="#E8401C" opacity="0.7"/>
  <circle cx="28" cy="33" r="1.2" fill="#E8401C" opacity="0.7"/>
  <circle cx="40" cy="34" r="1.2" fill="#E8401C" opacity="0.7"/>
  <circle cx="44" cy="36" r="1.2" fill="#E8401C" opacity="0.7"/>
  <circle cx="56" cy="33" r="1.2" fill="#E8401C" opacity="0.7"/>
  <circle cx="61" cy="36" r="1.2" fill="#E8401C" opacity="0.7"/>
  <rect x="6" y="44" width="6" height="12" rx="3" stroke="#E8401C" stroke-width="2"/>
  <rect x="72" y="44" width="6" height="12" rx="3" stroke="#E8401C" stroke-width="2"/>
</svg>',
        'blenders'     => '<svg width="64" height="64" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path d="M26 58 L22 28 Q22 24 26 24 L54 24 Q58 24 58 28 L54 58 Z" stroke="#E8401C" stroke-width="1.8" stroke-linejoin="round"/>
  <rect x="26" y="18" width="28" height="8" rx="4" stroke="#E8401C" stroke-width="2"/>
  <rect x="35" y="12" width="10" height="8" rx="4" stroke="#E8401C" stroke-width="2"/>
  <rect x="22" y="58" width="36" height="14" rx="5" stroke="#E8401C" stroke-width="2.5"/>
  <circle cx="32" cy="66" r="3" stroke="#E8401C" stroke-width="2"/>
  <circle cx="40" cy="66" r="3" stroke="#E8401C" stroke-width="2"/>
  <circle cx="48" cy="66" r="3" stroke="#E8401C" stroke-width="2"/>
  <line x1="30" y1="56" x2="50" y2="56" stroke="#E8401C" stroke-width="2" stroke-linecap="round" opacity="0.6"/>
  <line x1="48" y1="28" x2="50" y2="52" stroke="#E8401C" stroke-width="1.5" stroke-linecap="round" opacity="0.3"/>
</svg>',
        'cookware'     => '<svg width="64" height="64" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <ellipse cx="40" cy="46" rx="26" ry="22" stroke="#E8401C" stroke-width="2.5"/>
  <ellipse cx="40" cy="43" rx="20" ry="16" stroke="#E8401C" stroke-width="1.5" opacity="0.5"/>
  <ellipse cx="40" cy="43" rx="14" ry="11" stroke="#E8401C" stroke-width="1" opacity="0.4"/>
  <ellipse cx="40" cy="43" rx="7" ry="6" stroke="#E8401C" stroke-width="1" opacity="0.3"/>
  <rect x="62" y="40" width="16" height="7" rx="3.5" stroke="#E8401C" stroke-width="2"/>
  <rect x="4" y="41" width="10" height="6" rx="3" stroke="#E8401C" stroke-width="2"/>
  <circle cx="68" cy="43.5" r="1.5" fill="#E8401C"/>
  <circle cx="73" cy="43.5" r="1.5" fill="#E8401C"/>
</svg>',
        'kettles'      => '<svg width="64" height="64" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path d="M18 62 Q18 66 22 66 L54 66 Q58 66 58 62 L58 32 Q58 28 54 28 L22 28 Q18 28 18 32 Z" stroke="#E8401C" stroke-width="2.5"/>
  <path d="M54 40 Q66 38 68 30 Q70 22 64 20 Q60 18 58 24" fill="none" stroke="#E8401C" stroke-width="2.5" stroke-linecap="round"/>
  <ellipse cx="61" cy="19" rx="4" ry="3" stroke="#E8401C" stroke-width="2"/>
  <path d="M18 36 Q7 42 7 52 Q7 61 18 60" fill="none" stroke="#E8401C" stroke-width="2.5" stroke-linecap="round"/>
  <rect x="20" y="22" width="38" height="8" rx="4" stroke="#E8401C" stroke-width="2"/>
  <circle cx="39" cy="18" r="3" stroke="#E8401C" stroke-width="2"/>
  <rect x="16" y="63" width="44" height="6" rx="3" stroke="#E8401C" stroke-width="2"/>
  <line x1="20" y1="50" x2="56" y2="50" stroke="#E8401C" stroke-width="1.2" stroke-linecap="round" opacity="0.5"/>
</svg>',
        'multicooker'  => '<svg width="64" height="64" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <rect x="14" y="22" width="52" height="50" rx="10" stroke="#E8401C" stroke-width="2.5"/>
  <ellipse cx="40" cy="24" rx="24" ry="7" stroke="#E8401C" stroke-width="2"/>
  <rect x="36" y="14" width="8" height="12" rx="4" stroke="#E8401C" stroke-width="2"/>
  <circle cx="40" cy="13" r="3" fill="#E8401C"/>
  <rect x="6" y="36" width="8" height="14" rx="4" stroke="#E8401C" stroke-width="2"/>
  <rect x="66" y="36" width="8" height="14" rx="4" stroke="#E8401C" stroke-width="2"/>
  <rect x="18" y="44" width="44" height="18" rx="4" stroke="#E8401C" stroke-width="2"/>
  <rect x="20" y="46" width="24" height="10" rx="2" stroke="#E8401C" stroke-width="1.5"/>
  <circle cx="54" cy="51" r="6" stroke="#E8401C" stroke-width="2"/>
  <circle cx="54" cy="51" r="3" fill="#E8401C"/>
  <line x1="54" y1="46" x2="54" y2="49" stroke="#E8401C" stroke-width="1.5" stroke-linecap="round"/>
  <circle cx="24" cy="58" r="1.5" fill="#E8401C" opacity="0.8"/>
  <circle cx="29" cy="58" r="1.5" fill="#E8401C" opacity="0.5"/>
  <circle cx="34" cy="58" r="1.5" fill="#E8401C" opacity="0.3"/>
  <rect x="16" y="66" width="48" height="6" rx="3" stroke="#E8401C" stroke-width="2"/>
</svg>',
        'stand-mixers' => '<svg width="64" height="64" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path d="M28 18 Q28 14 32 14 L52 14 Q58 14 58 20 L58 46 Q58 50 54 50 L32 50 Q28 50 28 46 Z" stroke="#E8401C" stroke-width="1.8"/>
  <rect x="26" y="46" width="16" height="16" rx="4" stroke="#E8401C" stroke-width="2"/>
  <path d="M22 62 Q22 74 40 74 Q58 74 58 62" stroke="#E8401C" stroke-width="2.5" stroke-linecap="round" fill="none"/>
  <rect x="14" y="62" width="52" height="8" rx="4" stroke="#E8401C" stroke-width="2"/>
  <circle cx="50" cy="34" r="7" stroke="#E8401C" stroke-width="2"/>
  <circle cx="50" cy="34" r="3" fill="#E8401C"/>
  <line x1="50" y1="29" x2="50" y2="31" stroke="#E8401C" stroke-width="2" stroke-linecap="round"/>
  <rect x="33" y="26" width="14" height="8" rx="2" stroke="#E8401C" stroke-width="1.5"/>
  <line x1="32" y1="18" x2="32" y2="46" stroke="#E8401C" stroke-width="1.5" stroke-linecap="round" opacity="0.2"/>
</svg>',
    ];
    ?>
    <div class="kvp-cat-grid">
      <?php foreach ( $all_cats as $sc ) :
          $icon        = isset( $cat_icons[ $sc->slug ] ) ? $cat_icons[ $sc->slug ] : '<i class="ti ti-tool"></i>';
          $count_label = sprintf(
              /* translators: %d: review count */
              _n( '%d review', '%d reviews', $sc->count, 'kvp-theme' ),
              $sc->count
          );
      ?>
      <a href="<?php echo esc_url( get_category_link( $sc->term_id ) ); ?>"
         class="kvp-cat-card">
        <span class="kvp-cat-icon kvp-cat-icon--<?php echo esc_attr( $sc->slug ); ?>"><?php echo $icon; ?></span>
        <span class="kvp-cat-name"><?php echo esc_html( $sc->name ); ?></span>
        <span class="kvp-cat-count"><?php echo esc_html( $count_label ); ?></span>
      </a>
      <?php endforeach; ?>
    </div>
  </div><!-- .kvp-inner -->
  </section>

</div><!-- .kvp-page-wrap -->

<?php get_footer(); ?>
