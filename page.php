<?php get_header(); ?>

<main>
    <div class="page-wrapper">
        <?php if ( function_exists('is_cart') && (is_cart() || is_checkout() || is_account_page()) ) : ?>
            <div class="revolt-woocommerce-wrapper">
                <div class="container">
                    <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
                </div>
            </div>
        <?php else : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
