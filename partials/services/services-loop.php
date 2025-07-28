<section class="services-loop">
  <video autoplay muted loop playsinline class="services-loop__video">
    <source src="<?= get_template_directory_uri(); ?>/assets/video/ducati-loop.mp4" type="video/mp4">
  </video>

  <div class="services-loop__overlay">
    <div class="services-loop__zone zone--handlebars" data-zone="handlebars">
      <span class="zone__label">Web Developement</span>
      <span class="zone__data">Made for YOU by US</span>
      <span class="zone__system">Handlebars</span>
    </div>

    <div class="services-loop__zone zone--rear-axle" data-zone="rear">
      <span class="zone__label">Social Content</span>
      <span class="zone__data">Grip, grounded to audience</span>
      <span class="zone__system">Rear Axle</span>
    </div>

    <div class="services-loop__zone zone--front-axle" data-zone="front">
      <span class="zone__label">Hosting</span>
      <span class="zone__data">Keep your site on the Road</span>
      <span class="zone__system">Front Axle</span>
    </div>

    <div class="services-loop__zone zone--engine" data-zone="engine">
      <span class="zone__label">Managed or DIY</span>
      <span class="zone__data">Power, transmission, torque</span>
      <span class="zone__system">Engine Bay</span>
    </div>

    <div class="services-loop__zone zone--exhaust" data-zone="exhaust">
      <span class="zone__label">SEO</span>
      <span class="zone__data">Sexy noises to attract others</span>
      <span class="zone__system">Exhaust</span>
    </div>
  </div>
</section>

<section class="services-dashboard">
  <div class="dashboard-grid">
    <div class="dashboard-tile" data-zone="handlebars" data-redirect="<?php echo esc_url( site_url('/wordpress-development') ); ?>" style="cursor: pointer;">
      <h3>Web Development</h3>
      <div class="dashboard-content">
        <p>We work in Wordpress & develop highly functional, beautiful sites that work on all devices. Custom themes, plugins, headless sites, child themes, etc...</p>
      </div>
    </div>
    <div class="dashboard-tile" data-zone="rear" data-redirect="<?php echo esc_url( site_url('/social-content') ); ?>" style="cursor: pointer;">
      <h3>Social Content</h3>
      <div class="dashboard-content">
        <p>We can help you stay grounded to audience. We have strategic relationships with the best deisgners in NYC ***we're cool like that***</p>
      </div>
    </div>
    <div class="dashboard-tile" data-zone="front" data-redirect="<?php echo esc_url( site_url('/web-hosting') ); ?>" style="cursor: pointer;">
      <h3>Hosting</h3>
      <div class="dashboard-content">
        <p>We provide hosting to our clients at the lowest possible prices. Hosting with us give you direct file access to make quick & easy updates to your site + its 99.999% secure</p>
      </div>
    </div>
    <div class="dashboard-tile" data-zone="engine" data-redirect="<?php echo esc_url( site_url('/managed-services') ); ?>" style="cursor: pointer;">
      <h3>Managed or DIY</h3>
      <div class="dashboard-content">
        <p>Once we build your site, we can stay on to manage security, updates, & content posting -- or, leave that to you!</p>
      </div>
    </div>
    <div class="dashboard-tile" data-zone="exhaust" data-redirect="<?php echo esc_url( site_url('/seo-optimization') ); ?>" style="cursor: pointer;">
      <h3>SEO</h3>
      <div class="dashboard-content">
        <p>Our sites come out of the box following SEO best practices -- Paired with high level keyword research & you will be ranking higher than you thought possible!</p>
      </div>
    </div>
  </div>
</section>