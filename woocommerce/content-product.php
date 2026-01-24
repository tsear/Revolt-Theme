<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>
<li <?php wc_product_class( 'revolt-product-card', $product ); ?> style="list-style: none;">
    <div class="revolt-product-inner">
        <?php
        /**
         * Hook: woocommerce_before_shop_loop_item.
         */
        do_action( 'woocommerce_before_shop_loop_item' );
        ?>

        <a href="<?php echo esc_url( get_permalink() ); ?>" class="revolt-product-link">
            <div class="revolt-product-image" style="width: 100%; height: 300px; overflow: hidden; display: block; background: #f5f5f5;">
                <?php 
                $thumbnail_id = $product->get_image_id();
                if ( $thumbnail_id ) {
                    echo '<img src="' . esc_url( wp_get_attachment_image_url( $thumbnail_id, 'woocommerce_thumbnail' ) ) . '" alt="' . esc_attr( $product->get_name() ) . '" style="width: 100%; height: 300px; object-fit: cover; display: block;">';
                } else {
                    echo wc_placeholder_img();
                }
                ?>
            </div>

            <div class="revolt-product-details">
                <h3 class="revolt-product-title"><?php echo esc_html( $product->get_name() ); ?></h3>

                <div class="revolt-product-price">
                    <?php 
                    // Only show sale price if there's an actual sale
                    if ( $product->is_on_sale() && $product->get_regular_price() != $product->get_sale_price() ) {
                        echo '<del><span class="amount">' . wc_price( $product->get_regular_price() ) . '</span></del> ';
                        echo '<ins><span class="amount">' . wc_price( $product->get_sale_price() ) . '</span></ins>';
                    } else {
                        echo '<span class="amount">' . wc_price( $product->get_price() ) . '</span>';
                    }
                    ?>
                </div>
            </div>
        </a>

        <div class="revolt-product-actions">
            <?php
            /**
             * Hook: woocommerce_after_shop_loop_item.
             */
            do_action( 'woocommerce_after_shop_loop_item' );
            ?>
        </div>
    </div>
</li>
