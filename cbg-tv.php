<?php
/*
Template Name: CBG TV Page Template
*/

?>

<?php get_header(); ?>

<div id="wpo-mainbody" class="container wpo-mainbody">
	<div class="row">
		<!-- MAIN CONTENT -->
		<div id="wpo-content" class="wpo-content col-sm-4 col-md-6 order-2 section">
				<div class="row">
					<!-- The Loop -->
					<?php while(have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="post-container custom-landing-page">
							<div class="post-name">
								<h2 class="entry-title"><?php the_title(); ?></h2>

								<?php the_content(); ?>
							</div>
						</div>

					</article>
					<?php endwhile; ?>
				</div>


				<div class="row custom-landing-page-img">
					<h2 class="title-section"><span style="color:#d884b5;font-weight:bold;">WATCH MORE</span></h2>
					<a href="https://www.youtube.com/channel/UCLGHhbTCcYGrED__CkpUHqg">
					<img src="<?php echo bloginfo('url');?>/wp-content/uploads/2015/01/watch-on-youtube.jpg">
					</a>
				</div>
		</div>
                <!-- //MAIN CONTENT -->
    <?php /******************************* SIDEBAR LEFT ************************************/ ?>
    <?php if (get_field('display_sidebar')) : ?>
        <div class="wpo-sidebar wpo-sidebar-1 col-sm-4 col-md-3 d-none d-sm-block order-1">
            <div class="sidebar-inner">
                <?php dynamic_sidebar('home'); ?>
            </div>
        </div>
    <?php endif; ?>
	<?php /******************************* END SIDEBAR LEFT *********************************/ ?>

    <?php /******************************* SIDEBAR RIGHT ************************************/ ?>
    <?php if (get_field('display_sidebar_right')) : ?>
        <div class="wpo-sidebar wpo-sidebar-1 col-md-4 col-lg-3 order-3">
            <div class="sidebar-inner">
                <?php dynamic_sidebar('interior-right'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php /******************************* END SIDEBAR RIGHT *********************************/ ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>