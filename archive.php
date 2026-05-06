<?php get_header(); ?>

<!-- CATEGORY HEADER BAR — full width -->
<div class="kvp-archive-header-bar">
    <div class="kvp-archive-wrap">
        <div class="kvp-archive-header">

            <div class="kvp-archive-header-left">
                <h1 class="kvp-archive-title"><?php single_cat_title(); ?></h1>
                <p class="kvp-archive-count">
                    <?php echo esc_html( $wp_query->found_posts ); ?>
                    <?php _e( 'reviews', 'kvp-theme' ); ?>
                </p>
            </div>

            <?php $desc = term_description(); if ( $desc ) : ?>
            <div class="kvp-archive-header-right">
                <?php echo wp_kses_post( $desc ); ?>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<main id="kvp-main">
<div class="kvp-archive-wrap kvp-archive-content">

    <?php if ( have_posts() ) : ?>

    <div class="kvp-archive-grid">

        <?php while ( have_posts() ) : the_post(); ?>

        <?php
        $cats   = get_the_category();
        $rating = get_post_meta( get_the_ID(), 'kvp_rating', true );
        $price  = get_post_meta( get_the_ID(), 'kvp_price',  true );
        ?>

        <article class="kvp-archive-card">

            <p class="kvp-archive-card-cat">
                <?php echo $cats ? esc_html( $cats[0]->name ) : single_cat_title( '', false ); ?>
            </p>

            <div class="kvp-archive-card-img">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'medium', array(
                        'class'   => 'kvp-archive-card-thumb',
                        'loading' => 'lazy',
                        'alt'     => esc_attr( get_the_title() ),
                    ) ); ?>
                <?php else : ?>
                    <div class="kvp-archive-card-placeholder"></div>
                <?php endif; ?>
            </div>

            <h2 class="kvp-archive-card-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <p class="kvp-archive-card-meta">
                <?php if ( $rating ) : ?>
                    <em><?php echo esc_html( $rating ); ?>&#9733;</em>
                <?php endif; ?>
                <?php if ( $rating && $price ) : ?>
                    &middot;
                <?php endif; ?>
                <?php if ( $price ) : ?>
                    <?php echo esc_html( $price ); ?>
                <?php endif; ?>
            </p>

            <a href="<?php the_permalink(); ?>" class="kvp-archive-card-btn">
                <?php _e( 'Read review', 'kvp-theme' ); ?>
            </a>

        </article>

        <?php endwhile; ?>

    </div>

    <?php else : ?>

    <p class="kvp-archive-empty">
        <?php _e( 'No reviews in this category yet. Check back soon.', 'kvp-theme' ); ?>
    </p>

    <?php endif; ?>

</div>
</main>

<?php get_footer(); ?>
