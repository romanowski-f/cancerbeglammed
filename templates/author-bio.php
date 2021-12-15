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
 *
 *
 * Comment out the following code to "turn it off"
 *
<div class="title">
	<h4 class="author-title">
		<a href="/authors">
			Meet Our Writers
		</a>
	</h4>
</div>

<div class="author-about-container clearfix">
	<div class="avatar-img">
		<?php echo get_simple_local_avatar( get_the_author_meta( 'user_email' ),100 ); ?>
	</div>
	<!-- .author-avatar -->
	<div class="description">
		<div class="cbg-author-name">
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
			<?php echo get_the_author(); ?>
		</a>
		</div>
		<p>
		<?php the_author_meta( 'description' ); ?>
		</p>
		<div class="cbg-author-archive">
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
			<?php echo __( 'See all articles by', TEXTDOMAIN ); ?>
			<?php echo get_the_author(); ?>
		</a>
		</div>
	</div>
</div>
 */
?>
