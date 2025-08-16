<?php
// ✅ functions.php is loaded
error_log("✅ functions.php is loaded");

function simple_theme_enqueue_styles() {
    // 1) Main stylesheet
    wp_enqueue_style(
        'simple-theme-style',
        get_stylesheet_uri()
    );

    // 2) Prism CSS (global)
    wp_enqueue_style(
        'prism-css',
        'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css'
    );

    // 3) Prism JS (global)
    wp_enqueue_script(
        'prism-core',
        'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js',
        array(),
        null,
        true
    );
    wp_enqueue_script(
        'prism-json',
        'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-json.min.js',
        array('prism-core'),
        null,
        true
    );

    // 4) Global JavaScript files
    wp_enqueue_script(
        'rotate-words',
        get_template_directory_uri() . '/assets/js/rotate-words.js',
        array(),
        '1.0',
        true
    );
    wp_enqueue_script(
        'code-showcase',
        get_template_directory_uri() . '/assets/js/code-showcase.js',
        array('prism-core'),
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
    wp_enqueue_script(
        'revolt-revolution',
        get_template_directory_uri() . '/assets/js/revolt-revolution.js',
        array(),
        null,
        true
    );
    wp_enqueue_script(
        'voices-for-rent',
        get_template_directory_uri() . '/assets/js/voices-for-rent.js',
        array(),
        null,
        true
    );
    wp_enqueue_script(
        'dropdown-nav',
        get_template_directory_uri() . '/assets/js/dropdown-nav.js',
        array(),
        '1.0',
        true
    );

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