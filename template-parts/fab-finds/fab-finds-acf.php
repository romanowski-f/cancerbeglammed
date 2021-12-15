<div id="fab-finds-slider" class="carousel slide full-width d-flex" data-ride="carousel" data-interval="false" data-pause="hover" style="padding: 0 0 20px;">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<div class="row fab-finds-first-slide no-gutters">
			<?php /* Query */
				$fab_finds 		 	= get_field('product_list', 'options');
				$product_count   	= count($fab_finds);
				$products_per_slide = 5;
				$loop_count 		= 1;
				$slides 		    = 1;

				if( have_rows('product_list', 'options') ):
					while( have_rows('product_list', 'options') ) : the_row();
						if (!get_sub_field('not_a_post_object')) :
							$product 	= get_sub_field('product');
							$title 		= $product->post_title;
							$post_thumb = get_the_post_thumbnail_url( $product->ID, 'full' );
							$link 	 	= get_permalink( $product->ID ); 
							$price 		= wc_get_product( $product->ID );
							$price      = $price->get_price_html(); 
						else :
							$product = get_sub_field('product_other');
							if (!empty($product['link'])) :
								$title   = $product['link']['title'];
								$link 	 = $product['link']['url'];
							else :
								$title   = '';
								$link    = '';
							endif;
							$post_thumb = $product['image'];
							$price   = $product['price'];
						endif; ?>

				<div class="col-sm px-1 fab-finds-product">
					<a class="image-wrap"  href="<?php echo $link; ?>">
						<img src="<?php echo $post_thumb; ?>" class="product-image" alt="">

						<div class="image-wrap__overlay">

							<div class="fab-finds-product__button blue">Shop</div>

				       	</div>

					</a>
					<div class="fab-finds-product__meta">
						<a href="<?php echo $link; ?>"><h3 class="fab-finds-product__title"><?php echo $title; ?></h3></a>

						<div class="mb-3 fab-find-price">
							<?php echo $price; ?>
						</div>
					</div>
				</div>

				<?php /* Close carousel item */ ?>
				<?php if ( ( $loop_count ) % $products_per_slide === 0 && $loop_count != $product_count) : ?>
					     </div>
					 </div>

				     <div class="carousel-item">
				     	<div class="row no-gutters">
				   	<?php $slides++; ?>
				<?php endif; ?>

						<?php $loop_count++;
					endwhile;
				endif; ?>

			</div>
		</div>	
	</div>	

	<?php if (have_rows('product_list', 'options') && $slides > 1) : ?>

	<a class="carousel-control-prev" href="#fab-finds-slider" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#fab-finds-slider" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>

	<ol class="carousel-indicators" style="bottom: -20px">
		<?php for ($i = 0; $i < $slides; $i++) : ?>
			<?php $active = ($i == 0) ? 'active' : ''; ?>
			<li data-target="#fab-finds-slider" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
		<?php endfor; ?>
	</ol>
	<?php endif; ?>
</div>
