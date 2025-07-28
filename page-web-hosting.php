<?php
/*
 * Template Name: Web Hosting Services
 */
get_header();
?>

<main>
  <?php get_template_part('partials/keyword-pages/web-hosting'); ?>

  <section class="hosting-cta">
    <div class="container">
      <h2>Ready for Lightning-Fast Hosting?</h2>
      <p>Get your website on enterprise-grade hosting that scales with your business. Get started with a free migration and hosting consultation.</p>
      <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="btn">Get Your Free Migration</a>
    </div>
  </section>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
