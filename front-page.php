<?php get_header(); ?>

<main>

    <section id="hero" class="hero">
      <div class="container">
        <h1 class="hero-heading">
          <span class="hero-static">We Build Websites for&nbsp;</span>
          <span id="rotating-text-root" class="rotating-container"></span>
        </h1>
        <p class="hero-subtext">Because having something to say shouldn't require a trust fund.</p>
        <div class="hero-cta-group">
          <a href="<?php echo esc_url( site_url('/about') ); ?>" class="btn hero-cta">About Us</a>
          <button type="button" class="btn hero-cta hero-cta-secondary" data-modal-target="solution-builder-modal" data-modal-toggle="solution-builder-modal">Build Your Solution</button>
        </div>
      </div>

      <!-- Scroll arrow React component -->
      <div id="scroll-arrow-root"></div>

      <?php get_template_part('partials/divider-horizontal'); ?>
    </section>

    <?php get_template_part('partials/what-to-expect'); ?>

    <div class="static-divider-wrapper">
      <?php get_template_part('partials/divider-horizontal'); ?>
    </div>

    <?php get_template_part('partials/start-here'); ?>

    <div class="static-divider-wrapper" style="margin-bottom: 5rem;">
      <?php get_template_part('partials/divider-horizontal'); ?>
    </div>

</main>

<!-- ✅ Terminal Popup -->
<div id="popup-terminal" class="popup-terminal" style="display: none;">
  <button id="popup-terminal-close" class="popup-terminal-close" aria-label="Close">✖</button>
  <pre>
       /\_/\  
      ( o.o )   THANK YOU FOR SAVING OUR DATA
       > ^ <    From the Dreaded Marketing Agencies.

Subscribe to the underground feed:
  </pre>
  <form id="popup-terminal-form">
    <?php wp_nonce_field('revolt_newsletter_subscribe', 'revolt_newsletter_nonce'); ?>
    <input type="email" id="popup-terminal-email" placeholder="email@revolt.dev" required />
    <button type="submit">subscribe</button>
  </form>
</div>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>