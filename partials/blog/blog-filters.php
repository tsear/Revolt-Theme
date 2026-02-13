<?php
/**
 * Partial: Blog Filters (mobile + active filters bar)
 * Renders the mobile filter toggle and the active-filter tag strip
 */

// Get current filters from URL
$current_cat  = isset($_GET['blog_category']) ? sanitize_text_field($_GET['blog_category']) : '';
$current_tag  = isset($_GET['blog_tag']) ? sanitize_text_field($_GET['blog_tag']) : '';
$current_search = isset($_GET['blog_search']) ? sanitize_text_field($_GET['blog_search']) : '';

$has_filters = $current_cat || $current_tag || $current_search;

// Get all categories & tags for mobile panel
$categories = get_categories(array('hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC'));
$tags = get_tags(array('hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC', 'number' => 30));

// Build base URL (blog page)
$blog_url = get_permalink(get_page_by_path('blog'));
?>

<!-- Mobile Filter Toggle -->
<div class="blog-mobile-filters">
  <button type="button" class="mobile-filter__toggle" id="blogMobileFilterToggle">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75"/>
    </svg>
    Filters &amp; Search
  </button>

  <div class="mobile-filter__panel" id="blogMobileFilterPanel">
    <!-- Mobile Search -->
    <div class="mobile-filter__section">
      <h4>Search</h4>
      <form class="blog-search" method="get" action="<?php echo esc_url($blog_url); ?>">
        <?php if ($current_cat) : ?><input type="hidden" name="blog_category" value="<?php echo esc_attr($current_cat); ?>"><?php endif; ?>
        <?php if ($current_tag) : ?><input type="hidden" name="blog_tag" value="<?php echo esc_attr($current_tag); ?>"><?php endif; ?>
        <input type="text" name="blog_search" class="blog-search__input" placeholder="grep -r 'topic'..." value="<?php echo esc_attr($current_search); ?>">
        <button type="submit" class="blog-search__btn" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
        </button>
      </form>
    </div>

    <!-- Mobile Categories -->
    <?php if ($categories) : ?>
    <div class="mobile-filter__section">
      <h4>Categories</h4>
      <ul class="category-list">
        <li class="category-list__item">
          <a href="<?php echo esc_url($blog_url); ?>" class="<?php echo !$current_cat ? 'is-active' : ''; ?>">
            All Posts
            <span class="category-count"><?php echo esc_html($total_posts ?? wp_count_posts()->publish); ?></span>
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
    <?php endif; ?>

    <!-- Mobile Tags -->
    <?php if ($tags) : ?>
    <div class="mobile-filter__section">
      <h4>Tags</h4>
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
    <?php endif; ?>
  </div>
</div>

<!-- Active Filters Bar -->
<?php if ($has_filters) : ?>
<div class="blog-active-filters">
  <span class="active-filter__label">// active filters:</span>

  <?php if ($current_search) : 
    $remove_url = remove_query_arg('blog_search');
  ?>
  <span class="active-filter__tag">
    search: "<?php echo esc_html($current_search); ?>"
    <a href="<?php echo esc_url($remove_url); ?>" class="active-filter__remove" aria-label="Remove search filter">✕</a>
  </span>
  <?php endif; ?>

  <?php if ($current_cat) :
    $cat_obj = get_category_by_slug($current_cat);
    $remove_url = remove_query_arg('blog_category');
  ?>
  <span class="active-filter__tag">
    cat: <?php echo esc_html($cat_obj ? $cat_obj->name : $current_cat); ?>
    <a href="<?php echo esc_url($remove_url); ?>" class="active-filter__remove" aria-label="Remove category filter">✕</a>
  </span>
  <?php endif; ?>

  <?php if ($current_tag) :
    $tag_obj = get_term_by('slug', $current_tag, 'post_tag');
    $remove_url = remove_query_arg('blog_tag');
  ?>
  <span class="active-filter__tag">
    tag: #<?php echo esc_html($tag_obj ? $tag_obj->name : $current_tag); ?>
    <a href="<?php echo esc_url($remove_url); ?>" class="active-filter__remove" aria-label="Remove tag filter">✕</a>
  </span>
  <?php endif; ?>

  <a href="<?php echo esc_url($blog_url); ?>" class="active-filter__clear">Clear All</a>
</div>
<?php endif; ?>
