<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Brainweb  Team < support@brainweb.vn>
 * @copyright  Copyright (C) 2014 brainweb.vn. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.brainweb.vn
 * @support  http://www.brainweb.vn/support/forum.html
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-container">
		<div class="post-thumb">
			<?php
				if ( has_post_format( 'video' ) && wpo_is_embed() ) {
				?>
					<div class="video-responsive">
						<?php wpo_embed(); ?>
					</div>
				<?php
				}
				else if ( has_post_format( 'audio' ) && wpo_is_embed() ) {
				?>
					<div class="audio-thumb audio-responsive">
						<?php wpo_embed(); ?>
					</div>
				<?php
				}
				else if ( has_post_format( 'gallery' )) {
					if( wpo_is_gallery() ){
					$_imgs = wpo_gallery();
				?>
					<div id="post-slide-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php foreach ($_imgs as $key => $_img) {
								echo '<div class="item '.(($key==0)?'active':'').'">';
									echo '<img src="'.$_img.'" alt="">';
								echo '</div>';
							} ?>
						</div>
						<a class="left carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="prev"></a>
						<a class="right carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="next"></a>
					</div>
				<?php
					}
				}
				else if (has_post_thumbnail()) {
				?>
				<a href="<?php the_permalink(); ?>" title="">
					<?php the_post_thumbnail('blog-single-image');?>
				</a>
				<?php }
			?>
		</div>
		<div class="post-name">
			<div class="entry-meta entry-header cbg-category cat-btn">
				<span class="cat-link"><?php the_category(' '); ?></span>
			</div>
			<h2 class="entry-title">
				<?php the_title(); ?>
			</h2>
			<div class="entry-meta entry-header">
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
				<hr>
			</div>
		</div>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div>

		<div class="post-share">
			<div class="row">
				<!-- div class="author-about col-sm-8">
					<?php get_template_part('templates/author-bio'); ?>
				</div -->
				<div class="col-sm-12">
					<ul class="social-networks">
						<h4><?php echo __( 'Share this Article: ',TEXTDOMAIN ); ?></h4>
						<?php if((bool)of_get_option('sharing-facebook',true)): ?>
						<li class="facebook">
							<a href="http://www.facebook.com/sharer.php?s=100&p&#91;url&#93;=<?php the_permalink(); ?>&p&#91;title&#93;=<?php the_title(); ?>" target="_blank">
								<i class="fa fa-facebook"></i>&emsp; FACEBOOK
							</a>
						</li>
						<?php endif; ?>
						<?php if((bool)of_get_option('sharing-twitter',true)): ?>
						<li class="twitter">
							<a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" target="_blank">
								<i class="fa fa-twitter"></i>&emsp; TWITTER
							</a>
						</li>
						<?php endif; ?>
						<?php if((bool)of_get_option('sharing-linkedin',true)): ?>
						<li class="linkedin">
							<a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank">
								<i class="fa fa-linkedin"></i>&emsp;LINKEDIN
							</a>
						</li>
						<?php endif; ?>
						<?php if((bool)of_get_option('sharing-tumblr',true)): ?>
						<li class="tumblr">
							<a href="http://www.tumblr.com/share/link?url=<?php echo urlencode(get_permalink()); ?>&amp;name=<?php echo urlencode($post->post_title); ?>&amp;description=<?php echo urlencode(get_the_excerpt()); ?>" target="_blank">
								<i class="fa fa-tumblr"></i>&emsp; TUMBLR
							</a>
						</li>
						<?php endif; ?>
						<?php if((bool)of_get_option('sharing-google',true)): ?>
						<li class="google">
							<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
					'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank">
								<i class="fa fa-google-plus"></i>&emsp; GOOGLE +1
							</a>
						</li>
						<?php endif; ?>
						<?php if((bool)of_get_option('sharing-pinterest',true)): ?>
						<li class="pinterest">
							<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
							<a data-toggle="tooltip" data-placement="<?php echo $args['position']; ?>" data-animation="<?php echo $args['animation']; ?>"  data-original-title="Pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&amp;description=<?php echo urlencode($post->post_title); ?>&amp;media=<?php echo urlencode($full_image[0]); ?>" target="_blank">
								<i class="fa fa-pinterest"></i>&emsp; PINTEREST
							</a>
						</li>
						<?php endif; ?>
						<?php if((bool)of_get_option('sharing-email',true)): ?>
						<li class="email">
							<a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>">
								<i class="fa fa-envelope"></i>&emsp; EMAIL
							</a>
						</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>

		<?php if (in_category('456')) : ?>
		<div class="row" style="padding:20px 7.5px 10px 7.5px;"><a href="/share-your-story-with-other-mothers">
		<img src="/wp-content/uploads/2015/01/one-mother-to-another-share.jpg"></a>
		</div>
		<?php endif; ?>

		<?php comments_template(); ?>
	</div><!--  End .post-container -->
</article>
