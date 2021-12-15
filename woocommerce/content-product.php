<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<li class="cbg-product-wrapper">
	<?php

	$product_id = $product->get_id();
	$post_thumb = get_the_post_thumbnail_url( $product_id, 'full' );
	$link = get_permalink( $product_id );;
	?>
	<div class="cbg-product" >
			<a class="image-wrap"  href="<?php echo $link; ?>">
				<img src="<?php echo $post_thumb; ?>" class="product-image" alt="">

				<div class="image-wrap__overlay">

					<div class="okoa-product__button blue">Shop</div>

		       	</div>

			</a>
			<div class="cbg-product__meta">
				<a href="<?php echo $link; ?>"><h2 class="cbg-product__title"><?php echo $product->get_name(); ?></h2></a>

				<div class="mb-3 cbg-price">
					<?php echo $product->get_price_html(); ?>
				</div>
			</div>
	</div>

</li>

