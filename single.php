<?php
/**
 * Single Post Template
 * 
 * Renders individual blog posts with full content,
 * author box, post navigation, and related posts.
 */
get_header();
?>

<main>
  <div class="page-wrapper">
    <div class="blog-single">
      <?php 
      while (have_posts()) : the_post();
        get_template_part('partials/blog/blog-single-content');
      endwhile;
      ?>
    </div>
  </div>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
