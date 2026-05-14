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
      <h2 class="kvp-sec-title"><?php esc_html_e( 'Kettles', 'kvp-theme' ); ?></h2>
      <?php if ( $kt_cat ) : ?>
      <a href="<?php echo esc_url( get_category_link( $kt_cat->term_id ) ); ?>" class="kvp-sec-link">
        <?php esc_html_e( 'See all Kettle reviews →', 'kvp-theme' ); ?>
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
        'air-fryers'  => 'A',
        'cookware'    => 'C',
        'kettles'     => 'K',
        'multicooker' => 'M',
        'bakeware'    => 'B',
    ];
    ?>
    <div class="kvp-cat-grid">
      <?php foreach ( $all_cats as $sc ) :
          $icon        = isset( $cat_icons[ $sc->slug ] ) ? $cat_icons[ $sc->slug ] : '🍴';
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
