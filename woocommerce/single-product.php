<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<?php
    /**
     * woocommerce_before_main_content hook.
     */
    do_action( 'woocommerce_before_main_content' );
?>

<div class="revolt-single-product">
    <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>

        <?php wc_get_template_part( 'content', 'single-product' ); ?>

    <?php endwhile; // end of the loop. ?>
</div>

<?php
    /**
     * woocommerce_after_main_content hook.
     */
    do_action( 'woocommerce_after_main_content' );
?>

<?php
    /**
     * woocommerce_sidebar hook.
     */
    do_action( 'woocommerce_sidebar' );
?>

<?php
include get_template_directory() . '/partials/footer-custom.php';
