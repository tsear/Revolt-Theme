<?php
/*
 * Template Name: Technology Stack - Our Development Tools
 */
get_header();
?>

<main>
  <?php get_template_part('partials/keyword-pages/technology-stack'); ?>

  <section class="process-cta-section">
    <div class="container">
      <h2>Ready to Build with Modern Technology?</h2>
      <p>Let's discuss how our technology expertise can solve your specific development challenges and scale your business.</p>
      <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="btn">Discuss Your Tech Stack</a>
    </div>
  </section>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
