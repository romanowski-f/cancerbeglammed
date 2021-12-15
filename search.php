<?php get_header();?>

<div id="wpo-mainbody" class="container wpo-mainbody">
	<div class="row">
		<!-- MAIN CONTENT -->
		<div id="wpo-content" class="wpo-content sidebar-left col-sm-4 col-md-6 order-2 section">
			<?php  if ( have_posts() ) : ?>
                    <div class="wrapper large-padding post-area">
                    	<div class="row">
                    		<h2 class="search-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
							<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts($query_string . '&showposts=15&paged=' . $paged); ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="row">
										<div class="col-xs-4">
											<div class="post-container custom-landing-page">
												<div class="post-thumb">				
														
														<?php if (has_post_thumbnail()) { ?>
														<a href="<?php the_permalink(); ?>" title="">
															<?php the_post_thumbnail('blog-single-image');?>
														</a>
														<?php }	?>
												</div>
											</div>
										</div>
										<div class="col-xs-8">
											<div class="post-name">		
												<h4>
													<?php the_title(); ?>
												</h4></a>
												<div class="entry-content">
													<?php echo get_the_excerpt(40); ?>
												</div>
												<div class="readmore" style="padding-top:15px;">
													<a href="<?php the_permalink(); ?>" class="btn btn-custom"><?php echo 'read more'; ?></a>
												</div>
											</div>
										</div>
									</div>
									<hr>
								</article>
							<?php endwhile; ?>
						</div>
                    </div>
            <?php else : ?>
                <?php get_template_part( 'templates/none' ); ?>
            <?php endif; ?>
		</div>
		<!-- //END MAINCONTENT -->

    <?php /******************************* SIDEBAR LEFT ************************************/ ?>

        <div class="wpo-sidebar wpo-sidebar-1 col-sm-4 col-md-3 order-1">
            <div class="sidebar-inner">
                <?php dynamic_sidebar('home'); ?>
            </div>
        </div>

	<?php /******************************* END SIDEBAR LEFT *********************************/ ?>
	</div>
</div>

<?php get_footer(); ?>