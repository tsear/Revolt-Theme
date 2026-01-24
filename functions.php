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
            'hero-rotating',
            get_template_directory_uri() . '/assets/js/hero-rotating.bundle.js',
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

    // ✅ Only for single product pages
    if ( is_product() ) {
        wp_enqueue_script(
            'product-tabs',
            get_template_directory_uri() . '/assets/js/product-tabs.js',
            array(),
            '1.0',
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

    // ✅ Solution Builder (global - available on all pages)
    wp_enqueue_script(
        'solution-builder',
        get_template_directory_uri() . '/assets/js/solution-builder.js',
        array(),
        '1.0',
        true
    );
}

add_action('wp_enqueue_scripts', 'simple_theme_enqueue_styles');

// Fix WooCommerce services undefined error
function revolt_fix_wc_services_error() {
    if ( is_cart() || is_checkout() ) {
        ?>
        <script>
        window.wcSettings = window.wcSettings || {};
        window.wcSettings['woocommerce-services'] = window.wcSettings['woocommerce-services'] || { notices: [] };
        </script>
        <?php
    }
}
add_action('wp_head', 'revolt_fix_wc_services_error', 1);

// Custom empty cart message - works with both blocks and shortcode
function revolt_custom_empty_cart_message() {
    ?>
    <div class="revolt-empty-cart">
        <div class="empty-cart-icon">🛒</div>
        <div class="empty-cart-terminal">
            <pre class="empty-cart-ascii">
  _______________
 /               \
|  CART IS EMPTY  |
 \_______________/
            </pre>
        </div>
        <h2 class="empty-cart-title">// Nothing here yet</h2>
        <p class="empty-cart-message">Your cart is waiting for something revolutionary.</p>
        
        <div class="empty-cart-actions">
            <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn empty-cart-btn">
                Browse Tools →
            </a>
        </div>
        
        <div class="empty-cart-suggestions">
            <p class="suggestions-label">// Quick links</p>
            <div class="suggestions-links">
                <a href="<?php echo esc_url( site_url('/services') ); ?>">Our Services</a>
                <a href="<?php echo esc_url( site_url('/about') ); ?>">About Us</a>
                <button type="button" data-modal-target="solution-builder-modal" data-modal-toggle="solution-builder-modal">Build Your Solution</button>
            </div>
        </div>
    </div>
    <?php
}
remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
add_action( 'woocommerce_cart_is_empty', 'revolt_custom_empty_cart_message', 10 );

// Block cart - enqueue JS for cart functionality and nav counter updates
function revolt_block_cart_empty_override() {
    // Load on all WooCommerce pages for cart counter updates
    if ( ! class_exists( 'WooCommerce' ) ) return;
    
    wp_enqueue_script(
        'revolt-empty-cart',
        get_template_directory_uri() . '/assets/js/empty-cart.js',
        array(),
        filemtime( get_template_directory() . '/assets/js/empty-cart.js' ),
        true
    );
}
add_action('wp_enqueue_scripts', 'revolt_block_cart_empty_override');

function revolt_add_cart_data_attrs($output) {
    if ( class_exists( 'WooCommerce' ) ) {
        $shop_url = esc_url( wc_get_page_permalink( 'shop' ) );
        $services_url = esc_url( site_url('/services') );
        $about_url = esc_url( site_url('/about') );
        $output .= ' data-shop-url="' . $shop_url . '" data-services-url="' . $services_url . '" data-about-url="' . $about_url . '"';
    }
    return $output;
}
add_filter('language_attributes', 'revolt_add_cart_data_attrs');

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
    
    // WooCommerce support
    add_theme_support('woocommerce');
    
    // Optional: WooCommerce features
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'revolt_theme_setup');

// Remove WooCommerce breadcrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// Force uniform product thumbnail size
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
    return array(
        'width'  => 600,
        'height' => 600,
        'crop'   => 1,
    );
});

add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
    return array(
        'width'  => 600,
        'height' => 600,
        'crop'   => 1,
    );
});

// Remove inline width/height attributes from WooCommerce images
add_filter( 'woocommerce_product_get_image', function( $image ) {
    return preg_replace( '/(width|height)="\d*"\s/', '', $image );
}, 10 );

add_filter( 'post_thumbnail_html', function( $html ) {
    return preg_replace( '/(width|height)="\d*"\s/', '', $html );
}, 10 );

// Register navigation menus
function revolt_register_menus() {
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ));
}
add_action('init', 'revolt_register_menus');