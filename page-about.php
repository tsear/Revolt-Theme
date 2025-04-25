<?php
/*
 * Template Name: About Page
 */
get_header();
?>

<main>
  <div class="page-wrapper">
    <?php get_template_part('partials/about/about-ide'); ?>
    <?php get_template_part('partials/about/about-process'); ?>
    <?php get_template_part('partials/about/about-tech'); ?>
  </div>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>