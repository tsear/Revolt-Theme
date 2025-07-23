<?php
/*
 * Template Name: E-commerce Solutions
 */
get_header();
?>

<main>
  <?php get_template_part('partials/keyword-pages/ecommerce-solutions'); ?>

  <section class="ecommerce-cta">
    <div class="container">
      <h2>Ready to Launch Your Profitable Online Store?</h2>
      <p>Transform your business with a custom e-commerce solution that drives sales and grows with your success. Get started with a free consultation and project quote.</p>
      <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="btn">Get Your Free E-commerce Quote</a>
    </div>
  </section>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
