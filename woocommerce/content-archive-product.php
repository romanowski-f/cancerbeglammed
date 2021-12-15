<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>  
    <?php do_action( 'woocommerce_archive_description' ); ?> 
    		
    <?php if ( have_posts() ) : ?>
        <?php woocommerce_show_messages(); ?>

        <?php woocommerce_product_loop_start(); ?>
		


        <?php woocommerce_product_subcategories(); ?>
        
        </ul>
        
        <ul class="products">
        
        <?php
        if (isset($_COOKIE['wpo_cookie_layout']) && $_COOKIE['wpo_cookie_layout']=='list') {
            $layout = 'product';
        }else{
            $layout = 'product';
        }
        ?>
        
        <?php while ( have_posts() ) : the_post(); ?>
            <?php
            wc_get_template_part( 'content', $layout );
            ?>
        <?php endwhile; // end of the loop. ?>

        <?php woocommerce_product_loop_end(); ?>

        <?php
        /**
         * woocommerce_after_shop_loop hook
         *
         * @hooked woocommerce_pagination - 10
         */

        add_action( 'woocommerce_after_shop_loop','woocommerce_result_count' ,20);
        do_action( 'woocommerce_after_shop_loop' );
        ?>

    <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

        <?php wc_get_template( 'loop/no-products-found.php' ); ?>

    <?php endif; ?>

