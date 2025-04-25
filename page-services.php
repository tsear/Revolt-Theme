<?php
/*
 * Template Name: Services Page
 */
get_header();
?>
<main>
  <div class="page-wrapper">
    <div class="services-wrapper">
      <?php get_template_part('partials/services/services-loop'); ?>
    </div>
  </div>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>