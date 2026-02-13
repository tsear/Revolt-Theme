<?php
/**
 * Partial: Blog Single Content
 * Renders the full post content for single.php
 */

$post_id    = get_the_ID();
$categories = get_the_category($post_id);
$tags       = get_the_tags($post_id);
$author_id  = get_the_author_meta('ID');
$read_time  = revolt_get_read_time($post_id);
$blog_url   = get_permalink(get_page_by_path('blog'));
?>

<!-- Post Hero -->
<section class="blog-single__hero">
  <div class="container">
    <!-- Breadcrumb -->
    <div class="blog-single__breadcrumb">
      <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
      <span class="breadcrumb__sep">/</span>
      <a href="<?php echo esc_url($blog_url); ?>">Blog</a>
      <?php if ($categories) : ?>
      <span class="breadcrumb__sep">/</span>
      <a href="<?php echo esc_url(add_query_arg('blog_category', $categories[0]->slug, $blog_url)); ?>">
        <?php echo esc_html($categories[0]->name); ?>
      </a>
      <?php endif; ?>
    </div>

    <!-- Category Badge -->
    <?php if ($categories) : ?>
      <a href="<?php echo esc_url(add_query_arg('blog_category', $categories[0]->slug, $blog_url)); ?>" class="blog-single__category">
        <?php echo esc_html($categories[0]->name); ?>
      </a>
    <?php endif; ?>

    <!-- Title -->
    <h1 class="blog-single__title"><?php the_title(); ?></h1>

    <!-- Meta -->
    <div class="blog-single__meta">
      <span class="meta__author">
        <?php echo get_avatar($author_id, 28); ?>
        <span><?php the_author(); ?></span>
      </span>
      <span class="meta__separator">·</span>
      <span><?php echo get_the_date('F j, Y'); ?></span>
      <span class="meta__separator">·</span>
      <span><?php echo esc_html($read_time); ?> min read</span>
    </div>
  </div>
</section>

<!-- Featured Image -->
<?php if (has_post_thumbnail()) : ?>
<div class="blog-single__featured-image">
  <?php the_post_thumbnail('full'); ?>
</div>
<?php endif; ?>

<!-- Post Content -->
<div class="blog-single__content">
  <div class="post-content">
    <?php the_content(); ?>
  </div>
</div>

<!-- Tags -->
<?php if ($tags) : ?>
<div class="blog-single__tags">
  <span class="tags__label">Tags:</span>
  <div class="tags__list">
    <?php foreach ($tags as $tag) : ?>
      <a href="<?php echo esc_url(add_query_arg('blog_tag', $tag->slug, $blog_url)); ?>">
        #<?php echo esc_html($tag->name); ?>
      </a>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<!-- Author Box -->
<div class="blog-single__author-box">
  <?php echo get_avatar($author_id, 64, '', '', array('class' => 'author-box__avatar')); ?>
  <div class="author-box__info">
    <div class="author-box__name"><?php the_author(); ?></div>
    <div class="author-box__role">// revolt contributor</div>
    <div class="author-box__bio">
      <?php echo get_the_author_meta('description') ?: 'Building the independent web, one commit at a time.'; ?>
    </div>
  </div>
</div>

<!-- Post Navigation -->
<?php 
$prev_post = get_previous_post();
$next_post = get_next_post();

if ($prev_post || $next_post) : ?>
<nav class="blog-single__nav">
  <?php if ($prev_post) : ?>
  <a href="<?php echo get_permalink($prev_post->ID); ?>" class="post-nav__link post-nav__link--prev">
    <span class="post-nav__label">← Previous</span>
    <span class="post-nav__title"><?php echo esc_html($prev_post->post_title); ?></span>
  </a>
  <?php else : ?>
  <div></div>
  <?php endif; ?>

  <?php if ($next_post) : ?>
  <a href="<?php echo get_permalink($next_post->ID); ?>" class="post-nav__link post-nav__link--next">
    <span class="post-nav__label">Next →</span>
    <span class="post-nav__title"><?php echo esc_html($next_post->post_title); ?></span>
  </a>
  <?php else : ?>
  <div></div>
  <?php endif; ?>
</nav>
<?php endif; ?>

<!-- Related Posts -->
<?php
$related_args = array(
  'posts_per_page' => 3,
  'post__not_in'   => array($post_id),
  'post_status'    => 'publish',
  'orderby'        => 'rand',
);

// Try to match by category first
if ($categories) {
  $related_args['category__in'] = wp_list_pluck($categories, 'term_id');
}

$related_query = new WP_Query($related_args);

if ($related_query->have_posts()) : ?>
<section class="blog-single__related">
  <div class="related__header">
    <div class="related__directive">// see also</div>
    <h2 class="related__title">Related Dispatches</h2>
  </div>
  <div class="related__grid">
    <?php while ($related_query->have_posts()) : $related_query->the_post();
      $is_featured = false;
      include(locate_template('partials/blog/blog-card.php'));
    endwhile;
    wp_reset_postdata(); ?>
  </div>
</section>
<?php endif; ?>
