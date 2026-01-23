<?php
/**
 * Complete shop storefront with Flowbite sidebar + grid layout
 */

do_action( 'woocommerce_before_main_content' );

$product_count = wc_get_loop_prop( 'total' );
if (!$product_count) $product_count = 0;
$categories = get_terms( array( 'taxonomy' => 'product_cat', 'hide_empty' => true ) );
?>

<div class="tw-bg-white tw-min-h-screen">
    <!-- Storefront Header -->
    <section class="tw-bg-white tw-border-b tw-border-yellow-400">
        <div class="tw-max-w-screen-2xl tw-mx-auto tw-px-4 tw-py-6 lg:tw-py-12">
            <div class="tw-flex tw-items-center tw-justify-between tw-mb-6">
                <div>
                    <h1 class="tw-text-3xl md:tw-text-5xl tw-font-bold tw-text-yellow-500 tw-font-mono tw-mb-2">> SHOP</h1>
                    <p class="tw-text-gray-600 tw-font-mono tw-text-sm"><?php echo esc_html($product_count); ?> products available</p>
                </div>
                
                <!-- Desktop Stats -->
                <div class="tw-hidden lg:tw-flex tw-gap-8">
                    <div class="tw-text-right">
                        <div class="tw-text-2xl tw-font-bold tw-text-yellow-500 tw-font-mono"><?php echo esc_html($product_count); ?></div>
                        <div class="tw-text-xs tw-text-gray-500 tw-font-mono">PRODUCTS</div>
                    </div>
                    <div class="tw-text-right">
                        <div class="tw-text-2xl tw-font-bold tw-text-yellow-500 tw-font-mono">24/7</div>
                        <div class="tw-text-xs tw-text-gray-500 tw-font-mono">ONLINE</div>
                    </div>
                    <div class="tw-text-right">
                        <div class="tw-text-2xl tw-font-bold tw-text-yellow-500 tw-font-mono">100%</div>
                        <div class="tw-text-xs tw-text-gray-500 tw-font-mono">DIGITAL</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Storefront Layout -->
    <div class="tw-max-w-screen-2xl tw-mx-auto tw-px-4 tw-py-8">
        <div class="lg:tw-flex lg:tw-gap-8">
            
            <!-- Sidebar Filters -->
            <aside class="tw-w-full lg:tw-w-64 tw-mb-8 lg:tw-mb-0 tw-flex-shrink-0">
                <div class="tw-bg-gray-50 tw-border tw-border-gray-200 tw-rounded-lg tw-p-6 tw-sticky tw-top-24">
                    <h3 class="tw-text-black tw-font-mono tw-font-bold tw-mb-6 tw-text-lg">> FILTERS</h3>
                    
                    <!-- Search -->
                    <div class="tw-mb-6">
                        <h4 class="tw-text-gray-700 tw-font-mono tw-text-sm tw-mb-3 tw-uppercase">Search</h4>
                        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <input type="hidden" name="post_type" value="product" />
                            <input 
                                type="search" 
                                name="s" 
                                placeholder="Search products..."
                                class="tw-w-full tw-bg-white tw-border tw-border-gray-200 tw-text-gray-900 tw-font-mono tw-text-sm tw-rounded tw-px-3 tw-py-2 focus:tw-border-yellow-400 focus:tw-outline-none"
                            />
                        </form>
                    </div>
                    
                    <!-- Categories -->
                    <?php if (!empty($categories) && !is_wp_error($categories)): ?>
                    <div class="tw-mb-6">
                        <h4 class="tw-text-gray-700 tw-font-mono tw-text-sm tw-mb-3 tw-uppercase">Categories</h4>
                        <ul class="tw-space-y-2">
                            <li>
                                <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="tw-flex tw-items-center tw-text-gray-700 hover:tw-text-yellow-500 tw-font-mono tw-text-sm tw-transition">
                                    <span class="tw-text-yellow-500 tw-mr-2">></span> All Products
                                </a>
                            </li>
                            <?php foreach ($categories as $category): ?>
                            <li>
                                <a href="<?php echo esc_url(get_term_link($category)); ?>" class="tw-flex tw-items-center tw-text-gray-700 hover:tw-text-yellow-500 tw-font-mono tw-text-sm tw-transition">
                                    <span class="tw-text-yellow-500 tw-mr-2">></span> <?php echo esc_html($category->name); ?>
                                    <span class="tw-ml-auto tw-text-gray-400 tw-text-xs">(<?php echo $category->count; ?>)</span>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <!-- Tags -->
                    <?php 
                    $tags = get_terms( array( 'taxonomy' => 'product_tag', 'hide_empty' => true ) );
                    if (!empty($tags) && !is_wp_error($tags)): 
                    ?>
                    <div class="tw-mb-6">
                        <h4 class="tw-text-gray-700 tw-font-mono tw-text-sm tw-mb-3 tw-uppercase">Tags</h4>
                        <div class="tw-flex tw-flex-wrap tw-gap-2">
                            <?php foreach ($tags as $tag): ?>
                            <a href="<?php echo esc_url(get_term_link($tag)); ?>" class="tw-inline-block tw-px-3 tw-py-1 tw-text-xs tw-font-mono tw-bg-white tw-border tw-border-gray-200 tw-text-gray-700 hover:tw-bg-yellow-500 hover:tw-text-black hover:tw-border-yellow-500 tw-rounded-full tw-transition">
                                <?php echo esc_html($tag->name); ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </aside>

            <!-- Product Grid Area -->
            <div class="tw-flex-1">
                <!-- Sorting Bar -->
                <div class="tw-mb-6 tw-flex tw-items-center tw-justify-between tw-bg-gray-50 tw-border tw-border-gray-200 tw-rounded-lg tw-p-4">
                    <div class="tw-text-gray-700 tw-font-mono tw-text-sm">
                        Showing <span class="tw-text-yellow-500"><?php echo esc_html($product_count); ?></span> products
                    </div>
                    <div>
                        <?php woocommerce_catalog_ordering(); ?>
                    </div>
                </div>

                <!-- Products Grid -->
                <?php if ( woocommerce_product_loop() ) : ?>
                    <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 xl:tw-grid-cols-3 tw-gap-6">
                        <?php
                        if ( wc_get_loop_prop( 'total' ) ) {
                            while ( have_posts() ) {
                                the_post();
                                do_action( 'woocommerce_shop_loop' );
                                wc_get_template_part( 'content', 'product' );
                            }
                        }
                        ?>
                    </div>

                    <!-- Pagination -->
                    <div class="tw-mt-12 tw-border-t tw-border-gray-200 tw-pt-8">
                        <?php do_action( 'woocommerce_after_shop_loop' ); ?>
                    </div>
                <?php else : ?>
                    <div class="tw-bg-gray-50 tw-border tw-border-gray-200 tw-rounded-lg tw-p-12 tw-text-center">
                        <p class="tw-text-gray-700 tw-font-mono tw-text-lg tw-mb-2">// No products found</p>
                        <p class="tw-text-gray-500 tw-font-mono tw-text-sm">Check back soon for new releases</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php do_action( 'woocommerce_after_main_content' );
