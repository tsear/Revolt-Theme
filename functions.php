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

    // ✅ Only for Blog page & single posts
    if ( is_page('blog') || is_single() ) {
        wp_enqueue_script(
            'blog-filters',
            get_template_directory_uri() . '/assets/js/blog-filters.js',
            array(),
            '1.0',
            true
        );
    }
}

add_action('wp_enqueue_scripts', 'simple_theme_enqueue_styles');

// ─── Blog Helpers ────────────────────────────────────────────────────────────────

/**
 * Calculate estimated read time for a post.
 *
 * @param int $post_id Post ID
 * @return int Estimated minutes to read
 */
function revolt_get_read_time( $post_id = null ) {
    if ( ! $post_id ) $post_id = get_the_ID();
    $content    = get_post_field( 'post_content', $post_id );
    $word_count = str_word_count( strip_tags( $content ) );
    $read_time  = max( 1, ceil( $word_count / 250 ) );
    return $read_time;
}

/**
 * Ensure the Blog page template uses proper pagination via query vars.
 */
function revolt_blog_pagination_query_var( $vars ) {
    $vars[] = 'paged';
    return $vars;
}
add_filter( 'query_vars', 'revolt_blog_pagination_query_var' );

/**
 * Add custom excerpt length for blog cards.
 */
function revolt_custom_excerpt_length( $length ) {
    if ( is_page('blog') ) {
        return 25;
    }
    return $length;
}
add_filter( 'excerpt_length', 'revolt_custom_excerpt_length' );

/**
 * Custom excerpt more text.
 */
function revolt_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'revolt_excerpt_more' );

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

// ─── WordPress Playground Theme Preview ─────────────────────────────────────────
// Adds a "Live Preview" button to products tagged 'theme' using WordPress Playground.

/**
 * Add custom meta box for theme preview settings on WooCommerce products.
 */
function revolt_add_theme_preview_meta_box() {
    add_meta_box(
        'revolt_theme_preview',
        '⚡ Theme Live Preview (WordPress Playground)',
        'revolt_theme_preview_meta_box_html',
        'product',
        'side',
        'default'
    );
}
add_action( 'add_meta_boxes', 'revolt_add_theme_preview_meta_box' );

/**
 * Render the meta box HTML.
 */
