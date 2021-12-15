<div id="fab-finds-slider" class="carousel slide full-width d-flex" data-ride="carousel" data-interval="false" data-pause="hover" style="padding: 0 0 20px;">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<div class="row fab-finds-first-slide no-gutters">
			<?php /* Query */
				$post_count 	= 10;
				$posts_per_item = 5;
				$cat 			= ''; // Change to Fab Finds eventually
				if (term_exists('fab-finds', 'category')) : $cat = 'fab-finds'; endif;
				$exclude_posts  = '';
				$slides = 1;

				$args = array(
					'post_type' 	 => 'product',
					'posts_per_page' => $post_count, 
					'product_cat'  => $cat,
					'post__not_in'	 => $exclude_posts,
					'post_status'    => 'publish'
				);

				$query = new WP_Query($args); 
				if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php $count = $query->current_post + 1; ?>

				<?php /* Product */ ?>
				<?php
					$product 	= wc_get_product( $post->ID );
					$post_thumb = get_the_post_thumbnail_url( $post->ID, 'full' );
					$link 	 	= get_permalink( $post->ID );
				?>
				<div class="col-sm px-1 fab-finds-product">
					<a class="image-wrap"  href="<?php echo $link; ?>">
						<img src="<?php echo $post_thumb; ?>" class="product-image" alt="">

						<div class="image-wrap__overlay">

							<div class="fab-finds-product__button blue">Shop</div>

				       	</div>

					</a>
					<div class="fab-finds-product__meta">
						<a href="<?php echo $link; ?>"><h3 class="fab-finds-product__title"><?php the_title(); ?></h3></a>

						<div class="mb-3 fab-find-price">
							<?php echo $product->get_price_html(); ?>
						</div>
					</div>
				</div>


				<?php /* Close carousel item */ ?>
				<?php if ( ( $count ) % $posts_per_item === 0 && $count != $post_count) : ?>
					     </div>
					 </div>

				     <div class="carousel-item">
				     	<div class="row no-gutters">
				   	<?php $slides++; ?>
				<?php endif; ?>

			<?php /* End loop */ ?>
			<?php endwhile; ?> 


			<?php /* End query */ ?>
			<?php endif; ?>

			</div>
		</div>	
	</div>	

	<?php if ($query->have_posts()) : ?>
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
