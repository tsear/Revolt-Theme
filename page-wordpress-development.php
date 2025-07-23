<?php
/*
 * Template Name: WordPress Development Services
 */
get_header();
?>

<main>
  <?php get_template_part('partials/keyword-pages/wordpress-development'); ?>

  <section class="wordpress-cta">
    <div class="container">
      <h2>Ready to Build Your WordPress Site?</h2>
      <p>Transform your ideas into a powerful WordPress website that drives results. Get started with a free consultation and project quote.</p>
      <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="btn">Get Your Free WordPress Quote</a>
    </div>
  </section>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
