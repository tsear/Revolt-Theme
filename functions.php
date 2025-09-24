<?php
function simple_theme_enqueue_styles() {
    // 1) Main stylesheet
    wp_enqueue_style(
        'simple-theme-style',
        get_stylesheet_uri()
    );

    // 2) Global scripts
    wp_enqueue_script(
        'dropdown-nav',
        get_template_directory_uri() . '/assets/js/dropdown-nav.js',
        array(),
        '1.0',
        true
    );

    // ✅ Only for front page
    if ( is_front_page() ) {
        wp_enqueue_script(
            'three-js',
            'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js',
            array(),
            null,
            true
        );
        wp_enqueue_script(
            'hero-background',
            get_template_directory_uri() . '/assets/js/hero-background.js',
            array('three-js'),
            null,
            true
        );
        wp_enqueue_script(
            'rotate-words',
            get_template_directory_uri() . '/assets/js/rotate-words.js',
            array(),
            '1.0',
            true
        );
        wp_enqueue_script(
            'what-to-expect',
            get_template_directory_uri() . '/assets/js/what-to-expect.js',
            array(),
            null,
            true
        );
        wp_enqueue_script(
            'start-here',
            get_template_directory_uri() . '/assets/js/start-here.js',
            array(),
            null,
            true
        );
    }

    // ✅ Only for About page
    if ( is_page('about') ) {
        wp_enqueue_script(
            'about-timeline',
            get_template_directory_uri() . '/assets/js/about-timeline.js',
            array(),
            null,
            true
        );
        wp_enqueue_script(
            'about-process',
            get_template_directory_uri() . '/assets/js/about-process.js',
            array(),
            null,
            true
        );
        wp_enqueue_script(
            'about-tech',
            get_template_directory_uri() . '/assets/js/about-tech.js',
            array(),
            null,
            true
        );
    }

    // ✅ Only for Services page
    if ( is_page('services') ) {
        // a) enqueue your HUD script
        wp_enqueue_script(
            'services-loop',
            get_template_directory_uri() . '/assets/js/services-loop.js',
            array(),
            null,
            true
        );
        // b) localize the correct theme URL into JS
        wp_localize_script(
            'services-loop',
            'REVOLT_THEME_URL',
            get_template_directory_uri()
        );
    }

    // ✅ Only for Contact page
    if ( is_page('contact') ) {
        wp_enqueue_script(
            'contact-node',
            get_template_directory_uri() . '/assets/js/contact-node.js',
            array(),
            null,
            true
        );
    }

    // ✅ ASCII scroll auto-pan (mobile-only)
    wp_enqueue_script(
        'ascii-scroll',
        get_template_directory_uri() . '/assets/js/ascii-scroll.js',
        array(),
        '1.0',
        true
    );
}

add_action('wp_enqueue_scripts', 'simple_theme_enqueue_styles');

// Add theme support
function revolt_theme_setup() {
    // Post thumbnails support
    add_theme_support('post-thumbnails');
    
    // Navigation menus support
    add_theme_support('menus');
    
    // HTML5 support for forms
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Title tag support
    add_theme_support('title-tag');
    
    // Custom logo support
    add_theme_support('custom-logo');
    
    // Automatic feed links
    add_theme_support('automatic-feed-links');
    
    // Custom background support
    add_theme_support('custom-background');
}
add_action('after_setup_theme', 'revolt_theme_setup');

// Register navigation menus
function revolt_register_menus() {
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ));
}
add_action('init', 'revolt_register_menus');