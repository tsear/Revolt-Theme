<?php
/**
 * Main WooCommerce wrapper template
 */

get_header(); ?>

<div class="revolt-woocommerce-wrapper">
    <div class="container">
        <?php 
        // Load our custom templates directly instead of woocommerce_content()
        if ( is_shop() || is_product_category() || is_product_tag() ) {
            // Shop/archive pages - load our custom archive template
            include( get_template_directory() . '/woocommerce/archive-product.php' );
        } elseif ( is_product() ) {
            // Single product - load WooCommerce default for now
            woocommerce_content();
        } else {
            // Cart, checkout, account pages
            woocommerce_content();
        }
        ?>
    </div>
</div>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
