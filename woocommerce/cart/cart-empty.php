<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 */

defined( 'ABSPATH' ) || exit;

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>

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
        <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="btn empty-cart-btn">
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

<?php endif; ?>