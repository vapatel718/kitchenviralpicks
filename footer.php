<footer class="kvp-footer">

    <!-- SECTION 1: TOP ROW -->
    <div class="kvp-footer-top">
        <div class="kvp-footer-grid">

            <!-- Column 1: Brand -->
            <div class="kvp-footer-brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="kvp-footer-logo">
                    <div class="kvp-footer-logo-icon">
                        <svg width="28" height="28" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 34 L7 22 Q7 20 9 20 L31 20 Q33 20 33 22 L33 34 Q33 36 31 36 L9 36 Q7 36 7 34Z" fill="#E8401C"/>
                            <path d="M7.5 20 Q8 15 20 15 Q32 15 32.5 20" fill="#E8401C"/>
                            <path d="M33 28 L43 25" stroke="#E8401C" stroke-width="3.2" stroke-linecap="round"/>
                            <path d="M20 15 C19 11.5 20.5 8.5 19.5 5.5" stroke="#E8401C" stroke-width="2" stroke-linecap="round"/>
                            <path d="M7.5 27 L32.5 27" stroke="white" stroke-width="1.2" stroke-linecap="round" opacity="0.35"/>
                        </svg>
                    </div>
                    <div class="kvp-footer-wordmark">
                        <span class="kvp-footer-logo-top">KITCHEN VIRAL</span>
                        <span class="kvp-footer-logo-bottom">Picks</span>
                    </div>
                </a>
                <p class="kvp-footer-disclosure">
                    <?php _e( 'As an Amazon Associate, KitchenViralPicks.com earns from qualifying purchases at no extra cost to you. All recommendations are based on research and verified customer reviews.', 'kvp-theme' ); ?>
                </p>
            </div>

            <!-- Column 2: Navigate -->
            <div class="kvp-footer-nav-col">
                <p class="kvp-footer-col-heading"><?php _e( 'NAVIGATE', 'kvp-theme' ); ?></p>
                <?php if ( has_nav_menu( 'footer' ) ) : ?>
                    <?php wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'kvp-footer-links',
                        'fallback_cb'    => false,
                    ) ); ?>
                <?php else : ?>
                    <ul class="kvp-footer-links">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'kvp-theme' ); ?></a></li>
                        <li><a href="#"><?php _e( 'Reviews', 'kvp-theme' ); ?></a></li>
                        <li><a href="#"><?php _e( 'About', 'kvp-theme' ); ?></a></li>
                        <li><a href="#"><?php _e( 'Contact', 'kvp-theme' ); ?></a></li>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Column 3: Legal -->
            <div class="kvp-footer-legal-col">
                <p class="kvp-footer-col-heading"><?php _e( 'LEGAL', 'kvp-theme' ); ?></p>
                <ul class="kvp-footer-links">
                    <li><a href="#"><?php _e( 'Affiliate disclosure', 'kvp-theme' ); ?></a></li>
                    <li><a href="#"><?php _e( 'Privacy policy', 'kvp-theme' ); ?></a></li>
                    <li><a href="#"><?php _e( 'Terms of use', 'kvp-theme' ); ?></a></li>
                </ul>
            </div>

        </div>
    </div>

    <!-- SECTION 2: DIVIDER -->
    <hr class="kvp-footer-divider">

    <!-- SECTION 3: BOTTOM ROW -->
    <div class="kvp-footer-bottom">
        <span class="kvp-footer-copy">
            &copy; <?php echo esc_html( date( 'Y' ) ); ?> KitchenViralPicks.com &mdash; <?php _e( 'All rights reserved.', 'kvp-theme' ); ?>
        </span>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
