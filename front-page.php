<?php get_header(); ?>

<main>

    <section id="hero" class="hero">
      <div class="container">
        <h1 class="hero-heading">
          <span class="hero-static">We Build Websites for&nbsp;</span>
          <span class="rotating-container">
            <span class="rotating-placeholder">Entrepreneurs</span>
            <span id="rotating-word">Everyone</span>
          </span>
        </h1>
        <p>WordPress builds for Self-Publishing</p>
        <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="btn">Get Started</a>
      </div>
    </section>

    <section id="code-intro" class="code-intro">
      <div class="container">
        <p class="ethos-label">// Our Ethos.</p>
      </div>
    </section>

    <?php get_template_part('partials/code-showcase'); ?>
    <?php get_template_part('partials/divider-horizontal'); ?>
    <?php get_template_part('partials/what-to-expect'); ?>
    <?php get_template_part('partials/divider-two'); ?>

    <!-- Hide these two on mobile -->
    <div class="hide-on-mobile">
      <?php get_template_part('partials/revolt-revolution'); ?>
    </div>
    <div class="hide-on-mobile">
      <?php get_template_part('partials/voices-for-rent'); ?>
    </div>

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