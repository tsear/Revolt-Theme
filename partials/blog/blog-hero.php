<?php
/**
 * Partial: Blog Hero
 * Terminal-style blog header with post count
 */

$total_posts = wp_count_posts()->publish;
?>

<section class="blog-hero">
  <div class="container">
    <div class="blog-hero__directive">// dispatches from the front lines</div>
    <h1 class="blog-hero__title">The Revolt Blog</h1>
    <p class="blog-hero__subtitle">
      Unfiltered takes on web development, WordPress, SEO, and building an independent web. 
      No corporate jargon. No gatekeeping. Just signal.
    </p>
  </div>
</section>
