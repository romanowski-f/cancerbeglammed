<div id="fab-finds-slider" class="carousel slide full-width d-flex" data-ride="carousel" data-interval="false" data-pause="hover" style="padding: 0 0 20px;">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<div class="row fab-finds-first-slide no-gutters">
			<?php /* Query */

				if (function_exists('acf_add_options_page')) :
					get_template_part('template-parts/fab-finds/fab-finds-acf');
				else :
					get_template_part('template-parts/fab-finds/fab-finds-loop');
				endif;

			?>
			</div>
		</div>	
	</div>	

	<?php if ($query->have_posts()) : ?>
	<a class="carousel-control-prev" href="#fab-finds-slider" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#fab-finds-slider" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>

	<ol class="carousel-indicators" style="bottom: -20px">
		<?php for ($i = 0; $i < $slides; $i++) : ?>
			<?php $active = ($i == 0) ? 'active' : ''; ?>
			<li data-target="#fab-finds-slider" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
		<?php endfor; ?>
	</ol>
	<?php endif; ?>
</div>
