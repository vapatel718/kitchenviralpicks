<?php
/**
 * Template Name: Contact
 * Contact page — reach Deborah.
 */

get_header();
?>

<main id="kvp-contact-main">

    <div class="kvp-contact-outer">
        <div class="kvp-contact-inner">

            <h1 class="kvp-contact-h1"><?php _e( 'Contact', 'kvp-theme' ); ?></h1>
            <div class="kvp-contact-rule" aria-hidden="true"></div>

            <div class="kvp-contact-card">

                <p class="kvp-contact-body">
                    <?php _e( 'Have a question about a kitchen product, or want to suggest something I should review next? I\'d love to hear from you.', 'kvp-theme' ); ?>
                </p>

                <p class="kvp-contact-body">
                    <?php _e( 'I read every message and do my best to reply within a few days. This is just me &#8212; no team, no assistant &#8212; so I appreciate your patience.', 'kvp-theme' ); ?>
                </p>

                <a href="mailto:hello@kitchenviralpicks.com" class="kvp-contact-btn">
                    <?php _e( 'Send me an email', 'kvp-theme' ); ?>
                </a>

            </div>

        </div>
    </div>

</main>

<?php get_footer();