function revolt_theme_preview_meta_box_html( $post ) {
    wp_nonce_field( 'revolt_theme_preview_nonce', 'revolt_theme_preview_nonce_field' );

    $theme_zip_url    = get_post_meta( $post->ID, '_revolt_theme_zip_url', true );
    $demo_content_url = get_post_meta( $post->ID, '_revolt_demo_content_url', true );
    $preview_php_ver  = get_post_meta( $post->ID, '_revolt_preview_php_version', true ) ?: '8.0';
    $preview_wp_ver   = get_post_meta( $post->ID, '_revolt_preview_wp_version', true ) ?: 'latest';
    $preview_landing  = get_post_meta( $post->ID, '_revolt_preview_landing_page', true ) ?: '/';

    // Only show helpful note if product has 'theme' tag
    $has_theme_tag = has_term( 'theme', 'product_tag', $post );
    ?>
    
    <?php if ( ! $has_theme_tag ) : ?>
        <p style="color: #b26200; background: #fff3cd; padding: 8px; border-radius: 4px; font-size: 12px;">
            ⚠️ The "Live Preview" button only appears on products tagged <strong>"theme"</strong>. Add the tag to enable it.
        </p>
    <?php endif; ?>

    <p>
        <label for="revolt_theme_zip_url"><strong>Theme .zip URL</strong></label><br>
        <input type="url" id="revolt_theme_zip_url" name="revolt_theme_zip_url" 
               value="<?php echo esc_attr( $theme_zip_url ); ?>" 
               style="width:100%;" placeholder="https://yoursite.com/themes/theme.zip">
        <span style="font-size:11px;color:#666;">Publicly accessible URL to the theme zip file.</span>
    </p>

    <p>
        <label for="revolt_demo_content_url"><strong>Demo Content .xml URL</strong> <em>(optional)</em></label><br>
        <input type="url" id="revolt_demo_content_url" name="revolt_demo_content_url" 
               value="<?php echo esc_attr( $demo_content_url ); ?>" 
               style="width:100%;" placeholder="https://yoursite.com/demo/content.xml">
        <span style="font-size:11px;color:#666;">WordPress export (WXR) file for demo content.</span>
    </p>

    <p>
        <label for="revolt_preview_landing_page"><strong>Landing Page</strong></label><br>
        <input type="text" id="revolt_preview_landing_page" name="revolt_preview_landing_page" 
               value="<?php echo esc_attr( $preview_landing ); ?>" 
               style="width:100%;" placeholder="/">
        <span style="font-size:11px;color:#666;">The page to land on (e.g. / or /sample-page).</span>
    </p>

    <p>
        <label for="revolt_preview_php_version"><strong>PHP Version</strong></label><br>
        <select id="revolt_preview_php_version" name="revolt_preview_php_version" style="width:100%;">
            <option value="7.4" <?php selected( $preview_php_ver, '7.4' ); ?>>7.4</option>
            <option value="8.0" <?php selected( $preview_php_ver, '8.0' ); ?>>8.0</option>
            <option value="8.2" <?php selected( $preview_php_ver, '8.2' ); ?>>8.2</option>
            <option value="8.3" <?php selected( $preview_php_ver, '8.3' ); ?>>8.3</option>
        </select>
    </p>

    <p>
        <label for="revolt_preview_wp_version"><strong>WordPress Version</strong></label><br>
        <select id="revolt_preview_wp_version" name="revolt_preview_wp_version" style="width:100%;">
            <option value="latest" <?php selected( $preview_wp_ver, 'latest' ); ?>>Latest</option>
            <option value="6.7" <?php selected( $preview_wp_ver, '6.7' ); ?>>6.7</option>
            <option value="6.6" <?php selected( $preview_wp_ver, '6.6' ); ?>>6.6</option>
            <option value="6.5" <?php selected( $preview_wp_ver, '6.5' ); ?>>6.5</option>
        </select>
    </p>
    <?php
}

/**
 * Save the meta box data.
 */
