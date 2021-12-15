<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<li class="cbg-category-wrapper">
	<?php
	$link = get_term_link( $category, 'product_cat' );
	?>
	<div class="cbg-category" >
		<a class="image-wrap"  href="<?php echo $link; ?>">
			<?php woocommerce_subcategory_thumbnail($category); ?>
		</a>
		<div class="cbg-category__meta">
			<a href="<?php echo $link; ?>"><h2 class="cbg-category__title"><?php echo $category->name; ?></h2></a>
		</div>
	</div>

</li>
