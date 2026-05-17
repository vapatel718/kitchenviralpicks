<?php get_header(); ?>

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
        'category_name'  => 'air-fryers',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'meta_key'       => 'kvp_rating',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
    ] );
    $h_link    = '#';
    $h_name    = 'Cosori TurboBlaze Air Fryer 6 Qt';
    $h_rating  = '4.8';
    $h_count   = '19,000';
    $h_price   = '~$89.87';
    $h_verdict = 'Buyers consistently report faster cook times and easier cleanup than older models.';
    if ( $hero_q->have_posts() ) {
        $hero_q->the_post();
        $h_link    = get_permalink();
        $h_name    = get_post_meta( get_the_ID(), 'kvp_product_name', true ) ?: get_the_title();
        $h_rating  = get_post_meta( get_the_ID(), 'kvp_rating', true ) ?: '4.8';
        $h_count   = get_post_meta( get_the_ID(), 'kvp_review_count', true ) ?: '19,000';
        $h_price   = get_post_meta( get_the_ID(), 'kvp_price', true ) ?: '~$89.87';
        $h_verdict = get_post_meta( get_the_ID(), 'kvp_card_verdict', true )
                     ?: get_post_meta( get_the_ID(), 'kvp_verdict_line', true )
                     ?: $h_verdict;
        wp_reset_postdata();
    }
    ?>

    <div class="kvp-hero-card">
      <span class="kvp-hero-card-badge"><?php esc_html_e( 'Top pick — Air Fryers', 'kvp-theme' ); ?></span>
      <div class="kvp-hero-card-img" role="presentation">
        <svg width="52" height="52" viewBox="0 0 48 48" fill="none" aria-hidden="true">
          <path d="M7 34 L7 22 Q7 20 9 20 L31 20 Q33 20 33 22 L33 34 Q33 36 31 36 L9 36 Q7 36 7 34Z" fill="#E8401C" opacity="0.15"/>
          <path d="M7.5 20 Q8 15 20 15 Q32 15 32.5 20" fill="#E8401C" opacity="0.15"/>
          <path d="M33 28 L43 25" stroke="#E8401C" stroke-width="3.2" stroke-linecap="round" opacity="0.15"/>
        </svg>
      </div>
      <div class="kvp-hero-card-body">
        <p class="kvp-hero-card-title"><?php echo esc_html( $h_name ); ?></p>
        <p class="kvp-hero-card-rating">
          <em><?php echo esc_html( $h_rating ); ?>&#9733;</em>
          <?php
          printf(
              /* translators: %s: review count */
              esc_html__( 'on Amazon (%s+ reviews)', 'kvp-theme' ),
              esc_html( $h_count )
          );
          ?>
        </p>
        <p class="kvp-hero-card-price"><?php echo esc_html( $h_price ); ?></p>
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
       STATS BAR
       ================================================ -->
  <section class="kvp-stats-bar" aria-label="<?php esc_attr_e( 'Site stats', 'kvp-theme' ); ?>">
    <div class="kvp-inner">
      <div class="kvp-stat">
        <span class="kvp-stat-num">10</span>
        <span class="kvp-stat-lbl"><?php esc_html_e( 'Products reviewed', 'kvp-theme' ); ?></span>
      </div>
      <div class="kvp-stat">
        <span class="kvp-stat-num">100K+</span>
        <span class="kvp-stat-lbl"><?php esc_html_e( 'Buyer reviews analyzed', 'kvp-theme' ); ?></span>
      </div>
      <div class="kvp-stat">
        <span class="kvp-stat-num">5</span>
        <span class="kvp-stat-lbl"><?php esc_html_e( 'Categories covered', 'kvp-theme' ); ?></span>
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
    ?>
    <div class="kvp-sec-hdr">
      <h2 class="kvp-sec-title"><?php esc_html_e( 'Air Fryers', 'kvp-theme' ); ?></h2>
      <?php if ( $af_cat ) : ?>
      <a href="<?php echo esc_url( get_category_link( $af_cat->term_id ) ); ?>" class="kvp-sec-link">
        <?php esc_html_e( 'See all Air Fryer reviews →', 'kvp-theme' ); ?>
      </a>
      <?php endif; ?>
    </div>
    <div class="kvp-grid kvp-grid-2 kvp-grid--af">
      <?php while ( $af_q->have_posts() ) : $af_q->the_post();
          $pname  = get_post_meta( get_the_ID(), 'kvp_product_name', true ) ?: get_the_title();
          $rating = get_post_meta( get_the_ID(), 'kvp_rating', true );
          $count  = get_post_meta( get_the_ID(), 'kvp_review_count', true );
          $price  = get_post_meta( get_the_ID(), 'kvp_price', true );
      ?>
      <div class="kvp-rc kvp-rc--horiz-mobile">
        <div class="kvp-rc-img" role="presentation">
          <svg width="28" height="28" viewBox="0 0 48 48" fill="none" aria-hidden="true">
            <path d="M7 34 L7 22 Q7 20 9 20 L31 20 Q33 20 33 22 L33 34 Q33 36 31 36 L9 36 Q7 36 7 34Z" fill="#E8401C" opacity="0.15"/>
            <path d="M7.5 20 Q8 15 20 15 Q32 15 32.5 20" fill="#E8401C" opacity="0.15"/>
            <path d="M33 28 L43 25" stroke="#E8401C" stroke-width="3.2" stroke-linecap="round" opacity="0.15"/>
          </svg>
        </div>
        <div class="kvp-rc-body">
          <p class="kvp-rc-cat"><?php esc_html_e( 'Air Fryers', 'kvp-theme' ); ?></p>
          <p class="kvp-rc-title"><?php echo esc_html( $pname ); ?></p>
          <p class="kvp-rc-meta">
            <?php if ( $rating ) : ?><em><?php echo esc_html( $rating ); ?>&#9733;</em><?php endif; ?>
            <?php if ( $count ) : ?>&middot; <?php echo esc_html( $count ); ?>+ <?php esc_html_e( 'reviews', 'kvp-theme' ); ?><?php endif; ?>
          </p>
          <?php if ( $price ) : ?>
          <p class="kvp-rc-price"><?php echo esc_html( $price ); ?></p>
          <p class="kvp-rc-price-note"><?php esc_html_e( 'at time of writing · price may vary', 'kvp-theme' ); ?></p>
          <?php endif; ?>
          <div class="kvp-rc-spacer"></div>
          <a href="<?php the_permalink(); ?>" class="kvp-rc-btn"><?php esc_html_e( 'Read review', 'kvp-theme' ); ?></a>
        </div>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
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
          $price  = get_post_meta( get_the_ID(), 'kvp_price', true );
      ?>
      <div class="kvp-rc">
        <div class="kvp-rc-img" role="presentation">
          <svg width="28" height="28" viewBox="0 0 48 48" fill="none" aria-hidden="true">
            <path d="M7 34 L7 22 Q7 20 9 20 L31 20 Q33 20 33 22 L33 34 Q33 36 31 36 L9 36 Q7 36 7 34Z" fill="#E8401C" opacity="0.15"/>
            <path d="M7.5 20 Q8 15 20 15 Q32 15 32.5 20" fill="#E8401C" opacity="0.15"/>
            <path d="M33 28 L43 25" stroke="#E8401C" stroke-width="3.2" stroke-linecap="round" opacity="0.15"/>
          </svg>
        </div>
        <div class="kvp-rc-body">
          <p class="kvp-rc-cat"><?php esc_html_e( 'Cookware', 'kvp-theme' ); ?></p>
          <p class="kvp-rc-title"><?php echo esc_html( $pname ); ?></p>
          <p class="kvp-rc-meta">
            <?php if ( $rating ) : ?><em><?php echo esc_html( $rating ); ?>&#9733;</em><?php endif; ?>
            <?php if ( $count ) : ?>&middot; <?php echo esc_html( $count ); ?>+ <?php esc_html_e( 'reviews', 'kvp-theme' ); ?><?php endif; ?>
          </p>
          <?php if ( $price ) : ?>
          <p class="kvp-rc-price"><?php echo esc_html( $price ); ?></p>
          <p class="kvp-rc-price-note"><?php esc_html_e( 'at time of writing · price may vary', 'kvp-theme' ); ?></p>
          <?php endif; ?>
          <div class="kvp-rc-spacer"></div>
          <a href="<?php the_permalink(); ?>" class="kvp-rc-btn"><?php esc_html_e( 'Read review', 'kvp-theme' ); ?></a>
        </div>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
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
          $price  = get_post_meta( get_the_ID(), 'kvp_price', true );
          $cats   = get_the_terms( get_the_ID(), 'category' );
          $cname  = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->name : '';
      ?>
      <div class="kvp-rc kvp-rc--horiz-mobile">
        <div class="kvp-rc-img" role="presentation">
          <svg width="28" height="28" viewBox="0 0 48 48" fill="none" aria-hidden="true">
            <path d="M7 34 L7 22 Q7 20 9 20 L31 20 Q33 20 33 22 L33 34 Q33 36 31 36 L9 36 Q7 36 7 34Z" fill="#E8401C" opacity="0.15"/>
            <path d="M7.5 20 Q8 15 20 15 Q32 15 32.5 20" fill="#E8401C" opacity="0.15"/>
            <path d="M33 28 L43 25" stroke="#E8401C" stroke-width="3.2" stroke-linecap="round" opacity="0.15"/>
          </svg>
        </div>
        <div class="kvp-rc-body">
          <p class="kvp-rc-cat"><?php echo esc_html( $cname ); ?></p>
          <p class="kvp-rc-title"><?php echo esc_html( $pname ); ?></p>
          <p class="kvp-rc-meta">
            <?php if ( $rating ) : ?><em><?php echo esc_html( $rating ); ?>&#9733;</em><?php endif; ?>
            <?php if ( $count ) : ?>&middot; <?php echo esc_html( $count ); ?>+ <?php esc_html_e( 'reviews', 'kvp-theme' ); ?><?php endif; ?>
          </p>
          <?php if ( $price ) : ?>
          <p class="kvp-rc-price"><?php echo esc_html( $price ); ?></p>
          <p class="kvp-rc-price-note"><?php esc_html_e( 'at time of writing · price may vary', 'kvp-theme' ); ?></p>
          <?php endif; ?>
          <div class="kvp-rc-spacer"></div>
          <a href="<?php the_permalink(); ?>" class="kvp-rc-btn"><?php esc_html_e( 'Read review', 'kvp-theme' ); ?></a>
        </div>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
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
    $all_cats = get_categories( [
        'hide_empty' => false,
        'orderby'    => 'name',
        'order'      => 'ASC',
        'exclude'    => $uncategorized_id,
    ] );
    $cat_icons = [
        'air-fryers'   => '<svg width="80" height="80" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <rect x="14" y="18" width="52" height="50" rx="8" fill="#E8401C"/>
  <rect x="14" y="18" width="52" height="14" rx="8" fill="#C4300F"/>
  <rect x="14" y="25" width="52" height="7" fill="#C4300F"/>
  <circle cx="40" cy="24" r="5" fill="#FF6B45"/>
  <circle cx="40" cy="24" r="2.5" fill="#C4300F"/>
  <rect x="20" y="36" width="40" height="8" rx="3" fill="#C4300F"/>
  <rect x="24" y="38" width="12" height="4" rx="1.5" fill="#FF6B45" opacity="0.7"/>
  <rect x="40" y="38" width="16" height="4" rx="1.5" fill="#FF6B45" opacity="0.4"/>
  <rect x="16" y="48" width="48" height="16" rx="5" fill="#C4300F"/>
  <rect x="18" y="50" width="44" height="12" rx="4" fill="#B8220A"/>
  <rect x="30" y="56" width="20" height="4" rx="2" fill="#FF6B45"/>
  <rect x="19" y="65" width="8" height="4" rx="2" fill="#B8220A"/>
  <rect x="53" y="65" width="8" height="4" rx="2" fill="#B8220A"/>
</svg>',
        'bakeware'     => '<svg width="80" height="80" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <rect x="10" y="42" width="64" height="22" rx="4" fill="#D4CBC7"/>
  <rect x="10" y="38" width="64" height="8" rx="3" fill="#D4CBC7"/>
  <ellipse cx="26" cy="42" rx="9" ry="5" fill="#B8ABA6"/>
  <ellipse cx="42" cy="42" rx="9" ry="5" fill="#B8ABA6"/>
  <ellipse cx="58" cy="42" rx="9" ry="5" fill="#B8ABA6"/>
  <ellipse cx="26" cy="40" rx="8" ry="7" fill="#E8401C"/>
  <ellipse cx="26" cy="37" rx="8" ry="5" fill="#FF6B45"/>
  <ellipse cx="42" cy="40" rx="8" ry="7" fill="#E8401C"/>
  <ellipse cx="42" cy="37" rx="8" ry="5" fill="#FF6B45"/>
  <ellipse cx="58" cy="40" rx="8" ry="7" fill="#E8401C"/>
  <ellipse cx="58" cy="37" rx="8" ry="5" fill="#FF6B45"/>
  <circle cx="24" cy="35" r="1.2" fill="white" opacity="0.8"/>
  <circle cx="28" cy="33" r="1.2" fill="white" opacity="0.8"/>
  <circle cx="40" cy="34" r="1.2" fill="white" opacity="0.8"/>
  <circle cx="44" cy="36" r="1.2" fill="white" opacity="0.8"/>
  <circle cx="56" cy="33" r="1.2" fill="white" opacity="0.8"/>
  <circle cx="61" cy="36" r="1.2" fill="white" opacity="0.8"/>
  <rect x="6" y="44" width="6" height="12" rx="3" fill="#D4CBC7"/>
  <rect x="72" y="44" width="6" height="12" rx="3" fill="#D4CBC7"/>
</svg>',
        'blenders'     => '<svg width="80" height="80" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <rect x="22" y="58" width="36" height="14" rx="5" fill="#C4300F"/>
  <rect x="24" y="60" width="32" height="4" rx="2" fill="#FF6B45" opacity="0.5"/>
  <circle cx="32" cy="66" r="3" fill="#FF6B45"/>
  <circle cx="40" cy="66" r="3" fill="#FF6B45" opacity="0.5"/>
  <circle cx="48" cy="66" r="3" fill="#FF6B45" opacity="0.3"/>
  <path d="M26 58 L22 28 Q22 24 26 24 L54 24 Q58 24 58 28 L54 58 Z" fill="#E8401C"/>
  <path d="M27 55 L24 36 Q24 32 27 32 L53 32 Q56 32 56 36 L53 55 Z" fill="#FF6B45" opacity="0.6"/>
  <line x1="30" y1="56" x2="50" y2="56" stroke="white" stroke-width="2" stroke-linecap="round" opacity="0.7"/>
  <line x1="40" y1="51" x2="40" y2="61" stroke="white" stroke-width="2" stroke-linecap="round" opacity="0.7"/>
  <rect x="26" y="18" width="28" height="8" rx="4" fill="#C4300F"/>
  <rect x="35" y="12" width="10" height="8" rx="4" fill="#C4300F"/>
  <line x1="48" y1="28" x2="50" y2="52" stroke="white" stroke-width="2" stroke-linecap="round" opacity="0.25"/>
</svg>',
        'cookware'     => '<svg width="80" height="80" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <ellipse cx="40" cy="50" rx="26" ry="8" fill="#B8220A" opacity="0.4"/>
  <ellipse cx="40" cy="46" rx="26" ry="22" fill="#C4300F"/>
  <ellipse cx="40" cy="44" rx="24" ry="20" fill="#E8401C"/>
  <ellipse cx="40" cy="43" rx="20" ry="16" fill="#C4300F"/>
  <ellipse cx="40" cy="43" rx="14" ry="11" fill="none" stroke="#B8220A" stroke-width="1" opacity="0.5"/>
  <ellipse cx="40" cy="43" rx="7" ry="6" fill="none" stroke="#B8220A" stroke-width="1" opacity="0.4"/>
  <rect x="62" y="40" width="16" height="7" rx="3.5" fill="#C4300F"/>
  <rect x="63" y="41.5" width="14" height="4" rx="2" fill="#E8401C"/>
  <rect x="4" y="41" width="10" height="6" rx="3" fill="#C4300F"/>
  <circle cx="68" cy="43.5" r="1.5" fill="#B8220A"/>
  <circle cx="73" cy="43.5" r="1.5" fill="#B8220A"/>
</svg>',
        'kettles'      => '<svg width="80" height="80" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path d="M18 62 Q18 66 22 66 L54 66 Q58 66 58 62 L58 32 Q58 28 54 28 L22 28 Q18 28 18 32 Z" fill="#E8401C"/>
  <line x1="50" y1="30" x2="52" y2="62" stroke="white" stroke-width="3" stroke-linecap="round" opacity="0.15"/>
  <path d="M54 40 Q66 38 68 30 Q70 22 64 20 Q60 18 58 24" fill="none" stroke="#C4300F" stroke-width="6" stroke-linecap="round"/>
  <path d="M54 40 Q66 38 68 30 Q70 22 64 20 Q60 18 58 24" fill="none" stroke="#E8401C" stroke-width="4" stroke-linecap="round"/>
  <ellipse cx="61" cy="19" rx="4" ry="3" fill="#C4300F"/>
  <path d="M18 36 Q6 42 6 52 Q6 62 18 60" fill="none" stroke="#C4300F" stroke-width="7" stroke-linecap="round"/>
  <path d="M18 36 Q7 42 7 52 Q7 61 18 60" fill="none" stroke="#E8401C" stroke-width="5" stroke-linecap="round"/>
  <rect x="20" y="22" width="38" height="8" rx="4" fill="#C4300F"/>
  <circle cx="39" cy="19" r="4" fill="#C4300F"/>
  <circle cx="39" cy="18" r="3" fill="#E8401C"/>
  <rect x="16" y="63" width="44" height="6" rx="3" fill="#C4300F"/>
  <line x1="20" y1="50" x2="56" y2="50" stroke="white" stroke-width="1" stroke-linecap="round" opacity="0.3"/>
</svg>',
        'multicooker'  => '<svg width="80" height="80" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <rect x="14" y="22" width="52" height="50" rx="10" fill="#C4300F"/>
  <rect x="14" y="26" width="52" height="42" rx="8" fill="#E8401C"/>
  <ellipse cx="40" cy="26" rx="26" ry="8" fill="#C4300F"/>
  <ellipse cx="40" cy="24" rx="24" ry="7" fill="#E8401C"/>
  <rect x="36" y="14" width="8" height="12" rx="4" fill="#C4300F"/>
  <rect x="37" y="13" width="6" height="6" rx="3" fill="#FF6B45"/>
  <rect x="6" y="36" width="8" height="14" rx="4" fill="#C4300F"/>
  <rect x="66" y="36" width="8" height="14" rx="4" fill="#C4300F"/>
  <rect x="18" y="44" width="44" height="18" rx="4" fill="#C4300F"/>
  <rect x="20" y="46" width="24" height="10" rx="2" fill="#B8220A"/>
  <rect x="21" y="47" width="22" height="8" rx="1.5" fill="#FF6B45" opacity="0.3"/>
  <circle cx="54" cy="51" r="6" fill="#B8220A"/>
  <circle cx="54" cy="51" r="4" fill="#C4300F"/>
  <line x1="54" y1="46" x2="54" y2="49" stroke="#FF6B45" stroke-width="1.5" stroke-linecap="round"/>
  <circle cx="24" cy="58" r="1.5" fill="#FF6B45" opacity="0.8"/>
  <circle cx="29" cy="58" r="1.5" fill="#FF6B45" opacity="0.5"/>
  <circle cx="34" cy="58" r="1.5" fill="#FF6B45" opacity="0.3"/>
  <rect x="16" y="66" width="48" height="6" rx="3" fill="#C4300F"/>
</svg>',
        'stand-mixers' => '<svg width="80" height="80" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <rect x="14" y="62" width="52" height="8" rx="4" fill="#C4300F"/>
  <rect x="16" y="60" width="48" height="6" rx="3" fill="#E8401C"/>
  <path d="M22 62 Q22 74 40 74 Q58 74 58 62" fill="none" stroke="#C4300F" stroke-width="5" stroke-linecap="round"/>
  <path d="M23 62 Q23 72 40 72 Q57 72 57 62" fill="none" stroke="#E8401C" stroke-width="3" stroke-linecap="round"/>
  <path d="M28 18 Q28 14 32 14 L52 14 Q58 14 58 20 L58 46 Q58 50 54 50 L32 50 Q28 50 28 46 Z" fill="#C4300F"/>
  <path d="M30 18 Q30 16 33 16 L51 16 Q56 16 56 20 L56 46 Q56 48 53 48 L33 48 Q30 48 30 46 Z" fill="#E8401C"/>
  <rect x="26" y="46" width="16" height="16" rx="4" fill="#C4300F"/>
  <rect x="28" y="47" width="12" height="14" rx="3" fill="#E8401C"/>
  <line x1="34" y1="60" x2="34" y2="75" stroke="#C4300F" stroke-width="3" stroke-linecap="round"/>
  <path d="M30 68 Q34 64 38 68" fill="none" stroke="#C4300F" stroke-width="2" stroke-linecap="round"/>
  <path d="M30 72 Q34 68 38 72" fill="none" stroke="#C4300F" stroke-width="2" stroke-linecap="round"/>
  <circle cx="50" cy="34" r="7" fill="#C4300F"/>
  <circle cx="50" cy="34" r="5" fill="#C4300F"/>
  <line x1="50" y1="29" x2="50" y2="33" stroke="#FF6B45" stroke-width="2" stroke-linecap="round"/>
  <rect x="33" y="26" width="14" height="8" rx="2" fill="#C4300F"/>
  <line x1="32" y1="18" x2="32" y2="46" stroke="white" stroke-width="2" stroke-linecap="round" opacity="0.15"/>
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
