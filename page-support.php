<?php
/**
 * Template Name: Support
 * Description: SEO-optimized page for technical support, maintenance, and ongoing assistance
 */

get_header(); ?>

<main id="primary" class="site-main">
    <?php get_template_part('partials/keyword-pages/support'); ?>
    
    <section class="process-cta-section">
        <div class="container">
            <h2>Need Immediate Support?</h2>
            <p>Don't let technical issues slow you down. Our expert support team is ready to help you resolve problems quickly and get back to what matters most – running your business.</p>
            <a href="/contact" class="btn">Get Support Now</a>
        </div>
    </section>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
