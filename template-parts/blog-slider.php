<div id="blog-slider" class="carousel slide full-width d-flex" data-ride="carousel" data-interval="false" data-pause="hover" style="padding: 0 0 20px;">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<div class="row blog-first-slide no-gutters">
			<?php /* Query */
				$post_count 	= 11;
				$posts_per_item = 4;
				$cat 			= '';
				$exclude_posts  = '';
				$exclude_cat 	= array('28');
				if (is_single()) : 
					$cat = get_the_category(); 
					$cat = $cat[0]->slug; 
					$exclude_posts = array(get_the_ID());
				endif;
				$slides = 1;

				$args = array(
					'posts_per_page' 	=> $post_count, 
					'category_name'  	=> $cat,
					'post__not_in'	 	=> $exclude_posts,
					'post_status'    	=> 'publish',
					'category__not_in' 	=> $exclude_cat
				);

				$query = new WP_Query($args); 
				if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php $count = $query->current_post + 1; ?>

				<?php /* Blog post */ ?>
				<?php get_template_part('template-parts/blog-post-item'); ?>


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

			<div class="col-sm-3 px-1 d-flex justify-content-center flex-column">
			<?php $cat = get_the_category(); ?>
			<?php $category_name = $cat[0]->cat_name; ?>
			<?php $category_link = get_category_link( $cat[0]->cat_ID ); ?>
			<a href="<?php echo $category_link; ?>" class="blog-slider-read-more mx-auto"></a>
			<h5 class="mt-1 mb-3 text-center"><a href="<?php echo $category_link; ?>">Read More CBG Blogs</a></h5>				
			</div>

			<?php /* End query */ ?>
			<?php endif; ?>

			</div>
		</div>	
	</div>	

	<?php if ($query->have_posts()) : ?>
	<a class="carousel-control-prev" href="#blog-slider" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#blog-slider" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>

	<ol class="carousel-indicators" style="bottom: -20px">
		<?php for ($i = 0; $i < $slides; $i++) : ?>
			<?php $active = ($i == 0) ? 'active' : ''; ?>
			<li data-target="#blog-slider" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
		<?php endfor; ?>
	</ol>
	<?php endif; ?>
</div>
