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
                    <?php esc_html_e( 'As an Amazon Associate, KitchenViralPicks.com earns from qualifying purchases at no extra cost to you. All recommendations are based on research and verified customer reviews.', 'kvp-theme' ); ?>
                </p>
            </div>

            <!-- Column 2: Navigate -->
            <div class="kvp-footer-nav-col">
                <p class="kvp-footer-col-heading"><?php esc_html_e( 'NAVIGATE', 'kvp-theme' ); ?></p>
                <?php if ( has_nav_menu( 'footer' ) ) : ?>
                    <?php wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'kvp-footer-links',
                        'fallback_cb'    => false,
                    ) ); ?>
                <?php else : ?>
                    <ul class="kvp-footer-links">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kvp-theme' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Reviews', 'kvp-theme' ); ?></a></li>
                        <li><a href="<?php $p = get_page_by_path( 'about' ); echo esc_url( $p ? get_permalink( $p->ID ) : home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'kvp-theme' ); ?></a></li>
                        <li><a href="<?php $p = get_page_by_path( 'contact' ); echo esc_url( $p ? get_permalink( $p->ID ) : home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'kvp-theme' ); ?></a></li>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Column 3: Legal -->
            <div class="kvp-footer-legal-col">
                <p class="kvp-footer-col-heading"><?php esc_html_e( 'LEGAL', 'kvp-theme' ); ?></p>
                <ul class="kvp-footer-links">
                    <li><a href="<?php $p = get_page_by_path( 'affiliate-disclosure' ); echo esc_url( $p ? get_permalink( $p->ID ) : home_url( '/affiliate-disclosure/' ) ); ?>"><?php esc_html_e( 'Affiliate disclosure', 'kvp-theme' ); ?></a></li>
                    <li><a href="<?php $p = get_page_by_path( 'privacy-policy' ); echo esc_url( $p ? get_permalink( $p->ID ) : home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy policy', 'kvp-theme' ); ?></a></li>
                    <li><a href="<?php $p = get_page_by_path( 'terms-of-use' ); echo esc_url( $p ? get_permalink( $p->ID ) : home_url( '/terms-of-use/' ) ); ?>"><?php esc_html_e( 'Terms of use', 'kvp-theme' ); ?></a></li>
                </ul>
            </div>

        </div>
    </div>

    <!-- SECTION 2: DIVIDER -->
    <hr class="kvp-footer-divider">

    <!-- SECTION 3: BOTTOM ROW -->
    <div class="kvp-footer-bottom">
        <span class="kvp-footer-copy">
            &copy; <?php echo esc_html( date( 'Y' ) ); ?> KitchenViralPicks.com &mdash; <?php esc_html_e( 'All rights reserved.', 'kvp-theme' ); ?>
        </span>
    </div>

</footer>

<?php wp_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var toggle = document.querySelector('.kvp-nav-toggle');
    var nav    = document.querySelector('.kvp-nav');
    if (toggle && nav) {
        toggle.addEventListener('click', function() {
            var isOpen = nav.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', isOpen);
        });
    }
});
</script>
</body>
</html>
