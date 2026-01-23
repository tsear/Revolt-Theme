<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 */

defined( 'ABSPATH' ) || exit;

global $product;

do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form();
    return;
}

$gallery_images = $product->get_gallery_image_ids();
$featured_image = $product->get_image_id();
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'tw-bg-white tw-pt-24 tw-min-h-screen', $product ); ?>>
    
    <div class="tw-max-w-screen-xl tw-mx-auto tw-px-4 tw-py-8">
        
        <!-- Product Overview Grid -->
        <div class="tw-grid tw-gap-8 lg:tw-grid-cols-2 tw-mb-12">
            
            <!-- Image Gallery -->
            <div class="tw-space-y-4">
                <?php if ( $featured_image ) : 
                    $featured_url = wp_get_attachment_image_url( $featured_image, 'full' );
                ?>
                <!-- Main Image -->
                <div>
                    <img class="tw-h-auto tw-max-w-full tw-rounded-lg tw-border tw-border-gray-200" 
                         src="<?php echo esc_url( $featured_url ); ?>" 
                         alt="<?php echo esc_attr( $product->get_name() ); ?>">
                </div>
                <?php endif; ?>

                <?php if ( ! empty( $gallery_images ) ) : ?>
                <!-- Gallery Grid -->
                <div class="tw-grid tw-grid-cols-5 tw-gap-4">
                    <?php 
                    // Show featured image thumbnail first
                    if ( $featured_image ) :
                        $thumb_url = wp_get_attachment_image_url( $featured_image, 'thumbnail' );
                    ?>
                    <div>
                        <img class="tw-h-auto tw-max-w-full tw-rounded-lg tw-cursor-pointer hover:tw-opacity-75 tw-transition-opacity tw-border tw-border-gray-200" 
                             src="<?php echo esc_url( $thumb_url ); ?>" 
                             alt="<?php echo esc_attr( $product->get_name() ); ?>">
                    </div>
                    <?php endif; ?>
                    
                    <?php foreach ( array_slice( $gallery_images, 0, 4 ) as $gallery_id ) : 
                        $gallery_url = wp_get_attachment_image_url( $gallery_id, 'thumbnail' );
                    ?>
                    <div>
                        <img class="tw-h-auto tw-max-w-full tw-rounded-lg tw-cursor-pointer hover:tw-opacity-75 tw-transition-opacity tw-border tw-border-gray-200" 
                             src="<?php echo esc_url( $gallery_url ); ?>" 
                             alt="<?php echo esc_attr( $product->get_name() ); ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- Product Info -->
            <div class="tw-space-y-6">
                
                <!-- Breadcrumb -->
                <nav class="tw-flex tw-text-sm tw-text-gray-500" aria-label="Breadcrumb">
                    <ol class="tw-inline-flex tw-items-center tw-space-x-1 md:tw-space-x-3">
                        <li>
                            <a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" class="hover:tw-text-yellow-500">Shop</a>
                        </li>
                        <?php 
                        $categories = get_the_terms( $product->get_id(), 'product_cat' );
                        if ( $categories && ! is_wp_error( $categories ) ) :
                            $main_cat = array_shift( $categories );
                        ?>
                        <li>
                            <span class="tw-mx-2">/</span>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( get_term_link( $main_cat ) ); ?>" class="hover:tw-text-yellow-500"><?php echo esc_html( $main_cat->name ); ?></a>
                        </li>
                        <?php endif; ?>
                    </ol>
                </nav>

                <!-- Product Title -->
                <h1 class="tw-text-3xl tw-font-bold tw-text-gray-900"><?php echo esc_html( $product->get_name() ); ?></h1>

                <!-- Rating & Reviews -->
                <?php if ( $product->get_average_rating() > 0 ) : ?>
                <div class="tw-flex tw-items-center tw-space-x-2">
                    <div class="tw-flex tw-items-center">
                        <?php 
                        $rating = $product->get_average_rating();
                        for ( $i = 1; $i <= 5; $i++ ) : 
                            if ( $i <= floor($rating) ) :
                        ?>
                        <svg class="tw-w-5 tw-h-5 tw-text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                        </svg>
                        <?php else : ?>
                        <svg class="tw-w-5 tw-h-5 tw-text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                        </svg>
                        <?php endif; endfor; ?>
                    </div>
                    <span class="tw-text-sm tw-font-medium tw-text-gray-900"><?php echo esc_html( $rating ); ?> out of 5</span>
                    <span class="tw-text-sm tw-text-gray-500">(<?php echo esc_html( $product->get_review_count() ); ?> reviews)</span>
                </div>
                <?php endif; ?>

                <!-- Price -->
                <div class="tw-text-4xl tw-font-bold tw-text-gray-900">
                    <?php if ( $product->is_on_sale() && $product->get_regular_price() != $product->get_sale_price() ) : ?>
                        <div class="tw-flex tw-items-baseline tw-space-x-3">
                            <span class="tw-text-gray-900"><?php echo wc_price( $product->get_sale_price() ); ?></span>
                            <span class="tw-text-2xl tw-text-gray-500 tw-line-through"><?php echo wc_price( $product->get_regular_price() ); ?></span>
                        </div>
                    <?php else : ?>
                        <?php echo wc_price( $product->get_price() ); ?>
                    <?php endif; ?>
                </div>

                <!-- Stock Status -->
                <div>
                    <?php if ( $product->is_in_stock() ) : ?>
                        <span class="tw-inline-flex tw-items-center tw-px-3 tw-py-1 tw-text-sm tw-font-medium tw-text-green-800 tw-bg-green-100 tw-rounded-lg">
                            <svg class="tw-w-4 tw-h-4 tw-mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                            </svg>
                            In Stock
                        </span>
                    <?php else : ?>
                        <span class="tw-inline-flex tw-items-center tw-px-3 tw-py-1 tw-text-sm tw-font-medium tw-text-red-800 tw-bg-red-100 tw-rounded-lg">Out of Stock</span>
                    <?php endif; ?>
                </div>

                <!-- Short Description -->
                <div class="tw-prose tw-prose-sm tw-text-gray-700">
                    <?php echo wpautop( $product->get_short_description() ); ?>
                </div>

                <!-- Add to Cart Form -->
                <div class="tw-border-t tw-border-gray-200 tw-pt-6">
                    <?php woocommerce_template_single_add_to_cart(); ?>
                </div>

                <!-- Product Meta -->
                <div class="tw-border-t tw-border-gray-200 tw-pt-6 tw-space-y-2 tw-text-sm">
                    <?php if ( $product->get_sku() ) : ?>
                    <div class="tw-flex">
                        <span class="tw-font-medium tw-text-gray-900 tw-w-24">SKU:</span>
                        <span class="tw-text-gray-700"><?php echo esc_html( $product->get_sku() ); ?></span>
                    </div>
                    <?php endif; ?>
                    
                    <?php 
                    $categories = get_the_terms( $product->get_id(), 'product_cat' );
                    if ( $categories && ! is_wp_error( $categories ) ) :
                    ?>
                    <div class="tw-flex">
                        <span class="tw-font-medium tw-text-gray-900 tw-w-24">Category:</span>
                        <span class="tw-text-gray-700">
                            <?php 
                            $cat_links = array();
                            foreach ( $categories as $cat ) {
                                $cat_links[] = '<a href="' . esc_url( get_term_link( $cat ) ) . '" class="hover:tw-text-yellow-500 hover:tw-underline">' . esc_html( $cat->name ) . '</a>';
                            }
                            echo implode( ', ', $cat_links ); 
                            ?>
                        </span>
                    </div>
                    <?php endif; ?>

                    <?php 
                    $tags = get_the_terms( $product->get_id(), 'product_tag' );
                    if ( $tags && ! is_wp_error( $tags ) ) :
                    ?>
                    <div class="tw-flex">
                        <span class="tw-font-medium tw-text-gray-900 tw-w-24">Tags:</span>
                        <span class="tw-text-gray-700">
                            <?php 
                            $tag_links = array();
                            foreach ( $tags as $tag ) {
                                $tag_links[] = '<a href="' . esc_url( get_term_link( $tag ) ) . '" class="hover:tw-text-yellow-500 hover:tw-underline">' . esc_html( $tag->name ) . '</a>';
                            }
                            echo implode( ', ', $tag_links ); 
                            ?>
                        </span>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <!-- Tabs Section -->
        <div class="tw-border-b tw-border-gray-200 tw-mb-8">
            <ul class="tw-flex tw-flex-wrap tw--mb-px tw-text-sm tw-font-medium tw-text-center tw-text-gray-500" role="tablist">
                <li class="tw-me-2" role="presentation">
                    <button class="tw-inline-block tw-p-4 tw-border-b-2 tw-border-yellow-500 tw-text-yellow-500 tw-rounded-t-lg active" 
                            id="description-tab" 
                            type="button" 
                            role="tab" 
                            aria-controls="description" 
                            aria-selected="true">
                        Description
                    </button>
                </li>
                <li class="tw-me-2" role="presentation">
                    <button class="tw-inline-block tw-p-4 tw-border-b-2 tw-border-transparent tw-rounded-t-lg hover:tw-text-gray-700 hover:tw-border-gray-300" 
                            id="additional-tab" 
                            type="button" 
                            role="tab" 
                            aria-controls="additional" 
                            aria-selected="false">
                        Additional Info
                    </button>
                </li>
                <?php if ( $product->get_review_count() > 0 ) : ?>
                <li class="tw-me-2" role="presentation">
                    <button class="tw-inline-block tw-p-4 tw-border-b-2 tw-border-transparent tw-rounded-t-lg hover:tw-text-gray-700 hover:tw-border-gray-300" 
                            id="reviews-tab" 
                            type="button" 
                            role="tab" 
                            aria-controls="reviews" 
                            aria-selected="false">
                        Reviews (<?php echo esc_html( $product->get_review_count() ); ?>)
                    </button>
                </li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Tab Panels -->
        <div id="tab-content">
            
            <!-- Description Panel -->
            <div class="tw-p-6 tw-bg-gray-50 tw-rounded-lg" id="description" role="tabpanel" aria-labelledby="description-tab">
                <div class="tw-prose tw-prose-gray tw-max-w-none">
                    <?php the_content(); ?>
                </div>
            </div>

            <!-- Additional Info Panel -->
            <div class="tw-hidden tw-p-6 tw-bg-gray-50 tw-rounded-lg" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                <?php 
                $attributes = $product->get_attributes();
                if ( ! empty( $attributes ) ) : 
                ?>
                <div class="tw-relative tw-overflow-x-auto">
                    <table class="tw-w-full tw-text-sm tw-text-left tw-text-gray-700">
                        <tbody>
                            <?php foreach ( $attributes as $attribute ) : 
                                if ( $attribute->is_taxonomy() ) {
                                    $values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'names' ) );
                                    $value = implode( ', ', $values );
                                } else {
                                    $value = $attribute->get_options();
                                    $value = is_array( $value ) ? implode( ', ', $value ) : $value;
                                }
                            ?>
                            <tr class="tw-bg-white tw-border-b">
                                <th scope="row" class="tw-px-6 tw-py-4 tw-font-medium tw-text-gray-900 tw-whitespace-nowrap tw-w-1/3">
                                    <?php echo wc_attribute_label( $attribute->get_name() ); ?>
                                </th>
                                <td class="tw-px-6 tw-py-4">
                                    <?php echo esc_html( $value ); ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php else : ?>
                <p class="tw-text-gray-500">No additional information available.</p>
                <?php endif; ?>
            </div>

            <!-- Reviews Panel -->
            <?php if ( $product->get_review_count() > 0 ) : ?>
            <div class="tw-hidden tw-p-6 tw-bg-gray-50 tw-rounded-lg" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <?php comments_template(); ?>
            </div>
            <?php endif; ?>

        </div>

        <!-- Related Products -->
        <?php 
        $related_ids = wc_get_related_products( $product->get_id(), 4 );
        if ( ! empty( $related_ids ) ) :
        ?>
        <div class="tw-mt-16 tw-border-t tw-border-gray-200 tw-pt-12">
            <h2 class="tw-text-2xl tw-font-bold tw-text-gray-900 tw-mb-8">Related Products</h2>
            <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 lg:tw-grid-cols-4 tw-gap-6">
                <?php foreach ( $related_ids as $related_id ) : 
                    $related_product = wc_get_product( $related_id );
                    if ( ! $related_product ) continue;
                ?>
                <a href="<?php echo esc_url( get_permalink( $related_id ) ); ?>" class="tw-group">
                    <div class="tw-bg-white tw-border tw-border-gray-200 tw-rounded-lg tw-p-4 hover:tw-shadow-md tw-transition-shadow">
                        <?php if ( $related_product->get_image_id() ) : ?>
                        <img class="tw-rounded-lg tw-mb-4" 
                             src="<?php echo esc_url( wp_get_attachment_image_url( $related_product->get_image_id(), 'medium' ) ); ?>" 
                             alt="<?php echo esc_attr( $related_product->get_name() ); ?>">
                        <?php endif; ?>
                        <h3 class="tw-text-base tw-font-semibold tw-text-gray-900 tw-mb-2 group-hover:tw-text-yellow-500">
                            <?php echo esc_html( $related_product->get_name() ); ?>
                        </h3>
                        <p class="tw-text-lg tw-font-bold tw-text-gray-900">
                            <?php echo wp_kses_post( $related_product->get_price_html() ); ?>
                        </p>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
