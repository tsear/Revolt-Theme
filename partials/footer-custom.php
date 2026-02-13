<footer id="site-footer" class="terminal-footer">
  <div class="terminal-wrapper">

    <!-- ASCII REVOLT Banner -->
    <pre class="ascii-banner">
░▒▓███████▓▒░  ░▒▓████████▓▒░ ░▒▓█▓▒░░▒▓█▓▒░  ░▒▓██████▓▒░  ░▒▓█▓▒░        ░▒▓████████▓▒░ 
░▒▓█▓▒░░▒▓█▓▒░ ░▒▓█▓▒░        ░▒▓█▓▒░░▒▓█▓▒░ ░▒▓█▓▒░░▒▓█▓▒░ ░▒▓█▓▒░           ░▒▓█▓▒░     
░▒▓█▓▒░░▒▓█▓▒░ ░▒▓█▓▒░         ░▒▓█▓▒▒▓█▓▒░  ░▒▓█▓▒░░▒▓█▓▒░ ░▒▓█▓▒░           ░▒▓█▓▒░     
░▒▓███████▓▒░  ░▒▓██████▓▒░    ░▒▓█▓▒▒▓█▓▒░  ░▒▓█▓▒░░▒▓█▓▒░ ░▒▓█▓▒░           ░▒▓█▓▒░     
░▒▓█▓▒░░▒▓█▓▒░ ░▒▓█▓▒░          ░▒▓█▓▓█▓▒░   ░▒▓█▓▒░░▒▓█▓▒░ ░▒▓█▓▒░           ░▒▓█▓▒░     
░▒▓█▓▒░░▒▓█▓▒░ ░▒▓█▓▒░          ░▒▓█▓▓█▓▒░   ░▒▓█▓▒░░▒▓█▓▒░ ░▒▓█▓▒░           ░▒▓█▓▒░     
░▒▓█▓▒░░▒▓█▓▒░ ░▒▓████████▓▒░    ░▒▓██▓▒░     ░▒▓██████▓▒░  ░▒▓████████▓▒░    ░▒▓█▓▒░     
    </pre>

    <!-- Navigation -->
    <ul class="terminal-nav">
      <li><a href="<?php echo site_url('/blog'); ?>">├── blog/</a></li>
      <li><a href="<?php echo site_url('/about'); ?>">├── about-us/</a></li>
      <li><a href="<?php echo site_url('/services'); ?>">├── services/</a></li>
      <li><a href="<?php echo site_url('/contact'); ?>">├── contact/</a></li>
      <li><button type="button" class="terminal-nav-btn" data-modal-target="solution-builder-modal" data-modal-toggle="solution-builder-modal">├── build-solution/</button></li>
    </ul>

    <!-- Newsletter Uplink -->
    <div class="terminal-newsletter">
      <span class="label">└── uplink →</span>
      <input type="email" placeholder="you@nowhere.net" />
      <button>subscribe ></button>
    </div>

    <!-- Logo -->
    <div class="terminal-logo">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-tyler.png" alt="Site Logo">
    </div>

    <!-- Footer Credit -->
    <div class="terminal-credit">// revoltstrategies.com — reclaimed & reimagined © <?php echo date("Y"); ?> //</div>

  </div>
</footer>

<!-- Solution Builder Modal (global) -->
<?php get_template_part('partials/solution-builder'); ?>

<!-- Flowbite JS -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

<?php wp_footer(); ?>
</body>
</html>