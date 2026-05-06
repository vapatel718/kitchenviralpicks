<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<style>
/* ── HEADER ─────────────────────────────────────────────── */
.kvp-header {
    background-color: var(--color-primary);
    width: 100%;
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}
.kvp-header__inner {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* ── LOGO ────────────────────────────────────────────────── */
.kvp-logo {
    display: flex;
    align-items: center;
    gap: 13px;
    text-decoration: none;
}
.kvp-logo__icon { flex-shrink: 0; }
.kvp-logo__text {
    display: flex;
    flex-direction: column;
    line-height: 1;
}
.kvp-logo__top {
    font-family: var(--font-body);
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.14em;
    color: rgba(255,255,255,0.6);
    text-transform: uppercase;
}
.kvp-logo__bottom {
    font-family: var(--font-heading);
    font-size: 26px;
    font-weight: 500;
    color: var(--color-white);
    line-height: 1.1;
    letter-spacing: -0.01em;
}

/* ── NAV ─────────────────────────────────────────────────── */
.kvp-nav__list {
    display: flex;
    align-items: center;
    gap: 4px;
    list-style: none;
    margin: 0;
    padding: 0;
}
.kvp-nav__list a {
    font-family: var(--font-body);
    font-size: 13px;
    font-weight: 500;
    color: rgba(255,255,255,0.85);
    text-decoration: none;
    padding: 7px 14px;
    border-radius: 999px;
    background: transparent;
    transition: background 0.2s, color 0.2s;
    display: inline-block;
}
.kvp-nav__list a:hover {
    background: rgba(0,0,0,0.18);
    color: #fff;
}

/* ── MOBILE TOGGLE ───────────────────────────────────────── */
.kvp-nav-toggle {
    display: none;
    flex-direction: column;
    gap: 5px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 4px;
}
.kvp-nav-toggle span {
    display: block;
    width: 24px;
    height: 2px;
    background: var(--color-white);
    border-radius: 2px;
}

/* ── MOBILE ──────────────────────────────────────────────── */
@media (max-width: 768px) {
    .kvp-nav-toggle { display: flex; }
    .kvp-nav {
        display: none;
        position: absolute;
        top: 70px;
        left: 0;
        right: 0;
        background-color: var(--color-primary);
        padding: 16px 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    .kvp-nav.is-open { display: block; }
    .kvp-nav__list {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }
}
</style>

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
