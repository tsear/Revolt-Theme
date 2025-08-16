<?php
/*
 * Template Name: About Page
 */
get_header();
?>

<main>
  <div class="page-wrapper">
    <?php get_template_part('partials/about/about-timeline'); ?>
    <?php get_template_part('partials/about/about-process'); ?>
    <?php get_template_part('partials/about/about-tech'); ?>
    <?php get_template_part('partials/about/about-services-cta'); ?>
  </div>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>