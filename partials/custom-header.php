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
      <li class="nav-cta">
        <button type="button" class="header-build-btn" data-modal-target="solution-builder-modal" data-modal-toggle="solution-builder-modal">⚡ Build</button>
      </li>
      <?php if ( function_exists('is_woocommerce') ) : ?>
      <li class="nav-cart">
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-cart-link">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.4 5M17 13l1.4 5M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"/>
          </svg>
          <?php 
          $cart_count = WC()->cart->get_cart_contents_count();
          if ( $cart_count > 0 ) : 
          ?>
          <span class="cart-count"><?php echo esc_html( $cart_count ); ?></span>
          <?php endif; ?>
        </a>
      </li>
      <?php endif; ?>
    </ul>
  </nav>
</div>