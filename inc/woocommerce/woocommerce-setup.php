<?php

/**
 * Remove product sorting options from shop pages
 */
function cbg_remove_product_sorting() {
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
}
add_action( 'before_woocommerce_init', 'cbg_remove_product_sorting' );


/**
 * Enqueue custom woocommerce stylesheets
 */
function cbg_custom_woocommerce_styles() {

  // Global Woocommerce styles
  wp_register_style('cbg-woocommerce-style', get_stylesheet_directory_uri() . '/assets/css/custom-woocommerce.css', array(), CBG_VERSION );
  wp_enqueue_style('cbg-woocommerce-style');

  // Only on product page
  if (is_product()) {
    wp_register_script('select-attributes', get_stylesheet_directory_uri() . '/inc/attributes.js', array(), CBG_VERSION );
    wp_enqueue_script( 'select-attributes' );
  }   

  // Only on Woocommerce pages
  if (is_woocommerce() || is_cart()) {
    wp_enqueue_style('shop-css', get_stylesheet_directory_uri() . '/assets/css/shop.css', array(), CBG_VERSION );
  }

}
add_action( 'wp_enqueue_scripts', 'cbg_custom_woocommerce_styles' );


/**
 * I'm not actually sure that this is used anywhere?
 */
function woocommerce_template_product_description() {
   woocommerce_get_template( 'single-product/tabs/description.php' );
}


/**
 * Allow duplicate SKUs
 */
add_filter( 'wc_product_has_unique_sku', '__return_false' ); 


/**
 * Remove product data tabs
 */
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );


/**
 * Rename Description tab
 */
function cbg_rename_description_product_tab_label() {
    return '<img class="d-block mr-3" src="' . get_stylesheet_directory_uri() . '/assets/images/store/lifestyle-solutions.svg" style="width: 100px">';
}
add_filter( 'woocommerce_product_description_tab_title', 'cbg_rename_description_product_tab_label' );



/**
 * Change number of products that are displayed per page (shop page)
 */
function new_loop_shop_per_page( $cols ) {
  $cols = 9;
  return $cols;
}
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );



/**
 * Change number of related products output
 */ 
function jk_related_products_args( $args ) {
  $args['posts_per_page'] = 3; // 4 related products
  $args['columns'] = 1; // arranged in 2 columns
  return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );



/**
 * Functions which enhance the theme by hooking into Woocommerce
 */
require get_template_directory() . '/inc/woocommerce/woocommerce-functions.php';

?>