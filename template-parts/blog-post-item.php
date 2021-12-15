<div class="col-sm-3 px-1">
<?php /* Thumbnail */
	if (has_post_thumbnail()) : $bg = get_the_post_thumbnail_url(); 
	else :                      $bg = get_template_directory_uri() . '/assets/images/header/simple-logo.jpg';
	endif;  ?>
<a href="<?php echo get_the_permalink(); ?>" class="blog-slider-thumbnail-wrap"><div class="blog-slider-thumbnail" style="background:url('<?php echo $bg; ?>') center no-repeat; background-size: cover;"></div></a>
<?php $cat = get_the_category(); ?>
<?php $category_name = $cat[0]->cat_name; ?>
<?php $category_link = get_category_link( $cat[0]->cat_ID ); ?>
<p class="small mt-3 mb-0"><a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a></p>
<h5 class="mt-1 mb-2"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>				
<p><?php echo excerpt(25); ?></p>
<a class="read-more-button" href="<?php echo get_the_permalink(); ?>">Read More</a>
</div>