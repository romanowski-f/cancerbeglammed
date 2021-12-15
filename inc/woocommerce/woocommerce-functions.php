<?php

/**
 * Change 'Cart' text
 */
function cbg_change_cart_string($translated_text, $text, $domain) {
	$translated_text = str_replace('cart', 'bag', $translated_text);
	$translated_text = str_replace('Cart', 'Bag', $translated_text);
	return $translated_text;
}
add_filter('gettext', 'cbg_change_cart_string', 100, 3);



/**
 *  Replace Add to Cart message
 */ 
function cbg_custom_added_to_cart_message( $message, $products ) {
    $count = 0;
    foreach ( $products as $product_id => $qty ) {
        $count 	+= $qty;
        $product = wc_get_product( $product_id );
        $name 	 = $product->get_name();
    }

    // Message
    if ($count == 1) { $added_text = '"' . $name . '" has been added to your bag.'; }
    else 			 { $added_text = $count . ' items have been added to your bag.'; }

    // Output success messages
    if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
        $return_to = apply_filters( 'woocommerce_continue_shopping_redirect', wc_get_raw_referer() ? wp_validate_redirect( wc_get_raw_referer(), false ) : wc_get_page_permalink( 'shop' ) );
        $message   = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( $return_to ), esc_html__( 'Continue shopping', 'woocommerce' ), esc_html( $added_text ) );
    } else {
        $message   = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( wc_get_page_permalink( 'cart' ) ), esc_html__( 'View cart', 'woocommerce' ), esc_html( $added_text ) );
    }
    return $message;
}
add_filter( 'wc_add_to_cart_message_html', 'cbg_custom_added_to_cart_message', 10, 2);



/**
 * Function to set a minimum/cap on the shipping rates.
 */
function cbg_minimum_limit_shipping_rates( $rates, $package ) {

	$methods = WC()->shipping()->get_shipping_methods();
	$shipping_limit = 13.00; // The maximum amount would be $13.00

	// Loop through all rates
	foreach ( $rates as $rate_id => $rate ) {

		// Check if the rate is higher then a certain amount
		if ( $rate->cost > $shipping_limit ) {
			$rate->cost = $shipping_limit;

			// Recalculate shipping taxes
			if ( $method = $methods[ $rate->get_method_id() ] ) {
				$taxes = WC_Tax::calc_shipping_tax( $rate->cost, WC_Tax::get_shipping_tax_rates() );
				$rate->set_taxes( $method->is_taxable() ? $taxes : array() );
			}
		}

	}

	return $rates;

}
add_filter( 'woocommerce_package_rates', 'cbg_minimum_limit_shipping_rates', 10, 2 );



/**
 *  Sizing Charts
 */ 
function product_categories($post) {
	$terms = wp_get_post_terms( $post->ID, 'product_cat' );
	//foreach ( $terms as $term ) $categories[] = $term->slug; 
	foreach ( $terms as $term ) {
		$cat = $term->slug;

		switch($cat) {
			case 'reboundwear':
			case 'eileen-eva':
			case 'heal-in-comfort':
			case 'complete-shaping':
			case 'the-brobe': 
			case 'kickit-pajamas':
				return $cat;
		}
	}
	return false;
}




/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start(); ?>

	<div class="cart-total"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></div>

	<?php
	$fragments['div.cart-total'] = ob_get_clean();
	return $fragments;
}




/**
 *  ACF Functions
 */ 
if (class_exists('ACF')) {
	require get_template_directory() . '/inc/woocommerce/woocommerce-acf.php';
}


/**
 *  Replace default attribute select inputs with buttons and icons
 */ 
require get_template_directory() . '/inc/woocommerce/product-attribute-icons.php';


/**
 *  CBG Shop Categories Widget
 */ 
require get_template_directory() . '/inc/woocommerce/widget-shop-categories.php';
require get_template_directory() . '/inc/woocommerce/product-category-banners.php';

?>