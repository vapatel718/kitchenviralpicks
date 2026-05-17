<?php
/**
 * Template Name: Privacy Policy
 * Privacy policy page — data, cookies, and affiliate transparency.
 */

get_header();
?>

<main id="kvp-privacy-main">

    <div class="kvp-contact-outer">
        <div class="kvp-contact-inner">

            <h1 class="kvp-contact-h1"><?php _e( 'Privacy Policy', 'kvp-theme' ); ?></h1>
            <div class="kvp-contact-rule" aria-hidden="true"></div>

            <div class="kvp-contact-card">

                <h2 class="kvp-about-section-h2"><?php _e( 'What information we collect', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'KitchenViralPicks.com does not collect personal information from visitors unless you voluntarily provide it &#8212; for example, by contacting us via email. We do not run any registration, account creation, or checkout process on this site.', 'kvp-theme' ); ?>
                </p>

                <h2 class="kvp-about-section-h2"><?php _e( 'Cookies and analytics', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'This site may use basic analytics tools (such as Google Analytics) to understand how visitors find and use the site. These tools may set cookies on your device. The data collected is anonymous and is used only to improve the site. You can disable cookies in your browser settings at any time.', 'kvp-theme' ); ?>
                </p>

                <h2 class="kvp-about-section-h2"><?php _e( 'Third-party links', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'KitchenViralPicks.com contains links to Amazon.com and other third-party sites. Once you leave this site, their privacy policies apply. We are not responsible for the privacy practices of any third-party site.', 'kvp-theme' ); ?>
                </p>

                <h2 class="kvp-about-section-h2"><?php _e( 'Affiliate disclosure', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'This site participates in the Amazon Associates Program. When you click a product link and make a purchase, we may earn a small commission at no extra cost to you. This does not affect which products we recommend. See our full', 'kvp-theme' ); ?>
                    <a href="<?php echo esc_url( home_url( '/affiliate-disclosure/' ) ); ?>"><?php _e( 'Affiliate Disclosure page', 'kvp-theme' ); ?></a>
                    <?php _e( 'for details.', 'kvp-theme' ); ?>
                </p>

                <h2 class="kvp-about-section-h2"><?php _e( 'Contact', 'kvp-theme' ); ?></h2>
                <p class="kvp-contact-body">
                    <?php _e( 'If you have any questions about this privacy policy, contact us at:', 'kvp-theme' ); ?>
                    <a href="mailto:hello@kitchenviralpicks.com">hello@kitchenviralpicks.com</a>
                </p>

            </div>

        </div>
    </div>

</main>

<?php get_footer();
