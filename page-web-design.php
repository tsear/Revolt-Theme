<?php
/*
 * Template Name: Custom Web Design
 */
get_header();
?>

<main>
  <?php get_template_part('partials/keyword-pages/web-design'); ?>

  <section class="design-cta">
    <div class="container">
      <h2>Transform Your Online Presence</h2>
      <p>Create a stunning website that converts visitors into customers. Get started with a free consultation and project quote.</p>
      <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="btn">Start Your Design Project</a>
    </div>
  </section>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
