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
                <a href="<?php echo esc_url( home_url( '/reviews/' ) ); ?>"><?php esc_html_e( 'Reviews', 'kvp-theme' ); ?></a>
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
                        <?php if ( $tp_rating && $tp_price ) : ?><span class="kvp-arc-tp-sep" aria-hidden="true">&middot;</span><?php endif; ?>
                        <?php if ( $tp_price ) : ?><span class="kvp-arc-tp-price-group"><span class="kvp-arc-tp-price-amt"><?php echo esc_html( $tp_price ); ?></span><span class="kvp-arc-tp-price-note"><?php esc_html_e( ' at time of writing', 'kvp-theme' ); ?></span></span><?php endif; ?>
                    </div>
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
                        'Bakeware'    => array( 'bg' => '#FFF0EB', 'icon' => 'ti-bowl',    'color' => '#E8401C' ),
                        'Cookware'    => array( 'bg' => '#E6F1FB', 'icon' => 'ti-tool',    'color' => '#185FA5' ),
                        'Kettles'     => array( 'bg' => '#EDFAF3', 'icon' => 'ti-droplet', 'color' => '#1A7A48' ),
                        'Multicooker' => array( 'bg' => '#FAEEDA', 'icon' => 'ti-flame',   'color' => '#854F0B' ),
                    );
                    $icon_data = isset( $cat_icons[ $also->name ] ) ? $cat_icons[ $also->name ] : null;
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
                        <?php elseif ( $icon_data ) : ?>
                            <div class="kvp-arc-also-icon" style="background:<?php echo esc_attr( $icon_data['bg'] ); ?>">
                                <i class="ti <?php echo esc_attr( $icon_data['icon'] ); ?>" style="color:<?php echo esc_attr( $icon_data['color'] ); ?>;"></i>
                            </div>
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
