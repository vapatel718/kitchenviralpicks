<?php
/**
 * KitchenViralPicks Theme Functions
 */

// ─── THEME SETUP ───────────────────────────────────────────────
function kvp_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption' ) );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'kvp-theme' ),
        'footer'  => __( 'Footer Menu', 'kvp-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'kvp_theme_setup' );

// ─── ENQUEUE STYLES & FONTS ────────────────────────────────────
function kvp_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'kvp-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@400;500;700&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'kvp-style',
        get_stylesheet_uri(),
        array( 'kvp-fonts' ),
        filemtime( get_stylesheet_directory() . '/style.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'kvp_enqueue_assets' );

// ─── BRAND CSS VARIABLES ───────────────────────────────────────
function kvp_brand_variables() {
    echo '
    <style>
    :root {
        --color-primary:    #E8401C;
        --color-accent:     #F76B35;
        --color-background: #FFF8F5;
        --color-text:       #1A1A1A;
        --color-white:      #FFFFFF;
        --font-heading:     "Playfair Display", Georgia, serif;
        --font-body:        "Lato", Arial, sans-serif;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
        background-color: var(--color-background);
        color: var(--color-text);
        font-family: var(--font-body);
        font-size: 16px;
        line-height: 1.6;
    }
    </style>';
}
add_action( 'wp_head', 'kvp_brand_variables' );

function kvp_enqueue_fonts() {
    wp_enqueue_style(
        'kvp-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap',
        array(),
        null
    );
}
add_action( 'wp_enqueue_scripts', 'kvp_enqueue_fonts' );
