<?php
/*
 * Template Name: Social Content Services
 */
get_header();
?>

<main>
  <?php get_template_part('partials/keyword-pages/social-content'); ?>

  <section class="content-cta">
    <div class="container">
      <h2>Ready to Amplify Your Social Presence?</h2>
      <p>Create engaging content that builds authentic connections with your audience. Get started with a free strategy consultation and content audit.</p>
      <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="btn">Get Your Free Content Audit</a>
    </div>
  </section>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
