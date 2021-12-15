<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-container">

		
		<?php if (has_post_thumbnail()) { ?>
			<div class="post-thumb">
				<a href="<?php the_permalink(); ?>" title="">
					<?php the_post_thumbnail('blog-image');?>
				</a>
			</div>
		<?php } ?>
		

		<div class="post-name">
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
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
		<div class="entry-content">
			<?php echo the_excerpt(); ?>
		</div>
		<div class="readmore">
			<a href="<?php the_permalink(); ?>" class="btn btn-readmore">Read More</a>
		</div>
	</div>
</article>