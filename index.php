<?php get_header();?>

<div id="wpo-mainbody" class="container wpo-mainbody">
	<div class="row">
		<!-- MAIN CONTENT -->
		<div id="wpo-content" class="wpo-content sidebar-left col-md-8 col-lg-9 order-2 section">
			<?php  if ( have_posts() ) : ?>
                    <div class="wrapper large-padding post-area">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'templates/blog/blog'); ?>
                            <?php //the_content(); ?>
                        <?php endwhile; ?>
                        <?php the_posts_pagination(); ?>
                    </div>
            <?php else : ?>
                <?php //get_template_part( 'templates/none' ); ?>
            <?php endif; ?>
		</div>
		<!-- //END MAINCONTENT -->

    <?php /******************************* SIDEBAR RIGHT ************************************/ ?>

        <div class="wpo-sidebar wpo-sidebar-1 col-md-4 col-lg-3 order-3">
            <div class="sidebar-inner">
                <?php dynamic_sidebar('interior-right'); ?>
            </div>
        </div>

    <?php /******************************* END SIDEBAR RIGHT *********************************/ ?>
	</div>
</div>

<?php get_footer(); ?>
