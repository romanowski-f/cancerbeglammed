<?php get_header();?>

<div id="wpo-mainbody" class="container wpo-mainbody">
	<div class="row">
		<!-- MAIN CONTENT -->
		<div id="wpo-content" class="wpo-content sidebar-left col-sm-8 col-md-9 order-2 section">
			<?php  if ( have_posts() ) : ?>
                    <div class="wrapper large-padding post-area">
                        <?php while ( have_posts() ) : the_post(); ?>
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="post-thumb">
                                <a href="<?php the_permalink(); ?>" title="">
                                    <?php the_post_thumbnail('blog-image');?>
                                </a>
                            </div>
                        <?php } ?>

                        <div class="post-name">
                            <h2 class="entry-title">
                                <?php the_title(); ?>
                            </h2>
                            <div class="entry-meta">
                                <?php
                                  $custom_author = array(
                                    'name' => get_post_meta($post->ID, 'cbg_custom_author', true),
                                    'link' => get_post_meta($post->ID, 'cbg_custom_author_link', true),
                                  );
                                ?>

                                <?php if (!empty($custom_author['name']) && !empty($custom_author['link'])) : ?>
                                <span class="author-link">By <a href="<?php echo $custom_author['link']; ?>" target="_blank"><?php echo $custom_author['name']; ?></a></span>
                                <?php elseif (!empty($custom_author['name'])) : ?>
                                <span class="author-link">By <strong><?php echo $custom_author['name']; ?></strong></span>
                                <?php else : ?>
                                <span class="author-link">By <?php the_author_posts_link(); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </div>
            <?php endif; ?>
		</div>
		<!-- //END MAINCONTENT -->
    <?php /******************************* SIDEBAR LEFT ************************************/ ?>

<!--         <div class="wpo-sidebar wpo-sidebar-1 col-sm-4 col-md-3 order-1">
            <div class="sidebar-inner">
                <?php dynamic_sidebar('home'); ?>
            </div>
        </div> -->

	<?php /******************************* END SIDEBAR LEFT *********************************/ ?>

    <?php /******************************* SIDEBAR RIGHT ************************************/ ?>

        <div class="wpo-sidebar wpo-sidebar-1 col-sm-4 col-md-3 order-3">
            <div class="sidebar-inner">
                <?php dynamic_sidebar('interior-right'); ?>
            </div>
        </div>

    <?php /******************************* END SIDEBAR RIGHT *********************************/ ?>
	</div>

<!-- <h2 class="title-section"><span>Related Posts</span></h2> -->

<?php //get_template_part('template-parts/blog-slider'); ?>

</div>

<?php get_footer(); ?>
