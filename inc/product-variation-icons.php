<?php
// -------------------------------------------------------------- //
// ------------------- Single Product Page Stuff ---------------- //
// -------------------------------------------------------------- //

// Allow duplicate SKUs
add_filter( 'wc_product_has_unique_sku', '__return_false' ); 

/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );
    return $tabs;
}

add_filter( 'woocommerce_product_description_tab_title', 'cbg_rename_description_product_tab_label' );

function cbg_rename_description_product_tab_label() {
    return '<img class="d-block mr-3" src="' . get_stylesheet_directory_uri() . '/assets/images/store/lifestyle-solutions.svg" style="width: 100px">';
}

// Change 'Cart' text
add_filter('gettext', 'gb_change_cart_string', 100, 3);
function gb_change_cart_string($translated_text, $text, $domain) {
	$translated_text = str_replace('cart', 'bag', $translated_text);
	$translated_text = str_replace('Cart', 'Bag', $translated_text);
	return $translated_text;
}

/**
 *  Replace Add to Cart message
 */
 
add_filter( 'wc_add_to_cart_message_html', 'cbg_custom_added_to_cart_message', 10, 2);
 
function cbg_custom_added_to_cart_message( $message, $products ) {
    $count = 0;
    foreach ( $products as $product_id => $qty ) {
        $count += $qty;
        $product = wc_get_product( $product_id );
        $name = $product->get_name();
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

// CSS Hierarchy
add_action( 'wp_enqueue_scripts', 'cbg_custom_woocmmerce_styles' );

/**
 * Add stylesheet to the page
 */
function cbg_custom_woocmmerce_styles() {
	wp_register_style(
		'cbg-woocommerce-style',
		get_stylesheet_directory_uri() . '/css/custom-woocommerce.css',
		array( ),
		'1.0.71'
	);

	wp_register_script(
		'select-attributes',
		get_stylesheet_directory_uri() . '/inc/attributes.js',
		array(),
		'1.0.06'
	);

	if (is_product()) {
		wp_enqueue_script( 'select-attributes' );
	}		


	if (is_page_template('templates/shop-home.php') || is_woocommerce() || is_cart()) {


		wp_enqueue_style('shop-css', get_stylesheet_directory_uri() . '/css/shop.css', array(), '1.0.15');
	}

	wp_enqueue_style('cbg-woocommerce-style');
}


/**
 * Radio Buttons for Variations
 */
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'cbg_variation_radio_buttons', 10, 2);

function cbg_variation_radio_buttons($html, $args) { ?>
	<?php global $product; ?>

	<?php
	if ( ! empty( $args['options'] ) ) :
		if ( $product && taxonomy_exists( $args['attribute'] ) ) :
			// Get terms if this is a taxonomy - ordered. We need the names too.
			$terms  = wc_get_product_terms(
				$product->get_id(),
				$args['attribute'],
				array(
					'fields' => 'all',
				)
			);

			foreach ($terms as $term) :
				 if ( in_array( $term->slug, $args['options'], true ) ) :
				 	$style = '';
					if ($term->taxonomy == 'pa_color') :
						$bg = get_field( 'icon_color', 'term_' . $term->term_id );
						$style = 'style="background-color: ' . $bg . '"';

						if (get_field('icon_pattern', 'term_' . $term->term_id)) {
							$bg = get_field('icon_pattern', 'term_' . $term->term_id);
							$style = 'style="background: url(\'' . $bg . '\'); background-size: cover"';
						}

					endif;

				 	?>

					<li class="<?php echo $term->taxonomy; ?>">
						<input type="radio" class="attribute-radio-button" value="<?php echo $term->slug; ?>" name="<?php echo 'attribute_'.$term->taxonomy; ?>" id="<?php echo $term->slug; ?>">
						<label class="attribute-icon <?php echo $term->taxonomy; ?>" for="<?php echo $term->slug; ?>">
							<div
								class="attribute-check attribute-icon-bg <?php echo $term->slug; ?> d-flex align-items-center justify-content-center"
								<?php echo $style; ?>
							>
								<span class="attribute-name" data-name="<?php echo $term->name; ?>"><?php echo $term->name; ?></span>
							</div>
						</label>
					</li>

				<?php
				endif;
			endforeach;


		else :
			foreach ( $args['options'] as $option ) :
				// if (sanitize_title($args['attribute']) == 'color') : 	$class = 'color';
				// else :											 		$class = 'default';
				// endif;
				$class = 'default';
				?>

					<li class="<?php echo $class; ?>">
						<input type="radio" class="attribute-radio-button" value="<?php echo $option; ?>" name="<?php echo 'attribute_'.sanitize_title($args['attribute']); ?>" id="<?php echo $option; ?>">
						<label class="attribute-icon <?php echo $class; ?>" for="<?php echo $option; ?>">
							<div class="attribute-check attribute-icon-bg d-flex align-items-center justify-content-center">
								<span class="attribute-name">
									<?php echo esc_html( apply_filters( 'woocommerce_variation_option_name', $option, null, $args['attribute'], $product ) ); ?>
								</span>
							</div>
						</label>
					</li>
			<?php
			endforeach;
		endif;
	endif;

	return $html;
}



/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 9;
  return $cols;
}


/**
 * Remove related products output
 */
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
/**
 * Change number of related products output
 */ 

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 1; // arranged in 2 columns
	return $args;
}


// -------------------------------------------------------------- //
// ------------------------ Sizing Charts ----------------------- //
// -------------------------------------------------------------- //
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
	//return $categories;
}


// Adds a custom rule type.
add_filter( 'acf/location/rule_types', function( $choices ){
    $choices[ __("Other",'acf') ]['wc_prod_attr'] = 'WC Product Attribute';
    return $choices;
} );

// Adds custom rule values.
add_filter( 'acf/location/rule_values/wc_prod_attr', function( $choices ){
    foreach ( wc_get_attribute_taxonomies() as $attr ) {
        $pa_name = wc_attribute_taxonomy_name( $attr->attribute_name );
        $choices[ $pa_name ] = $attr->attribute_label;
    }
    return $choices;
} );

// Matching the custom rule.
add_filter( 'acf/location/rule_match/wc_prod_attr', function( $match, $rule, $options ){
    if ( isset( $options['taxonomy'] ) ) {
        if ( '==' === $rule['operator'] ) {
            $match = $rule['value'] === $options['taxonomy'];
        } elseif ( '!=' === $rule['operator'] ) {
            $match = $rule['value'] !== $options['taxonomy'];
        }
    }
    return $match;
}, 10, 3 );




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
 * Function to set a minimum/cap on the shipping rates.
 */
function my_minimum_limit_shipping_rates_function( $rates, $package ) {

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
add_filter( 'woocommerce_package_rates', 'my_minimum_limit_shipping_rates_function', 10, 2 );



// -------------------------------------------------------------- //
// ----------------- CBG Shop Categories Widget ----------------- //
// -------------------------------------------------------------- //

include(get_stylesheet_directory() . '/inc/widget-shop-categories.php');



include(get_stylesheet_directory() . '/inc/category-banners.php');

?>