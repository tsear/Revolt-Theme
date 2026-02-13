<?php
/**
 * Template Name: Blog Page
 * 
 * Main blog archive template.
 * Handles category, tag, and search filtering via GET params.
 * Uses native WordPress post type with pagination.
 */
get_header();

// --- Build the query ---
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$posts_per_page = 9; // 1 featured + 8 grid

$query_args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

// Category filter
if (!empty($_GET['blog_category'])) {
    $query_args['category_name'] = sanitize_text_field($_GET['blog_category']);
}

// Tag filter
if (!empty($_GET['blog_tag'])) {
    $query_args['tag'] = sanitize_text_field($_GET['blog_tag']);
}

// Search filter
if (!empty($_GET['blog_search'])) {
    $query_args['s'] = sanitize_text_field($_GET['blog_search']);
}

$blog_query = new WP_Query($query_args);
?>

<main>
  <div class="page-wrapper">
    <div class="blog-archive">
      
      <?php get_template_part('partials/blog/blog-hero'); ?>

      <div class="blog-content">
        <!-- Main Column -->
        <div class="blog-main">
          <?php get_template_part('partials/blog/blog-filters'); ?>
          <?php include(locate_template('partials/blog/blog-grid.php')); ?>
          <?php include(locate_template('partials/blog/blog-pagination.php')); ?>
        </div>

        <!-- Sidebar -->
        <?php get_template_part('partials/blog/blog-sidebar'); ?>
      </div>

    </div>
  </div>
</main>

<?php include get_template_directory() . '/partials/footer-custom.php'; ?>
