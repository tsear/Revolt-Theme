<?php
/**
 * Partial: Blog Card
 * Renders a single post card within the blog grid.
 * 
 * Expected variables (optional):
 *   $is_featured — bool, renders the featured/wide layout
 */

$is_featured = isset($is_featured) ? $is_featured : false;
$card_class  = $is_featured ? 'blog-card blog-card--featured' : 'blog-card';

// Get post data
$post_id     = get_the_ID();
$categories  = get_the_category($post_id);
$tags        = get_the_tags($post_id);
$read_time   = revolt_get_read_time($post_id);
$blog_url    = get_permalink(get_page_by_path('blog'));
?>

<article class="<?php echo esc_attr($card_class); ?>">
  <!-- Thumbnail -->
  <div class="blog-card__thumbnail">
    <?php if (has_post_thumbnail()) : ?>
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('large'); ?>
      </a>
    <?php else : ?>
      <a href="<?php the_permalink(); ?>">
        <div class="blog-card__placeholder">
          <pre>
  ┌─────────────┐
  │  REVOLT://   │
  │  <?php echo esc_html(strtoupper(substr(get_the_title(), 0, 10))); ?>  │
  └─────────────┘
          </pre>
        </div>
      </a>
    <?php endif; ?>

    <?php if ($categories) : ?>
      <a href="<?php echo esc_url(add_query_arg('blog_category', $categories[0]->slug, $blog_url)); ?>" class="blog-card__category">
        <?php echo esc_html($categories[0]->name); ?>
      </a>
    <?php endif; ?>
  </div>

  <!-- Body -->
  <div class="blog-card__body">
    <!-- Meta -->
    <div class="blog-card__meta">
      <span class="meta__date"><?php echo get_the_date('M j, Y'); ?></span>
      <span class="meta__separator">·</span>
      <span class="meta__read-time"><?php echo esc_html($read_time); ?> min read</span>
    </div>

    <!-- Title -->
    <h2 class="blog-card__title">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>

    <!-- Excerpt -->
    <div class="blog-card__excerpt">
      <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
    </div>

    <!-- Footer -->
    <div class="blog-card__footer">
      <div class="blog-card__tags">
        <?php if ($tags) : 
          $tag_limit = $is_featured ? 4 : 2;
          $shown_tags = array_slice($tags, 0, $tag_limit);
          foreach ($shown_tags as $tag) : ?>
            <a href="<?php echo esc_url(add_query_arg('blog_tag', $tag->slug, $blog_url)); ?>" class="tag">
              #<?php echo esc_html($tag->name); ?>
            </a>
          <?php endforeach;
        endif; ?>
      </div>
      <a href="<?php the_permalink(); ?>" class="blog-card__read-more">Read →</a>
    </div>
  </div>
</article>
