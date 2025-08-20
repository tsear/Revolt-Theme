<?php get_header(); ?>

<main>

    <section id="hero" class="hero">
      <div class="container">
        <h1 class="hero-heading">
          <span class="hero-static">We Build Websites for&nbsp;</span>
          <span class="rotating-container">
            <span class="rotating-placeholder">Young Creators</span>
            <span id="rotating-word">Young Creators</span>
          </span>
        </h1>
        <p class="hero-subtext">Because having something to say shouldn't require a trust fund.</p>
        <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="btn hero-cta">Break the Paywall</a>
      </div>
    </section>

    <?php get_template_part('partials/what-to-expect'); ?>
    <?php get_template_part('partials/divider-horizontal'); ?>
    <?php get_template_part('partials/divider-two'); ?>
    <?php get_template_part('partials/start-here'); ?>

    <div style="margin-bottom: 5rem;">
      <?php get_template_part('partials/divider-three'); ?>
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
    <input type="email" id="popup-terminal-email" placeholder="email@revolt.dev" required />
    <button type="submit">subscribe</button>
  </form>
</div>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>