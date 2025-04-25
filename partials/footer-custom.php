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

    <!-- Navigation (our-work removed) -->
    <ul class="terminal-nav">
      <li><a href="<?php echo site_url('/about'); ?>">├── about-us/</a></li>
      <li><a href="<?php echo site_url('/services'); ?>">├── services/</a></li>
      <li><a href="<?php echo site_url('/contact'); ?>">└── contact/</a></li>
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
  <?php wp_footer(); ?>
</footer>
</body>
</html>