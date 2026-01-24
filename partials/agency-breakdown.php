<?php
/**
 * Agency Breakdown Section
 * 3-column feature grid: Agency Mission | Revolutionary Tools | Community Impact
 */
?>

<section id="agency-breakdown" class="agency-breakdown">
  <div class="container">
    
    <!-- Section Header -->
    <div class="breakdown-header">
      <div class="breakdown-intro">// Who we are & what we're building</div>
      <h2 class="breakdown-title">Reclaiming Web Development</h2>
      <p class="breakdown-subtitle">
        We're not just another agency. We're revolutionaries building tools and websites that put power back in the hands of creators, entrepreneurs, and rebels who refuse to be gatekept by big tech.
      </p>
    </div>

    <!-- 3-Column Feature Grid -->
    <div class="breakdown-grid">
      
      <!-- Column 1: Agency Mission -->
      <div class="breakdown-card">
        <div class="card-icon">🎯</div>
        <h3 class="card-title">Our Mission</h3>
        <p class="card-description">
          We believe quality web development shouldn't require a trust fund or corporate backing. Every creator deserves production-ready tools and websites that they own completely.
        </p>
        <div class="card-features">
          <div class="feature-item">
            <span class="feature-check">✓</span>
            No vendor lock-in, ever
          </div>
          <div class="feature-item">
            <span class="feature-check">✓</span>
            Transparent pricing & process
          </div>
          <div class="feature-item">
            <span class="feature-check">✓</span>
            You own 100% of your code
          </div>
        </div>
        <a href="<?php echo esc_url( site_url('/about') ); ?>" class="card-cta">
          Learn Our Story →
        </a>
      </div>

      <!-- Column 2: Revolutionary Tools -->
      <div class="breakdown-card">
        <div class="card-icon">🛠️</div>
        <h3 class="card-title">Revolutionary Tools</h3>
        <p class="card-description">
          Our shop isn't just products—it's a rebellion against overpriced, gatekept development tools. We build proprietary solutions that level the playing field.
        </p>
        <div class="card-features">
          <div class="feature-item">
            <span class="feature-check">✓</span>
            Affordable, powerful tools
          </div>
          <div class="feature-item">
            <span class="feature-check">✓</span>
            Built for independence
          </div>
          <div class="feature-item">
            <span class="feature-check">✓</span>
            No monthly subscriptions
          </div>
        </div>
        <a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" class="card-cta">
          Explore Tools →
        </a>
      </div>

      <!-- Column 3: Community Impact -->
      <div class="breakdown-card">
        <div class="card-icon">🚀</div>
        <h3 class="card-title">Community Impact</h3>
        <p class="card-description">
          Every project we complete and tool we release strengthens the independent web. We're building a movement where creators control their digital destiny.
        </p>
        <div class="card-features">
          <div class="feature-item">
            <span class="feature-check">✓</span>
            Empowering solo creators
          </div>
          <div class="feature-item">
            <span class="feature-check">✓</span>
            Open-source contributions
          </div>
          <div class="feature-item">
            <span class="feature-check">✓</span>
            Knowledge sharing
          </div>
        </div>
        <button type="button" class="card-cta card-cta-button"
                data-modal-target="solution-builder-modal" data-modal-toggle="solution-builder-modal">
          Join The Movement →
        </button>
      </div>

    </div>

    <!-- Bottom CTA Section -->
    <div class="breakdown-cta">
      <p class="cta-message">Ready to reclaim your digital independence?</p>
      <div class="cta-buttons">
        <a href="<?php echo esc_url( site_url('/contact') ); ?>" class="btn breakdown-cta-primary">
          Start Your Project
        </a>
        <a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" class="btn breakdown-cta-secondary">
          Browse Tools
        </a>
      </div>
    </div>

  </div>
</section>