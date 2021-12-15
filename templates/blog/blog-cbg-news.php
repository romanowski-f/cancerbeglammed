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
$postformat = get_post_format();
$is_show = false;
switch ($postformat) {
	case 'gallery':
		$is_show = wpo_is_gallery();
		break;
	case 'audio':
		$is_show = wpo_is_embed();
		break;
	case 'video':
		$is_show = wpo_is_embed();
		break;
	default:
		$is_show = has_post_thumbnail();
		break;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-container">
		<?php if($is_show){ ?>
		<div class="post-thumb">
			<?php
				if ( has_post_format( 'video' )) {
				?>
					<div class="video-responsive">
						<?php wpo_embed(); ?>
					</div>
				<?php
				}
				else if ( has_post_format( 'audio' )) {
				?>
					<div class="audio-thumb audio-responsive">
						<?php wpo_embed(); ?>
					</div>
				<?php
				}
				else if ( has_post_format( 'gallery' )) {
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
						<a class="left carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div>
				<?php
				}
				else if (has_post_thumbnail()) {
				?>
				<a href="<?php the_permalink(); ?>" title="">
					<?php the_post_thumbnail('blog-image');?>
				</a>
				<?php }
			?>
		</div>
		<?php } ?>
		<div class="post-name">
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
			<div class="entry-meta">
			</div>
		</div>
		<div class="entry-content">
			<?php echo wpo_excerpt(120); ?>
		</div>
		<div class="readmore">
			<a href="<?php the_permalink(); ?>" class="btn btn-custom"><?php echo __( 'read more',TEXTDOMAIN ); ?></a>
		</div>
	</div>
</article>