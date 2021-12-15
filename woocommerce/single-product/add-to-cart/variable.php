<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
	<?php else : ?>
		<div class="variations">
			<!-- <tbody> -->
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<div class="variations-row">
						<div class="label">
							<label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?>:</label>
							<?php
							$lower = strtolower($attribute_name);
							switch($lower) {
								case 'pa_color':
									echo '<div class="color-name"></div>';
								break;

								case 'size':
								case 'sizes':
								case 'pa_size':
								case 'pa_sizes':
									global $post;
									$chart = product_categories($post);

									if ($chart) :
										echo '<div class="size-chart"><a data-toggle="modal" data-target="#sizingChart" href="#">Size Chart</a></div>';
									endif;
								break;

								case 'sb-flange-size':
								case 'pa_sb-flange-size':
									echo '<div class="size-chart"><a data-toggle="modal" data-target="#flangeSizingChart" href="#">Sizing Guidelines</a></div>';
								break;

								case 'sb-body-size':
								case 'pa_sb-body-size': 
									echo '<div class="size-chart"><a data-toggle="modal" data-target="#bodySizingChart" href="#">Sizing Guidelines</a></div>';								
								break;
							}
							?>
						</div>
						<ul class="value d-flex flex-wrap attribute-wrapper">
							<?php
								wc_dropdown_variation_attribute_options(
									array(
										'options'   => $options,
										'attribute' => $attribute_name,
										'product'   => $product,
									)
								);
							?>
						</ul>
					</div>
				<?php endforeach; ?>
			<!-- </tbody> -->
		</div>

		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<!-- Sizing Charts -->
<div class="modal fade" id="sizingChart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <?php 
        $base = get_stylesheet_directory_uri();

        if (isset($chart)) {
        	echo '<img src="' . $base . '/images/store/sizing-charts/' . $chart . '.png">';
        }

        ?>
      </div>
    </div>
  </div>
</div>

<!-- Flange Sizing -->
<div class="modal fade" id="flangeSizingChart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width: 600px; max-width:96%; margin:0 auto">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				<iframe width="560" height="315" src="https://www.youtube.com/embed/qtY40FV1mS0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

<!-- Body Sizing -->
<div class="modal fade" id="bodySizingChart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width: 600px; max-width:96%; margin:0 auto">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/dRtPCbwCUMU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
