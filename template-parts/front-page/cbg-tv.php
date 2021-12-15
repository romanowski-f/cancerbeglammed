<h2 class="section-heading boxed text-center mt-5 mb-4"><span>CBG-TV</span></h2>

<div class="row no-gutters cbg-tv-section" style="padding-bottom:60px">
	<div class="col pt-4">
		<ul class="kt-categories">
			<?php if (is_plugin_active('cbg-tv/cbg-tv.php')) :  ?>

				<?php $args = array('post_type' => 'cbgtv', 'posts_per_page' => 8); ?>
				<?php $query = New WP_Query( $args ); ?>
				<?php

				$i = 0;
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
						$video['title'] = get_the_title();
						$video['link'] 	= get_post_meta($post->ID, 'youtube_link', true);
						$video['desc']	= get_post_meta($post->ID, 'video_desc', true);
				?>

				<li <?php if ($i == 0) : echo 'class="active"'; endif; ?>style=""><a class="cbg-tv" href="#" data-url="<?php echo $video['link']; ?>" data-title="<?php echo $video['title']; ?>"><?php echo $video['title']; ?></a></li>

				<?php
				$i++;
					endwhile;
				endif;
				?>

			<?php endif; ?>
		</ul>
	</div>
	<div class="col-8 p-0">
		<div class="cbg-tv-wrapper">
			<div class="video-wrapper">
				<iframe
					id="main-video"
				  src="https://www.youtube.com/embed/EPWUPj_cPHg"
				  srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/EPWUPj_cPHg?autoplay=1><img src=https://img.youtube.com/vi/EPWUPj_cPHg/maxresdefault.jpg alt='Cancer Be Glammed: 6 Headscarf Styles in 5 Steps'><span>&#x25BA;</span></a>"
				  frameborder="0"
				  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
				  allowfullscreen
				  title="Cancer Be Glammed: 6 Headscarf Styles in 5 Steps"
				  loading="lazy"
				  style="border: 1px solid #e2e2e2"
				></iframe>
			</div>	
		</div>		
	</div>
</div>