<?php
/*
 * Template Name: Our Process - How We Build Websites
 */
get_header();
?>

<main>
  <?php get_template_part('partials/keyword-pages/our-process'); ?>

  <section class="process-cta-section">
    <div class="container">
      <h2>Ready to Start Your Project?</h2>
      <p>Experience our proven development process firsthand. Get a detailed project proposal and timeline tailored to your specific needs.</p>
      <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="btn">Start Your Project</a>
    </div>
  </section>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
