<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;

?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<div class="meta-tell-a-glam">
		<?php $url = get_the_permalink(); ?>
		<?php $title = get_the_title(); ?>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/tell-a-glam.svg" style="width: 144px"> <a href="mailto:?subject=Check%20out%20this%20great%20<?php echo $title; ?>%20at%20CancerBeGlamed.com&body=Check%20out%20this%20<?php echo $title; ?>%20I%20found%20on%20CancerBeGlammed.com:%20<?php echo $url; ?>" target="_blank" rel="noopener">SHARE with a friend</a>
	</div>

	<div class="questions">
		<a href="mailto:support@cancerbeglammed.com"><span>Have a question?</span> Contact Us <i class="fab fa-telegram-plane"></i></a>
	</div>

	<div class="text-center my-4">
		Items are available for domestic purchase only
	</div>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

	<?php if ($product->get_sku()) : ?>
		<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : ''; ?></span>.</span>
	<?php endif; ?>

	<?php endif; ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>