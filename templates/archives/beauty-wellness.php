<ul class="cbg-product-list">
<li class="cbg-category-wrapper">
	<div class="cbg-category">
		<?php $category = get_term_by( 'slug', 'skin-care', 'product_cat' );
			$cat_id = $category->term_id;
			$thumbnail_id = get_woocommerce_term_meta( $cat_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
			?>
		<a class="image-wrap" href="<?php echo bloginfo('url'); ?>/shop/beauty-wellness/skin-care">
			<img src="<?php echo $image; ?>" alt="Skincare: Heal &amp; Repair" width="600" height="600" >
		</a>
		<div class="cbg-category__meta">
			<a href="<?php echo bloginfo('url'); ?>/shop/beauty-wellness/skin-care"><h2 class="cbg-category__title">Skincare: Heal &amp; Repair</h2></a>
		</div>
	</div>

</li>
<li class="cbg-category-wrapper">
	<div class="cbg-category">
	<a class="image-wrap" href="<?php echo bloginfo('url');?>/shop/beautycounter">
		<img src="<?php echo get_stylesheet_directory_uri();?>/images/store/beautycounter/beautycounter-tile.png" alt="Lifestyle Apparel &amp; Accessories" >		
	</a>
	<div class="cbg-category__meta">
		<a href="<?php echo bloginfo('url'); ?>/shop/beautycounter"><h2 class="cbg-category__title">Clean Beauty with Beautycounter Consultant Maxine Shangold</h2></a>
	</div>
</div>
</li>
</ul>