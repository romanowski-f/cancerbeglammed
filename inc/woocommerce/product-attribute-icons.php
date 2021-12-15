<?php

/**
 * Radio Buttons for Variations
 */
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'cbg_variation_radio_buttons', 10, 2);

function cbg_variation_radio_buttons($html, $args) { ?>
	<?php global $product; ?>

	<?php
	if ( ! empty( $args['options'] ) ) :
		if ( $product && taxonomy_exists( $args['attribute'] ) ) :
			// Get terms if this is a taxonomy - ordered. We need the names too.
			$terms  = wc_get_product_terms(
				$product->get_id(),
				$args['attribute'],
				array(
					'fields' => 'all',
				)
			);

			foreach ($terms as $term) :
				 if ( in_array( $term->slug, $args['options'], true ) ) :
				 	$style = '';
					if ($term->taxonomy == 'pa_color') :
						$bg = get_field( 'icon_color', 'term_' . $term->term_id );
						$style = 'style="background-color: ' . $bg . '"';

						if (get_field('icon_pattern', 'term_' . $term->term_id)) {
							$bg = get_field('icon_pattern', 'term_' . $term->term_id);
							$style = 'style="background: url(\'' . $bg . '\'); background-size: cover"';
						}

					endif;

				 	?>

					<li class="<?php echo $term->taxonomy; ?>">
						<input type="radio" class="attribute-radio-button" value="<?php echo $term->slug; ?>" name="<?php echo 'attribute_'.$term->taxonomy; ?>" id="<?php echo $term->slug; ?>">
						<label class="attribute-icon <?php echo $term->taxonomy; ?>" for="<?php echo $term->slug; ?>">
							<div
								class="attribute-check attribute-icon-bg <?php echo $term->slug; ?> d-flex align-items-center justify-content-center"
								<?php echo $style; ?>
							>
								<span class="attribute-name" data-name="<?php echo $term->name; ?>"><?php echo $term->name; ?></span>
							</div>
						</label>
					</li>

				<?php
				endif;
			endforeach;


		else :
			foreach ( $args['options'] as $option ) :
				// if (sanitize_title($args['attribute']) == 'color') : 	$class = 'color';
				// else :											 		$class = 'default';
				// endif;
				$class = 'default';
				?>

					<li class="<?php echo $class; ?>">
						<input type="radio" class="attribute-radio-button" value="<?php echo $option; ?>" name="<?php echo 'attribute_'.sanitize_title($args['attribute']); ?>" id="<?php echo $option; ?>">
						<label class="attribute-icon <?php echo $class; ?>" for="<?php echo $option; ?>">
							<div class="attribute-check attribute-icon-bg d-flex align-items-center justify-content-center">
								<span class="attribute-name">
									<?php echo esc_html( apply_filters( 'woocommerce_variation_option_name', $option, null, $args['attribute'], $product ) ); ?>
								</span>
							</div>
						</label>
					</li>
			<?php
			endforeach;
		endif;
	endif;

	return $html;
}

?>