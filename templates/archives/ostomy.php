<ul class="cbg-product-list">
<li class="cbg-product-wrapper square">
	<div class="cbg-product">
		<?php $product = wc_get_product( 6192 ); ?>
		<?php 
			$image = wp_get_attachment_url( $product->get_image_id() );
			?>
		<a class="image-wrap" href="<?php echo bloginfo('url'); ?>/product/convatec-ostomy-product-and-lifestyle-solutions">
			<img src="<?php echo $image; ?>">
		</a>
		<div class="cbg-product__meta">
			<a href="<?php echo bloginfo('url'); ?>/product/convatec-ostomy-product-and-lifestyle-solutions"><h2 class="cbg-product__title">me+™ Style From ConvaTec</h2></a>
		</div>
	</div>

</li>
</ul>