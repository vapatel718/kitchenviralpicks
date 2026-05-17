<?php
/**
 * Template Name: Terms of Use
 * Terms of use page — site rules, liability, and intellectual property.
 */

get_header();
?>

<main id="kvp-terms-main">

    <div class="kvp-contact-outer">
        <div class="kvp-contact-inner">

            <h1 class="kvp-contact-h1"><?php _e( 'Terms of Use', 'kvp-theme' ); ?></h1>
            <div class="kvp-contact-rule" aria-hidden="true"></div>

            <div class="kvp-contact-card">

                <h2 class="kvp-about-section-h2"><?php _e( 'Use of this site', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'By accessing KitchenViralPicks.com, you agree to these terms. This site is provided for informational purposes only. All content is intended to help readers make informed purchasing decisions and is not a substitute for professional advice.', 'kvp-theme' ); ?>
                </p>

                <h2 class="kvp-about-section-h2"><?php _e( 'Accuracy of information', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'We make every effort to ensure that product information, prices, and availability are accurate at the time of writing. However, prices and availability on Amazon change frequently. Always verify current pricing directly on Amazon before making a purchase. We accept no liability for decisions made based on information found on this site.', 'kvp-theme' ); ?>
                </p>

                <h2 class="kvp-about-section-h2"><?php _e( 'Affiliate links', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'This site contains affiliate links to Amazon.com. When you click a link and make a purchase, we may earn a commission at no extra cost to you. This does not influence our editorial recommendations. See our', 'kvp-theme' ); ?>
                    <a href="<?php echo esc_url( home_url( '/affiliate-disclosure/' ) ); ?>"><?php _e( 'Affiliate Disclosure page', 'kvp-theme' ); ?></a>
                    <?php _e( 'for full details.', 'kvp-theme' ); ?>
                </p>

                <h2 class="kvp-about-section-h2"><?php _e( 'Intellectual property', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'All written content, design, and graphics on KitchenViralPicks.com are the property of KitchenViralPicks.com unless otherwise stated. Unauthorised reproduction, copying, or distribution of any content from this site is prohibited without prior written permission.', 'kvp-theme' ); ?>
                </p>

                <h2 class="kvp-about-section-h2"><?php _e( 'Limitation of liability', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'KitchenViralPicks.com is not liable for any loss or damage arising from the use of this site or reliance on any information published here. All product purchases are made directly through Amazon and are subject to Amazon&#8217;s own terms and conditions.', 'kvp-theme' ); ?>
                </p>

                <h2 class="kvp-about-section-h2"><?php _e( 'Changes to these terms', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'We reserve the right to update these terms at any time. Continued use of the site after any changes constitutes acceptance of the new terms. Last updated: May 2026.', 'kvp-theme' ); ?>
                </p>

            </div>

        </div>
    </div>

</main>

<?php get_footer();
