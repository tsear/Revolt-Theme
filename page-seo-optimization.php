<?php
/*
 * Template Name: SEO Optimization Services
 */
get_header();
?>

<main>
  <?php get_template_part('partials/keyword-pages/seo-optimization'); ?>

  <section class="seo-cta">
    <div class="container">
      <h2>Ready to Dominate Search Results?</h2>
      <p>Boost your search rankings and drive organic traffic to your website. Get started with a free SEO audit and consultation.</p>
      <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="btn">Get Your Free SEO Audit</a>
    </div>
  </section>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
