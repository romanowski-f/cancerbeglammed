<?php
/*
Template Name: Display Authors
*/

// Get Page Config
$config = $wpo->getPageConfig();

// Meta Configuration
$meta_template = get_post_meta($post->ID, 'wpo_template', TRUE);
if(!isset($meta_template['count'])) $meta_template['count']=-1;
if(is_front_page()) {
	$paged = (get_query_var('page')) ? get_query_var('page') : 1;
} else {
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}
$args = array(
	'post_type' => 'post',
	'paged' => $paged,
	'posts_per_page'=>$meta_template['count']
);
$blog = new WP_Query($args);

// Get all users order by amount of posts
$allUsers = get_users('orderby=post_count&order=DESC&exclude=4,11');

$users = array();

// Remove subscribers from the list as they won't write any articles
foreach($allUsers as $currentUser)
{
	if(!in_array( 'subscriber', $currentUser->roles ))
	{
		$users[] = $currentUser;
	}
}

?>

<?php get_header();?>

<?php
	// Show Breadcumb
	if($config['breadcrumb']){
		wpo_breadcrumb();
	}
?>

    <div class="wpo-main">
        <div id="wpo-mainbody" class="container category-blogs wpo-mainbody <?php echo $config['container']; ?>">
            <div class="row">
	
                <!-- MAIN CONTENT -->

				<div id="wpo-content" class="wpo-content <?php echo $config['main']['class']; ?> clearfix">
					
					<?php foreach($users as $user) { ?>
                	<div class="row cbg-author-archive">
						<h1><?php echo $user->display_name; ?></h1>
						<div class="cbg-author-archive col-sm-4">
							<?php echo get_simple_local_avatar( $user->user_email, '200' ); ?>
						</div>
						<div class="cbg-author-archive col-sm-8">
							<p><?php echo get_user_meta($user->ID, 'description', true); ?></p>
							<a href="<?php echo get_author_posts_url( $user->ID ); ?>">
							<?php echo __( 'See all articles by', TEXTDOMAIN ); ?>
							<?php echo $user->display_name; ?>
							</a>
						</div>
 					</div>
					<?php } ?>
					
                </div>

                <!-- //MAIN CONTENT -->
                
                <?php /******************************* SIDEBAR LEFT ************************************/ ?>
                <?php if($config['left-sidebar']['show']){ ?>
                    <div class="wpo-sidebar wpo-sidebar-1 <?php echo $config['left-sidebar']['class']; ?>">
                        <?php if(is_active_sidebar(of_get_option('left-sidebar'))): ?>
                            <div class="sidebar-inner">
                                <?php dynamic_sidebar(of_get_option('left-sidebar')); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php } ?>
                <?php /******************************* END SIDEBAR LEFT *********************************/ ?>

                <?php /******************************* SIDEBAR RIGHT ************************************/ ?>
                <?php if($config['right-sidebar']['show']){ ?>
                    <div class="wpo-sidebar wpo-sidebar-2 <?php echo $config['right-sidebar']['class']; ?>">
                        <?php if(is_active_sidebar(of_get_option('right-sidebar'))): ?>
                            <div class="sidebar-inner">
                                <?php dynamic_sidebar(of_get_option('right-sidebar')); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php } ?>
                <?php /******************************* END SIDEBAR RIGHT *********************************/ ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>