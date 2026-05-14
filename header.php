<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="kvp-header">
    <div class="kvp-header__inner">

        <!-- LOGO -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="kvp-logo">
            <div class="kvp-logo__icon">
                <svg width="46" height="46" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="48" height="48" rx="10" fill="#FFF8F5"/>
                    <path d="M7 34 L7 22 Q7 20 9 20 L31 20 Q33 20 33 22 L33 34 Q33 36 31 36 L9 36 Q7 36 7 34Z" fill="#E8401C"/>
                    <path d="M7.5 20 Q8 15 20 15 Q32 15 32.5 20" fill="#E8401C"/>
                    <path d="M33 28 L43 25" stroke="#E8401C" stroke-width="3.2" stroke-linecap="round"/>
                    <path d="M20 15 C19 11.5 20.5 8.5 19.5 5.5" stroke="#E8401C" stroke-width="2" stroke-linecap="round"/>
                    <path d="M7.5 27 L32.5 27" stroke="white" stroke-width="1.2" stroke-linecap="round" opacity="0.35"/>
                </svg>
            </div>
            <div class="kvp-logo__text">
                <span class="kvp-logo__top">KITCHEN VIRAL</span>
                <span class="kvp-logo__bottom">Picks</span>
            </div>
        </a>

        <!-- MOBILE MENU TOGGLE -->
        <button class="kvp-nav-toggle" aria-label="Toggle menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <!-- NAVIGATION -->
        <nav class="kvp-nav" aria-label="Primary navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'kvp-nav__list',
                'fallback_cb'    => function() {
                    echo '<ul class="kvp-nav__list">
                        <li><a href="#">Air Fryers</a></li>
                        <li><a href="#">Cookware</a></li>
                        <li><a href="#">Kettles</a></li>
                        <li><a href="#">Bakeware</a></li>
                        <li><a href="#">Multicooker</a></li>
                    </ul>';
                },
            ) );
            ?>
        </nav>

    </div>
</header>
