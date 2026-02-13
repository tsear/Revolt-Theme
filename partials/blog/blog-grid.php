<?php
/**
 * Partial: Blog Grid
 * Renders the main post loop with featured first post and grid layout
 * 
 * Expects: $blog_query (WP_Query) to be set before including this partial
 */

if (!isset($blog_query) || !$blog_query->have_posts()) : ?>
  <div class="blog-no-results">
    <div class="no-results__icon">🔍</div>
    <h3 class="no-results__title">// no matching dispatches</h3>
    <p class="no-results__text">We couldn't find any posts matching your filters. Try adjusting your search or browse all posts.</p>
    <a href="<?php echo esc_url(get_permalink(get_page_by_path('blog'))); ?>" class="no-results__btn">View All Posts</a>
  </div>
<?php return; endif; ?>

<div class="blog-grid">
  <?php 
  $post_index = 0;
  while ($blog_query->have_posts()) : $blog_query->the_post();
    // First post on page 1 with no filters = featured
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $has_filters = isset($_GET['blog_category']) || isset($_GET['blog_tag']) || isset($_GET['blog_search']);
    $is_featured = ($post_index === 0 && $paged === 1 && !$has_filters);
    
    // Make $is_featured available to the card partial
    set_query_var('is_featured', $is_featured);
    include(locate_template('partials/blog/blog-card.php'));
    
    $post_index++;
  endwhile;
  wp_reset_postdata();
  ?>
</div>