function revolt_save_theme_preview_meta( $post_id ) {
    if ( ! isset( $_POST['revolt_theme_preview_nonce_field'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['revolt_theme_preview_nonce_field'], 'revolt_theme_preview_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = array(
        'revolt_theme_zip_url'        => '_revolt_theme_zip_url',
        'revolt_demo_content_url'     => '_revolt_demo_content_url',
        'revolt_preview_php_version'  => '_revolt_preview_php_version',
        'revolt_preview_wp_version'   => '_revolt_preview_wp_version',
        'revolt_preview_landing_page' => '_revolt_preview_landing_page',
    );

    foreach ( $fields as $field_name => $meta_key ) {
        if ( isset( $_POST[ $field_name ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $field_name ] ) );
        }
    }
}
add_action( 'save_post_product', 'revolt_save_theme_preview_meta' );

/**
 * Build the WordPress Playground blueprint URL for a product.
 * Returns false if the product doesn't have a theme zip URL configured.
 */
function revolt_get_playground_url( $product_id ) {
    $theme_zip_url    = get_post_meta( $product_id, '_revolt_theme_zip_url', true );
    if ( empty( $theme_zip_url ) ) return false;

    $demo_content_url = get_post_meta( $product_id, '_revolt_demo_content_url', true );
    $php_version      = get_post_meta( $product_id, '_revolt_preview_php_version', true ) ?: '8.0';
    $wp_version       = get_post_meta( $product_id, '_revolt_preview_wp_version', true ) ?: 'latest';
    $landing_page     = get_post_meta( $product_id, '_revolt_preview_landing_page', true ) ?: '/';

    // Build the blueprint
    $blueprint = array(
        'landingPage'       => $landing_page,
        'login'             => false,
        'preferredVersions' => array(
            'php' => $php_version,
            'wp'  => $wp_version,
        ),
        'steps' => array(),
    );

    // Step 1: Install the theme
    $blueprint['steps'][] = array(
        'step'         => 'installTheme',
        'themeZipFile' => array(
            'resource' => 'url',
            'url'      => $theme_zip_url,
        ),
        'options' => array(
            'activate' => true,
        ),
    );

    // Step 2: Import demo content (if provided)
    if ( ! empty( $demo_content_url ) ) {
        $blueprint['steps'][] = array(
            'step' => 'importWxr',
            'file' => array(
                'resource' => 'url',
                'url'      => $demo_content_url,
            ),
        );
    }

    // Step 3: Set site options
    $blueprint['steps'][] = array(
        'step'    => 'setSiteOptions',
        'options' => array(
            'blogname' => get_the_title( $product_id ) . ' — Preview',
        ),
    );

    // Step 4: Lock down admin — block wp-admin and wp-login, randomize admin password
    $lockdown_plugin = '<?php ' . "\n"
        . '/* Plugin Name: Preview Lockdown */' . "\n"
        . 'add_action("init", function() {' . "\n"
        . '    $request = $_SERVER["REQUEST_URI"] ?? "";' . "\n"
        . '    if (strpos($request, "/wp-admin") !== false && strpos($request, "/wp-admin/admin-ajax.php") === false) {' . "\n"
        . '        wp_redirect(home_url("/"));' . "\n"
        . '        exit;' . "\n"
        . '    }' . "\n"
        . '    if (strpos($request, "wp-login.php") !== false) {' . "\n"
        . '        wp_redirect(home_url("/"));' . "\n"
        . '        exit;' . "\n"
        . '    }' . "\n"
        . '});' . "\n"
        . 'add_filter("theme_action_links", "__return_empty_array");' . "\n"
        . 'add_filter("show_admin_bar", "__return_false");' . "\n"
        . 'add_filter("wp_headers", function($headers) {' . "\n"
        . '    $headers["X-Revolt-Preview"] = "true";' . "\n"
        . '    return $headers;' . "\n"
        . '});';

    $blueprint['steps'][] = array(
        'step'     => 'writeFile',
        'path'     => '/wordpress/wp-content/mu-plugins/revolt-preview-lockdown.php',
        'data'     => $lockdown_plugin,
    );

    // Step 5: Randomize admin password so default creds don't work
    $blueprint['steps'][] = array(
        'step' => 'runPHP',
        'code' => '<?php require_once "/wordpress/wp-load.php"; wp_set_password(wp_generate_password(32), 1); ?>',
    );

    // Encode blueprint into the Playground URL
    $blueprint_json   = json_encode( $blueprint, JSON_UNESCAPED_SLASHES );
    $blueprint_base64 = base64_encode( $blueprint_json );

    return 'https://playground.wordpress.net/#' . $blueprint_base64;
}

/**
 * Display the "Live Preview" button on single product pages — only for products tagged 'theme'.
 */
function revolt_display_theme_preview_button() {
    global $product;
    if ( ! $product ) return;

    // Only show on products tagged 'theme'
    if ( ! has_term( 'theme', 'product_tag', $product->get_id() ) ) return;

    $playground_url = revolt_get_playground_url( $product->get_id() );
    if ( ! $playground_url ) return;

    ?>
    <div class="revolt-theme-preview-cta tw-mt-4 tw-mb-4">
        <a href="<?php echo esc_url( $playground_url ); ?>" 
           target="_blank" 
           rel="noopener noreferrer"
           class="revolt-live-preview-btn tw-inline-flex tw-items-center tw-justify-center tw-w-full tw-px-6 tw-py-3 tw-text-sm tw-font-bold tw-tracking-wider tw-uppercase tw-rounded-lg tw-transition-all tw-duration-300"
           style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); color: #FCB900; border: 1px solid #FCB900; text-decoration: none;">
            <svg class="tw-w-5 tw-h-5 tw-mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
            Live Preview
        </a>
        <p class="tw-text-xs tw-text-gray-400 tw-mt-2 tw-text-center" style="font-family: 'Fira Code', monospace;">
            ⚡ Opens a live WordPress demo in your browser — no install needed
        </p>
    </div>
    <?php
}
add_action( 'woocommerce_single_product_summary', 'revolt_display_theme_preview_button', 35 );