<?php
/*
 * Template Name: Contact Page
 */
get_header();
?>

<main>
  <div class="page-wrapper">
    <?php get_template_part('partials/contact/contact-node'); ?>
  </div>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>