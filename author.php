<?php get_header(); ?>


        <div id="wpo-mainbody" class="container wpo-mainbody">
            <div class="row">
                <!-- MAIN CONTENT -->
                <div class="col-sm-12 cat-top clearfix">
                    <h1 class="name-cat">
                        <?php single_cat_title();?>
                    </h1><!--End.Name-Category-->

                </div><!--END.Title Category-->
                <div id="wpo-content" class="wpo-content sidebar-left col order-2">
                	<div class="row cbg-author-archive">
							 <?php
							$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
							?>
							<h1><?php echo $curauth->display_name; ?></h1>
							<div class="cbg-author-archive col-sm-4">
								<?php //echo get_simple_local_avatar( get_the_author_meta( 'user_email' ),200 ); ?>
							</div>
							<div class="cbg-author-archive col-sm-8">
								<p><?php echo $curauth->user_description; ?></p>
							</div>
 					</div>

                    <?php  if ( have_posts() ) : ?>
                            <div class="cat-area">
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <?php get_template_part( 'templates/blog/blog'); ?>
                                <?php endwhile; ?>
                            </div>
                            <?php //wpo_pagination($prev = '<i class="fa fa-long-arrow-left"></i> '.__('Prev',TEXTDOMAIN), $next = __('Next',TEXTDOMAIN).' <i class="fa fa-long-arrow-right"></i>'); ?>
                    <?php else : ?>
                        <?php get_template_part( 'templates/none' ); ?>
                    <?php endif; ?>
                </div>
                <!-- //MAIN CONTENT -->
    <?php /******************************* SIDEBAR LEFT ************************************/ ?>

        <div class="wpo-sidebar wpo-sidebar-1 d-none d-lg-block col-lg-3 order-1">
            <div class="sidebar-inner">
                <?php dynamic_sidebar('home'); ?>
            </div>
        </div>

    <?php /******************************* END SIDEBAR LEFT *********************************/ ?>

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