<?php get_header();?>

<?php 
$col_num = 0;

if (get_field('display_sidebar'))       : $col_num++; endif;
if (get_field('display_sidebar_right')) : $col_num++; endif;

switch($col_num) {
    case 0: $columns = 'col';                       break;
    case 1: $columns = 'col-sm-8 col-md-9 order-2'; break;
    case 2: $columns = 'col-sm-4 col-md-6 order-2'; break;
}

?>

<div id="wpo-mainbody" class="container wpo-mainbody">
	<div class="row">
		<!-- MAIN CONTENT -->
		<div id="wpo-content" class="wpo-content sidebar-left <?php echo $columns; ?> section">
			<?php  if ( have_posts() ) : ?>
                    <div class="wrapper large-padding post-area">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php //get_template_part( 'templates/blog/blog'); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </div>
            <?php else : ?>
                <?php //get_template_part( 'templates/none' ); ?>
            <?php endif; ?>
		</div>
		<!-- //END MAINCONTENT -->
    <?php /******************************* SIDEBAR LEFT ************************************/ ?>
    <?php if (get_field('display_sidebar')) : ?>
        <div class="wpo-sidebar wpo-sidebar-1 col-sm-4 col-md-3 d-none d-md-block order-1">
            <div class="sidebar-inner">
                <?php dynamic_sidebar('home'); ?>
            </div>
        </div>
    <?php endif; ?>
	<?php /******************************* END SIDEBAR LEFT *********************************/ ?>

    <?php /******************************* SIDEBAR RIGHT ************************************/ ?>
    <?php if (get_field('display_sidebar_right')) : ?>
        <div class="wpo-sidebar wpo-sidebar-1 col-sm-4 col-md-3 d-none d-sm-block order-3">
            <div class="sidebar-inner">
                <?php dynamic_sidebar('interior-right'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php /******************************* END SIDEBAR RIGHT *********************************/ ?>
	</div>
</div>

<?php get_footer(); ?>
