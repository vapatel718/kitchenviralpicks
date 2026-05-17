<?php
/**
 * Template Name: Affiliate Disclosure
 * Affiliate disclosure page — legal and transparency statement.
 */

get_header();
?>

<main id="kvp-disclosure-main">

    <div class="kvp-contact-outer">
        <div class="kvp-contact-inner">

            <h1 class="kvp-contact-h1"><?php _e( 'Affiliate Disclosure', 'kvp-theme' ); ?></h1>
            <p class="kvp-legal-last-updated"><?php _e( 'Last updated: May 2026', 'kvp-theme' ); ?></p>
            <div class="kvp-contact-rule" aria-hidden="true"></div>

            <div class="kvp-contact-card">

                <h2 class="kvp-about-section-h2"><?php _e( 'How affiliate links work', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'KitchenViralPicks.com is a participant in the Amazon Services LLC Associates Program, an affiliate advertising program designed to provide a means for sites to earn advertising fees by advertising and linking to Amazon.com.', 'kvp-theme' ); ?>
                </p>

                <h2 class="kvp-about-section-h2"><?php _e( 'How it affects our recommendations', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'When you click a product link on this site and make a purchase on Amazon, we may earn a small commission &#8212; at no extra cost to you. This commission helps keep the site running and allows Deborah to continue researching and publishing honest, data-backed kitchen product reviews.', 'kvp-theme' ); ?>
                </p>

                <p class="kvp-contact-body">
                    <?php _e( 'Our editorial process is not influenced by affiliate relationships. Products are selected and evaluated based on verified buyer reviews, independent test data, and research quality &#8212; not on commission rates or brand relationships. We never recommend a product just because it pays us more.', 'kvp-theme' ); ?>
                </p>

                <h2 class="kvp-about-section-h2"><?php _e( 'About pricing', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'Prices shown on this site are for reference only and reflect prices at the time of writing. Actual prices on Amazon may vary. Always check Amazon directly for the current price before purchasing.', 'kvp-theme' ); ?>
                </p>

                <h2 class="kvp-about-section-h2"><?php _e( 'Questions', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'If you have any questions about our affiliate relationships, contact us at:', 'kvp-theme' ); ?>
                    <a href="mailto:hello@kitchenviralpicks.com">hello@kitchenviralpicks.com</a>
                </p>

            </div>

        </div>
    </div>

</main>

<?php get_footer();
