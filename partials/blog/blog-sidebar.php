<?php
/**
 * Partial: Blog Sidebar
 * Desktop sidebar with search, categories, tags, and recent posts
 */

$current_cat    = isset($_GET['blog_category']) ? sanitize_text_field($_GET['blog_category']) : '';
$current_tag    = isset($_GET['blog_tag']) ? sanitize_text_field($_GET['blog_tag']) : '';
$current_search = isset($_GET['blog_search']) ? sanitize_text_field($_GET['blog_search']) : '';

$categories = get_categories(array('hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC'));
$tags       = get_tags(array('hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC', 'number' => 30));
$blog_url   = get_permalink(get_page_by_path('blog'));
?>

<aside class="blog-sidebar">

  <!-- Search Widget -->
  <div class="sidebar-widget">
    <div class="sidebar-widget__header">
      <span class="widget-icon">🔍</span>
      <h3>Search Posts</h3>
    </div>
    <div class="sidebar-widget__body">
      <form class="blog-search" method="get" action="<?php echo esc_url($blog_url); ?>">
        <?php if ($current_cat) : ?><input type="hidden" name="blog_category" value="<?php echo esc_attr($current_cat); ?>"><?php endif; ?>
        <?php if ($current_tag) : ?><input type="hidden" name="blog_tag" value="<?php echo esc_attr($current_tag); ?>"><?php endif; ?>
        <input type="text" name="blog_search" class="blog-search__input" placeholder="grep -r 'topic'..." value="<?php echo esc_attr($current_search); ?>">
        <button type="submit" class="blog-search__btn" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
        </button>
      </form>
    </div>
  </div>

  <!-- Categories Widget -->
  <?php if ($categories) : ?>
  <div class="sidebar-widget">
    <div class="sidebar-widget__header">
      <span class="widget-icon">📁</span>
      <h3>Categories</h3>
    </div>
    <div class="sidebar-widget__body">
      <ul class="category-list">
        <li class="category-list__item">
          <a href="<?php echo esc_url($blog_url); ?>" class="<?php echo !$current_cat ? 'is-active' : ''; ?>">
            All Posts
            <span class="category-count"><?php echo esc_html(wp_count_posts()->publish); ?></span>
          </a>
        </li>
        <?php foreach ($categories as $cat) : 
          $cat_url = add_query_arg('blog_category', $cat->slug, $blog_url);
          if ($current_tag) $cat_url = add_query_arg('blog_tag', $current_tag, $cat_url);
          if ($current_search) $cat_url = add_query_arg('blog_search', $current_search, $cat_url);
        ?>
        <li class="category-list__item">
          <a href="<?php echo esc_url($cat_url); ?>" class="<?php echo ($current_cat === $cat->slug) ? 'is-active' : ''; ?>">
            <?php echo esc_html($cat->name); ?>
            <span class="category-count"><?php echo esc_html($cat->count); ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <?php endif; ?>

  <!-- Tags Widget -->
  <?php if ($tags) : ?>
  <div class="sidebar-widget">
    <div class="sidebar-widget__header">
      <span class="widget-icon">🏷️</span>
      <h3>Tags</h3>
    </div>
    <div class="sidebar-widget__body">
      <div class="tag-cloud">
        <?php foreach ($tags as $tag) :
          $tag_url = add_query_arg('blog_tag', $tag->slug, $blog_url);
          if ($current_cat) $tag_url = add_query_arg('blog_category', $current_cat, $tag_url);
          if ($current_search) $tag_url = add_query_arg('blog_search', $current_search, $tag_url);
        ?>
        <a href="<?php echo esc_url($tag_url); ?>" class="tag-cloud__tag <?php echo ($current_tag === $tag->slug) ? 'is-active' : ''; ?>">
          #<?php echo esc_html($tag->name); ?>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <!-- Recent Posts Widget -->
  <div class="sidebar-widget">
    <div class="sidebar-widget__header">
      <span class="widget-icon">📰</span>
      <h3>Recent Posts</h3>
    </div>
    <div class="sidebar-widget__body">
      <?php
      $recent = new WP_Query(array(
        'posts_per_page' => 5,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
      ));

      if ($recent->have_posts()) : ?>
      <ul class="category-list">
        <?php while ($recent->have_posts()) : $recent->the_post(); ?>
        <li class="category-list__item">
          <a href="<?php the_permalink(); ?>">
            <?php echo wp_trim_words(get_the_title(), 6, '...'); ?>
            <span class="category-count"><?php echo get_the_date('M j'); ?></span>
          </a>
        </li>
        <?php endwhile; wp_reset_postdata(); ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>

</aside>
