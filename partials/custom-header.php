<div class="header-inner">
  <div class="header-logo">
    <a href="<?php echo esc_url(home_url('/')); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-tyler.png" alt="Site Logo">
    </a>
  </div>

  <pre class="ascii-title">░▒▓█▓▒░   REVOLT   ░▒▓█▓▒░</pre>

  <nav class="header-nav">
    <ul>
      <li class="dropdown">
        <a href="<?php echo site_url('/about'); ?>" class="dropdown-toggle">About <span class="dropdown-arrow">▼</span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('/our-process'); ?>">Our Process</a></li>
          <li><a href="<?php echo site_url('/technology-stack'); ?>">Technology Stack</a></li>
          <li><a href="<?php echo site_url('/development-environment'); ?>">Dev Environment</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="<?php echo site_url('/services'); ?>" class="dropdown-toggle">Services <span class="dropdown-arrow">▼</span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('/web-design'); ?>">Web Design</a></li>
          <li><a href="<?php echo site_url('/wordpress-development'); ?>">WordPress Development</a></li>
          <li><a href="<?php echo site_url('/seo-optimization'); ?>">SEO Optimization</a></li>
          <li><a href="<?php echo site_url('/ecommerce-solutions'); ?>">E-commerce Solutions</a></li>
          <li><a href="<?php echo site_url('/social-content'); ?>">Social Content</a></li>
          <li><a href="<?php echo site_url('/web-hosting'); ?>">Web Hosting</a></li>
          <li><a href="<?php echo site_url('/managed-services'); ?>">Managed Services</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="<?php echo site_url('/contact'); ?>" class="dropdown-toggle">Contact <span class="dropdown-arrow">▼</span></a>
        <ul class="dropdown-menu">
          <li><a href="#" data-modal-target="solution-builder-modal" data-modal-toggle="solution-builder-modal">Get Quote</a></li>
          <li><a href="<?php echo site_url('/project-discussion'); ?>">Project Discussion</a></li>
          <li><a href="<?php echo site_url('/support'); ?>">Support</a></li>
        </ul>
      </li>
      <li class="nav-cta">
        <button type="button" class="header-build-btn" data-modal-target="solution-builder-modal" data-modal-toggle="solution-builder-modal">⚡ Build</button>
      </li>
    </ul>
  </nav>
</div>