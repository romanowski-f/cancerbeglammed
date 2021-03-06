<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit; 



get_header('shop');

if (is_shop()) : 
	
	include(get_stylesheet_directory() . '/templates/archives/life-style.php');

elseif (is_product_category('gift-her')):

	include(get_stylesheet_directory() . '/templates/archives/gift-her.php');

else:


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<div class="row">
<section id="wpo-main-content" class="order-2 col-sm-8 col-md-9 clearfix">
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<!-- <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1> -->
	<?php 
		$category = get_queried_object();
		$category = $category->slug;
		$banner = get_category_banner($category); 
		echo $banner;
		?>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>

<?php 
if (is_product_category('your-breast-life-reimagined')) :
	include(get_stylesheet_directory() . '/templates/archives/breast-life.php');
elseif (is_product_category('expert-fit-with-anaono')):
	include(get_stylesheet_directory() . '/templates/archives/anaono.php');
elseif (is_product_category('beauty-wellness')):
	include(get_stylesheet_directory() . '/templates/archives/beauty-wellness.php');
elseif (is_product_category('beautycounter')):
	include(get_stylesheet_directory() . '/templates/archives/beauty-counter.php');
//elseif (is_product_category('ostomy-life-style-solutions')):
//	include(get_stylesheet_directory() . '/templates/archives/ostomy.php');
else:

if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );



		woocommerce_product_loop_start();

		if ( wc_get_loop_prop( 'total' ) ) {
			while ( have_posts() ) {
				the_post();

				/**
				 * Hook: woocommerce_shop_loop.
				 */
				do_action( 'woocommerce_shop_loop' );

				wc_get_template_part( 'content', 'product' );
			}
		}

		woocommerce_product_loop_end();


	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

endif;

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action( 'woocommerce_after_main_content' );

?>

</section>

<?php

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */

    /******************************* SIDEBAR LEFT ************************************/ 
?>
        <div class="wpo-sidebar wpo-sidebar-1 col-sm-4 col-md-3 order-2 order-sm-1">
            <div class="sidebar-inner">
                <?php dynamic_sidebar('shop'); ?>
            </div>
        </div>
<?php
    /******************************* END SIDEBAR LEFT *********************************/ 
?>

</div>
<?php endif; // is_shop()
get_footer( 'shop' );
