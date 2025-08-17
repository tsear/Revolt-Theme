<?php
/*
 * Template Name: Development Environment - Our Setup
 */
get_header();
?>

<main>
  <?php get_template_part('partials/keyword-pages/development-environment'); ?>

  <section class="process-cta-section">
    <div class="container">
      <h2>Want to See Our Development Process in Action?</h2>
      <p>Experience our professional development environment and workflow firsthand with a custom project consultation.</p>
      <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="btn">Schedule a Consultation</a>
    </div>
  </section>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
