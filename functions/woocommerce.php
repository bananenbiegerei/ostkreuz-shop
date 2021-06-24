<?php // WooCommerce
// Remove all Styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Woocommerce Support Theme Overwrites
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Wrapper
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<section id="wc-container" class="grid-container">';
}

function my_theme_wrapper_end() {
    echo '</section>';
}

// Remove woocommerce_breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

// Remove Result count
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

// Remove ordering
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// Product Title in Loop
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
function woocommerce_template_loop_product_title()
{
   echo '<h2 class="font-size-h3 space-top-small">' . get_the_title() . '</h2>';
}

// Single Product
remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
remove_action('woocommerce_before_single_product','woocommerce_output_all_notices',10);

add_action('woocommerce_before_single_product','message_callout',10);
function message_callout() {
    echo '<div class="woocommerce-notices-wrapper">';
    wc_print_notices();
    echo '</div>';
}

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 999 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 80;
  return $cols;
}


// adjust default archive thumbnail size
add_filter( 'single_product_archive_thumbnail_size', function( $size ) {
return 'three-columns';
} );


// Remove billing phone (and set email field class to wide)
add_filter( 'woocommerce_billing_fields', 'remove_billing_phone_field', 20, 1 );
function remove_billing_phone_field($fields) {
    $fields ['billing_phone']['required'] = false; // To be sure "NOT required"
    //unset( $fields ['billing_phone'] ); // Remove billing phone field
    return $fields;
}

// Remove shipping phone (optional)
add_filter( 'woocommerce_shipping_fields', 'remove_shipping_phone_field', 20, 1 );
function remove_shipping_phone_field($fields) {
    $fields ['shipping_phone']['required'] = false; // To be sure "NOT required"

    unset( $fields ['shipping_phone'] ); // Remove shipping phone field
    return $fields;
}
