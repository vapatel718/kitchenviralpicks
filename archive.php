<?php
/**
 * archive.php — Category archive / review index
 * KitchenViralPicks theme
 */
?>
<?php get_header(); ?>

<?php
$current_cat   = get_queried_object();
$cat_name      = $current_cat ? $current_cat->name : '';
$cat_desc      = $current_cat ? $current_cat->description : '';
$total_posts   = $wp_query->found_posts;
$fallback_desc = __( 'Research-backed picks from thousands of verified buyer reviews. No guessing — just honest data.', 'kvp-theme' );
$display_desc  = ! empty( $cat_desc ) ? $cat_desc : $fallback_desc;
?>

<main id="kvp-arc-main">

    <!-- ================================================================
         1. CATEGORY BANNER
         ================================================================ -->
    <div class="kvp-arc-banner">
        <div class="kvp-arc-wrap">

            <nav class="kvp-arc-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'kvp-theme' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kvp-theme' ); ?></a>
                <span class="kvp-arc-sep" aria-hidden="true">›</span>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Reviews', 'kvp-theme' ); ?></a>
                <span class="kvp-arc-sep" aria-hidden="true">›</span>
                <span class="kvp-arc-current"><?php echo esc_html( $cat_name ); ?></span>
            </nav>

            <div class="kvp-arc-banner-inner">

                <div class="kvp-arc-banner-left">
                    <h1 class="kvp-arc-cat-title"><?php echo esc_html( $cat_name ); ?></h1>
                    <p class="kvp-arc-cat-desc"><?php echo esc_html( $display_desc ); ?></p>
                </div>


            </div>
        </div>
    </div>

    <div class="kvp-arc-content-area">
    <div class="kvp-arc-wrap">

        <!-- ================================================================
             4. DEBORAH'S TOP PICK BANNER
             Tries sticky posts in the category first; falls back to the
             highest-rated post.
             ================================================================ -->
        <?php
        $top_pick = null;

        if ( $current_cat ) {
            $sticky_ids = get_option( 'sticky_posts' );

            if ( ! empty( $sticky_ids ) ) {
                $sticky_q = new WP_Query( array(
                    'post__in'            => $sticky_ids,
                    'cat'                 => $current_cat->term_id,
                    'posts_per_page'      => 1,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => false,
                ) );
                if ( $sticky_q->have_posts() ) {
                    $sticky_q->the_post();
                    $top_pick = get_post();
                    wp_reset_postdata();
                }
            }

            if ( ! $top_pick ) {
                $first_q = new WP_Query( array(
                    'cat'            => $current_cat->term_id,
                    'posts_per_page' => 1,
                    'post_status'    => 'publish',
                    'orderby'        => 'meta_value_num',
                    'meta_key'       => 'kvp_rating',
                    'order'          => 'DESC',
                ) );
                if ( $first_q->have_posts() ) {
                    $first_q->the_post();
                    $top_pick = get_post();
                    wp_reset_postdata();
                }
            }
        }

        if ( $top_pick ) :
            $tp_rating       = get_post_meta( $top_pick->ID, 'kvp_rating',       true );
            $tp_count        = get_post_meta( $top_pick->ID, 'kvp_review_count', true );
            $tp_price        = str_replace( ' at time of writing', '', get_post_meta( $top_pick->ID, 'kvp_price', true ) );
            $tp_product_name = get_post_meta( $top_pick->ID, 'kvp_product_name', true );
            $tp_display_name = $tp_product_name ? $tp_product_name : get_the_title( $top_pick->ID );
        ?>
        <div class="kvp-arc-top-pick">
            <div class="kvp-arc-tp-row">

                <div class="kvp-arc-tp-left">
                    <p class="kvp-arc-top-pick-label"><?php esc_html_e( "Deborah's Top Pick", 'kvp-theme' ); ?></p>
                    <p class="kvp-arc-top-pick-title"><?php echo esc_html( $tp_display_name ); ?></p>
                    <div class="kvp-arc-tp-meta">
                        <?php if ( $tp_rating ) : ?>
                        <span class="kvp-arc-tp-rating"><span aria-hidden="true">★</span> <?php echo esc_html( $tp_rating ); ?><?php if ( $tp_count ) : ?> &middot; <?php echo esc_html( $tp_count ); ?>+ <?php esc_html_e( 'reviews', 'kvp-theme' ); ?><?php endif; ?></span>
                        <?php endif; ?>
                    </div>
                    <?php if ( $tp_price ) : ?>
                    <div class="kvp-arc-top-price-row">
                        <span class="kvp-arc-price-pill"><?php echo esc_html( $tp_price ); ?></span>
                        <span class="kvp-arc-price-note"><?php esc_html_e( 'at time of writing', 'kvp-theme' ); ?></span>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="kvp-arc-tp-right">
                    <a href="<?php echo esc_url( get_permalink( $top_pick->ID ) ); ?>" class="kvp-arc-top-pick-btn">
                        <?php esc_html_e( 'Read full review', 'kvp-theme' ); ?>
                    </a>
                </div>

            </div>
        </div>
        <?php endif; ?>

        <!-- ================================================================
             5. SECTION LABEL
             ================================================================ -->
        <h2 class="kvp-arc-section-label">
            <?php
            printf(
                /* translators: %s: category name */
                esc_html__( 'All %s reviews', 'kvp-theme' ),
                esc_html( $cat_name )
            );
            ?>
        </h2>

        <!-- ================================================================
             6. REVIEW CARD GRID — WordPress loop
             ================================================================ -->
        <?php if ( have_posts() ) : ?>

        <div class="kvp-arc-grid">

            <?php
            $rank = 0;
            while ( have_posts() ) :
                the_post();
                $rank++;

                $card_cats    = get_the_category();
                $card_cat     = $card_cats ? $card_cats[0]->name : $cat_name;
                $card_rating  = get_post_meta( get_the_ID(), 'kvp_rating', true );
                $card_count   = get_post_meta( get_the_ID(), 'kvp_review_count', true );
                $card_price   = str_replace( ' at time of writing', '', get_post_meta( get_the_ID(), 'kvp_price', true ) );
                $card_product_name    = get_post_meta( get_the_ID(), 'kvp_product_name', true );
                $card_verdict         = get_post_meta( get_the_ID(), 'kvp_verdict', true );
                $card_verdict_snippet = get_post_meta( get_the_ID(), 'kvp_card_verdict', true );
            ?>

            <article class="kvp-arc-card" id="review-<?php the_ID(); ?>">

                <span class="kvp-arc-card-rank" aria-label="<?php echo esc_attr( sprintf( __( 'Rank %d', 'kvp-theme' ), $rank ) ); ?>">
                    <?php echo esc_html( $rank ); ?>
                </span>

                <div class="kvp-arc-card-img">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'medium_large', array(
                            'loading' => 'lazy',
                            'alt'     => esc_attr( get_the_title() ),
                        ) ); ?>
                    <?php else : ?>
                        <div class="kvp-arc-card-img-placeholder" aria-hidden="true">🍳</div>
                    <?php endif; ?>
                </div>

                <div class="kvp-arc-card-body">

                    <p class="kvp-arc-card-cat"><?php echo esc_html( $card_cat ); ?></p>

                    <h3 class="kvp-arc-card-title">
                        <a href="<?php the_permalink(); ?>"><?php echo esc_html( $card_product_name ? $card_product_name : get_the_title() ); ?></a>
                    </h3>

                    <?php if ( $card_rating ) : ?>
                    <p class="kvp-arc-card-rating">
                        <span class="kvp-stars" aria-hidden="true">★</span>
                        <?php
                        if ( $card_count ) {
                            printf(
                                /* translators: 1: rating, 2: review count */
                                esc_html__( '%1$s on Amazon (%2$s+ reviews)', 'kvp-theme' ),
                                esc_html( $card_rating ),
                                esc_html( $card_count )
                            );
                        } else {
                            echo esc_html( $card_rating ) . esc_html__( '★ on Amazon', 'kvp-theme' );
                        }
                        ?>
                    </p>
                    <?php endif; ?>

                    <?php if ( $card_verdict_snippet ) : ?>
                    <div class="kvp-arc-card-snippet"><?php echo esc_html( $card_verdict_snippet ); ?></div>
                    <?php endif; ?>

                    <?php if ( $card_price ) : ?>
                    <p class="kvp-arc-card-price">
                        <?php echo esc_html( $card_price ); ?>
                        <span class="kvp-arc-tp-price-note"><?php esc_html_e( 'at time of writing', 'kvp-theme' ); ?></span>
                    </p>
                    <?php endif; ?>

                    <?php if ( $card_verdict ) : ?>
                    <p class="kvp-arc-card-verdict"><?php echo esc_html( $card_verdict ); ?></p>
                    <?php endif; ?>

                    <a href="<?php the_permalink(); ?>" class="kvp-arc-card-btn">
                        <?php esc_html_e( 'Read full review', 'kvp-theme' ); ?>
                    </a>

                </div>
            </article>

            <?php endwhile; ?>

        </div>

        <?php else : ?>
        <p class="kvp-arc-empty">
            <?php esc_html_e( 'No reviews in this category yet. Check back soon.', 'kvp-theme' ); ?>
        </p>
        <?php endif; ?>

        <!-- ================================================================
             7. ALSO IN OUR REVIEWS STRIP
             Dynamically fetches all registered categories, excluding the
             one currently being viewed.
             ================================================================ -->
        <?php
        $exclude_id    = $current_cat ? $current_cat->term_id : 0;
        $uncategorized = get_cat_ID( 'Uncategorized' );
        $also_cats     = get_categories( array(
            'exclude'    => array_filter( array( $exclude_id, $uncategorized ) ),
            'hide_empty' => false,
            'orderby'    => 'name',
            'order'      => 'ASC',
        ) );
        ?>

        <?php if ( ! empty( $also_cats ) ) : ?>
        <div class="kvp-arc-also">

            <h2 class="kvp-arc-also-title"><?php esc_html_e( 'Also in our reviews', 'kvp-theme' ); ?></h2>

            <div class="kvp-arc-also-grid">

                <?php foreach ( $also_cats as $also ) :
                    $term_link = get_category_link( $also->term_id );
                    $term_img  = get_term_meta( $also->term_id, 'kvp_cat_image', true );
                ?>
                <a href="<?php echo esc_url( $term_link ); ?>" class="kvp-arc-also-card">

                    <?php
                    $cat_icons = array(
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
                    );
                    $cat_svg = isset( $cat_icons[ $also->slug ] ) ? $cat_icons[ $also->slug ] : '';
                    ?>
                    <div class="kvp-arc-also-thumb">
                        <?php if ( $term_img ) : ?>
                            <img
                                src="<?php echo esc_url( $term_img ); ?>"
                                alt="<?php echo esc_attr( $also->name ); ?>"
                                width="60"
                                height="60"
                                loading="lazy"
                            >
                        <?php elseif ( $cat_svg ) : ?>
                            <?php echo $cat_svg; ?>
                        <?php else : ?>
                            <span aria-hidden="true">🍳</span>
                        <?php endif; ?>
                    </div>

                    <div class="kvp-arc-also-info">
                        <p class="kvp-arc-also-cat-name"><?php echo esc_html( $also->name ); ?></p>
                        <p class="kvp-arc-also-view-link"><?php esc_html_e( 'View reviews →', 'kvp-theme' ); ?></p>
                    </div>

                </a>
                <?php endforeach; ?>

            </div>
        </div>
        <?php endif; ?>

    </div><!-- .kvp-arc-wrap -->
    </div><!-- .kvp-arc-content-area -->

</main>

<?php get_footer(); ?>
