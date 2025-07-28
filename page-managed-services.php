<?php
/*
 * Template Name: Managed Services
 */
get_header();
?>

<main>
  <?php get_template_part('partials/keyword-pages/managed-services'); ?>

  <section class="managed-cta">
    <div class="container">
      <h2>Ready to Focus on Your Business?</h2>
      <p>Let us handle the technical details while you focus on growing your business. Get started with a free site assessment and management consultation.</p>
      <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="btn">Get Your Free Assessment</a>
    </div>
  </section>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
