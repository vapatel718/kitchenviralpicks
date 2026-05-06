<?php get_header(); ?>

<main id="kvp-main">
<div class="kvp-single-wrap">

<?php while ( have_posts() ) : the_post(); ?>

    <!-- 1. FTC DISCLOSURE -->
    <div class="kvp-ftc">
        <?php _e( 'Disclosure: As an Amazon Associate, KitchenViralPicks.com earns from qualifying purchases. This means if you click a link and buy, we may earn a commission at no extra cost to you.', 'kvp-theme' ); ?>
    </div>

    <!-- 2. VERDICT BOX -->
    <div class="kvp-verdict-box">
        <p class="kvp-verdict-label"><?php _e( 'OUR VERDICT', 'kvp-theme' ); ?></p>
        <h1 class="kvp-verdict-title"><?php the_title(); ?></h1>
        <p class="kvp-verdict-rating">
            <em><?php echo esc_html( get_post_meta( get_the_ID(), 'kvp_rating', true ) ?: '4.8' ); ?>&#9733;</em>
            <?php _e( 'on Amazon', 'kvp-theme' ); ?>
            (<?php echo esc_html( get_post_meta( get_the_ID(), 'kvp_review_count', true ) ?: '19,000+' ); ?> <?php _e( 'reviews', 'kvp-theme' ); ?>)
        </p>
        <p class="kvp-verdict-price">
            <?php _e( 'At time of writing, around', 'kvp-theme' ); ?>
            <?php echo esc_html( get_post_meta( get_the_ID(), 'kvp_price', true ) ?: '$89' ); ?>
        </p>
        <p class="kvp-verdict-summary">
            <?php echo esc_html( get_post_meta( get_the_ID(), 'kvp_verdict_summary', true ) ?: get_the_excerpt() ); ?>
        </p>
        <a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'kvp_amazon_url', true ) ?: '#' ); ?>"
           class="kvp-verdict-btn"
           target="_blank"
           rel="sponsored nofollow">
            <?php _e( 'Check price on Amazon &rarr;', 'kvp-theme' ); ?>
        </a>
        <p class="kvp-verdict-disclaimer"><?php _e( 'Opens Amazon in new tab &middot; Affiliate link', 'kvp-theme' ); ?></p>
    </div>

    <!-- 3. ARTICLE BODY -->
    <div class="kvp-article-body">
        <?php the_content(); ?>
    </div>

    <!-- 4. PROS / CONS -->
    <?php
    $pros_raw = get_post_meta( get_the_ID(), 'kvp_pros', true );
    $cons_raw = get_post_meta( get_the_ID(), 'kvp_cons', true );
    $pros     = $pros_raw ? array_filter( array_map( 'trim', explode( "\n", $pros_raw ) ) ) : array(
        'Consistently fast cook times reported by buyers',
        'Easy to clean — non-stick basket holds up well',
        'Quiet operation compared to similar-priced models',
    );
    $cons = $cons_raw ? array_filter( array_map( 'trim', explode( "\n", $cons_raw ) ) ) : array(
        'Runs slightly hotter than the dial suggests — needs adjustment',
        'Basket handle can feel loose over time',
    );
    ?>
    <div class="kvp-proscons">
        <div class="kvp-pros">
            <p class="kvp-proscons-label"><?php _e( 'Pros', 'kvp-theme' ); ?></p>
            <ul class="kvp-proscons-list">
                <?php foreach ( $pros as $pro ) : ?>
                    <li><span class="kvp-pro-bullet">&#10003;</span><?php echo esc_html( $pro ); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="kvp-cons">
            <p class="kvp-proscons-label"><?php _e( 'Cons', 'kvp-theme' ); ?></p>
            <ul class="kvp-proscons-list">
                <?php foreach ( $cons as $con ) : ?>
                    <li><span class="kvp-con-bullet">&#10007;</span><?php echo esc_html( $con ); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- 5. SPECS TABLE -->
    <?php
    $specs_raw = get_post_meta( get_the_ID(), 'kvp_specs', true );
    $specs     = $specs_raw
        ? json_decode( $specs_raw, true )
        : array(
            array( 'Capacity', '6 Quarts' ),
            array( 'Wattage', '1750W' ),
            array( 'Dimensions', '13.5 × 11.5 × 13 in' ),
            array( 'Weight', '11.7 lbs' ),
            array( 'Colours available', 'Black, White, Grey' ),
            array( 'Warranty', '1 year limited' ),
        );
    ?>
    <div class="kvp-specs-wrap">
        <table class="kvp-specs-table">
            <thead>
                <tr>
                    <th><?php _e( 'Specification', 'kvp-theme' ); ?></th>
                    <th><?php _e( 'Detail', 'kvp-theme' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $specs as $row ) : ?>
                    <tr>
                        <td><?php echo esc_html( $row[0] ); ?></td>
                        <td><?php echo esc_html( $row[1] ); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- 6. BOTTOM CTA -->
    <div class="kvp-bottom-cta">
        <p class="kvp-bottom-cta-label"><?php _e( 'Ready to buy?', 'kvp-theme' ); ?></p>
        <a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'kvp_amazon_url', true ) ?: '#' ); ?>"
           class="kvp-verdict-btn"
           target="_blank"
           rel="sponsored nofollow">
            <?php _e( 'Check price on Amazon &rarr;', 'kvp-theme' ); ?>
        </a>
        <p class="kvp-verdict-disclaimer"><?php _e( 'Opens Amazon in new tab &middot; Affiliate link', 'kvp-theme' ); ?></p>
    </div>

<?php endwhile; ?>

</div>
</main>

<?php get_footer(); ?>
