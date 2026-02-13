<?php
/**
 * Partial: Blog Pagination
 * Numbered pagination with prev/next
 * 
 * Expects: $blog_query (WP_Query) to be set
 */

if (!isset($blog_query) || $blog_query->max_num_pages <= 1) return;

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
?>

<nav class="blog-pagination" aria-label="Blog pagination">
  <?php
  echo paginate_links(array(
    'total'     => $blog_query->max_num_pages,
    'current'   => $paged,
    'prev_text' => '← Prev',
    'next_text' => 'Next →',
    'mid_size'  => 2,
    'end_size'  => 1,
    'type'      => 'plain',
  ));
  ?>
</nav>
