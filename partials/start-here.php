<?php
/**
 * Partial: Start Here V2     <form id="startHereForm" class="conversational-form">
      <?php wp_nonce_field('revolt_start_here_form', 'revolt_start_here_nonce'); ?>
      <p>Hi, I'm <input type="text" name="name" placeholder="your name"> and I 
        <select name="action">
          <option value="make">make</option>form id="startHereForm" class="conversational-form">
      <?php wp_nonce_field('revolt_start_here_form', 'revolt_start_here_nonce'); ?>
      <p>Hi, I'm <input type="text" name="name" placeholder="your name"> and I* A structured introduction, form, and CTA section.
 */
?>

<section id="start-here-v2" class="start-here-v2">

  <!-- Part 1: Intro Container -->
  <div class="start-here-intro-container">
    <div class="intro-header">
      <h2 class="intro-title">First, Get to Know Us.</h2>
      <p class="intro-subtitle">We're not a typical agency. We're a small, dedicated team focused on building powerful, independent web solutions. Here's a glimpse into our ethos.</p>
    </div>
    
    <div class="intro-content-elements">
      <div class="element">
        <div class="element-icon">💡</div>
        <h3 class="element-title">Radical Transparency</h3>
        <p class="element-text">No black boxes. You see our process, our code, and our pricing upfront. We build on open-source tech that you control, not us.</p>
      </div>
      <div class="element">
        <div class="element-icon">🛠️</div>
        <h3 class="element-title">A True Partnership</h3>
        <p class="element-text">Your project is our project. We're invested in your success because it's the only metric that matters. It's that simple.</p>
      </div>
    </div>
  </div>

  <!-- Part 2: Form Container -->
  <div class="start-here-form-container">
    <div class="form-header">
      <h3 class="form-title">Now, Tell Us Your Story.</h3>
    </div>
    <form id="startHereForm" class="conversational-form">
      <p>Hi, I’m <input type="text" name="name" placeholder="your name"> and I 
        <select name="action">
          <option value="make">make</option>
          <option value="build">build</option>
          <option value="write">write</option>
          <option value="scream into the void about">scream into the void about</option>
        </select>
        <input type="text" name="what" placeholder="what you do">.
      </p>
  
      <p>Lately, I’ve been trying to <input type="text" name="trying" placeholder="achieve a goal">, but I'm blocked by <input type="text" name="blocked" placeholder="a specific obstacle">.</p>
  
      <p>You can reach me at <input type="email" name="email" placeholder="your email" required>.</p>
  
      <button type="submit" class="btn-cta">Initiate Contact</button>
    </form>
    <div id="startHereResponse" style="display:none;">
      <p>✅ Message received. We'll be in touch shortly.</p>
    </div>
  </div>

  <!-- Part 3: CTA from About Page -->
  <div class="start-here-cta-container">
    <?php get_template_part('partials/about/about-services-cta'); ?>
  </div>

</section>
