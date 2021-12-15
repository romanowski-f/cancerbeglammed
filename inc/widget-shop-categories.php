<?php
// Creating the widget 
class cbg_categories_widget extends WP_Widget {
 
	// The construct part  
	function __construct() {
		parent::__construct(
		  
		// Base ID of your widget
		'cbg_categories_widget', 
		  
		// Widget name will appear in UI
		__('CBG Shop Categories', 'cbg_widget_domain'), 
		  
		// Widget description
		array( 'description' => __( 'Displays shop categories', 'cbg_widget_domain' ), ) 
		);	 
	}
	  
	// Creating widget front-end
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		  
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		  
		// This is where you run the code and display the output
		if (is_product_category()) :
			$cate = get_queried_object();
			if ( $cate->parent > 0  ) {
				$parent = get_term_by('id', $cate->parent, 'product_cat');
				$categories = array(
					$parent->slug,
					$cate->slug,
				);				
			} else {
				$categories = array($cate->slug);
			}


		elseif (is_product()):
			global $post;
			$terms = wp_get_post_terms( $post->ID, 'product_cat' );
			foreach ( $terms as $term ) $categories[] = $term->slug; 
		else : $categories = 'nope';
		endif;
	?>

<div class="cbg-shop-categories-sidebar">
	<?php //print_r($categories); ?>
	<h5 style="color: #08accd">Life &amp; Style Collection</h5>
<ul class="product-categories">
	<li class="cat-item <?php echo check_current_cat('hospital-gowns-pajamas', $categories); ?>">
		<a href="<?php echo bloginfo('url'); ?>/shop/hospital-gowns-pajamas">Hospital Gowns &amp; Pajamas</a>
	</li>
	<li class="cat-item has-children <?php echo check_current_cat('after-surgery', $categories); ?>"><a href="<?php echo bloginfo('url'); ?>/shop/after-surgery" class="">After Surgery</a>
		<ul class="children">
			<li class="cat-item <?php echo check_current_cat('easy-access-clothes', $categories); ?>">
				<a href="<?php echo bloginfo('url'); ?>/shop/after-surgery/easy-access-clothes">Easy Access Clothes</a>
			</li>
			<li class="cat-item <?php echo check_current_cat('managing-drains', $categories); ?>">
				<a href="<?php echo bloginfo('url'); ?>/shop/after-surgery/managing-drains">Managing Drains</a>
			</li>
			<li class="cat-item <?php echo check_current_cat('stylish-wraps-cover-ups', $categories); ?>">
				<a href="<?php echo bloginfo('url'); ?>/shop/after-surgery/stylish-wraps-cover-ups">Stylish Wraps &amp; Cover-Ups</a>
			</li>
		</ul>
	</li>
	<li class="cat-item has-children <?php echo check_current_cat('chemo-radiation-essentials', $categories); ?>">
		<a href="<?php echo bloginfo('url'); ?>/shop/chemo-radiation-essentials">Chemo &amp; Radiation Essentials</a>
		<ul class="children">
			<li class="cat-item <?php echo check_current_cat('fashionable-hair-loss-solutions', $categories); ?>">
				<a href="<?php echo bloginfo('url'); ?>/shop/fashionable-hair-loss-solutions">Fashionable Hair Loss Solutions</a>
			</li>
			<li class="cat-item <?php echo check_current_cat('clothing-styled-for-treatment', $categories); ?>">
				<a href="<?php echo bloginfo('url'); ?>/shop/clothing-styled-for-treatment">Clothing Styled For Treatment (Port &amp; PICC Line Accessible)</a>
			</li>
			<li class="cat-item <?php echo check_current_cat('sensitive-skin-soothers', $categories); ?>">
				<a href="<?php echo bloginfo('url'); ?>/shop/sensitive-skin-soothers">Sensitive Skin Soothers</a>
			</li>
		</ul>	
	</li>
	<li class="cat-item <?php echo check_current_cat('feel-good-goodies', $categories); ?>">
		<a href="<?php echo bloginfo('url'); ?>/shop/feel-good-goodies">"Feel Good" Goodies</a>
	</li>
	<li class="cat-item <?php echo check_current_cat('menopause-madness-relief', $categories); ?>">
		<a href="<?php echo bloginfo('url'); ?>/shop/menopause-madness-relief">Menopause Madness Relief</a>
	</li>
	<li class="cat-item <?php echo check_current_cat('beauty-wellness', $categories); ?>">
		<a href="<?php echo bloginfo('url'); ?>/shop/beauty-wellness">Beauty & Wellness</a>
		<ul class="children">
			<li class="cat-item">
				<a href="<?php echo bloginfo('url'); ?>/shop/beauty-wellness/skin-care">Skincare: Heal & Repair</a>
			</li>
			<li class="cat-item <?php echo check_current_cat('beautycounter', $categories); ?>">
				<a href="<?php echo bloginfo('url'); ?>/shop/beauty-wellness/beautycounter">Clean Beauty with Beautycounter</a>
			</li>
		</ul>
	</li>
	<li class="cat-item <?php echo check_current_cat('your-breast-life-reimagined', $categories); ?>">
		<a href="<?php echo bloginfo('url'); ?>/shop/your-breast-life-reimagined">Your Breast Life (Re-Imagined)</a>
		<ul class="children">
			<li class="cat-item">
				<a href="<?php echo bloginfo('url'); ?>/shop/your-breast-life-reimagined/expert-fit-with-anaono">Expert Fit With AnaOno</a>
			</li>
			<li class="cat-item <?php echo check_current_cat('sensitive-skin-soothers', $categories); ?>">
				<a href="<?php echo bloginfo('url'); ?>/shop/lifestyle-apparel-accessories">Lifestyle Apparel &amp; Accessories</a>
			</li>
		</ul>
	</li>
	<li class="cat-item <?php echo check_current_cat('ostomy-life-style-solutions', $categories); ?>">
		<a href="<?php echo bloginfo('url'); ?>/shop/ostomy-life-style-solutions">Ostomy Life & Style Solutions</a>
	</li>
</ul>

<h5 style="color: #08accd">Gift Her</h5>
<ul class="product-categories">
	<li class="cat-item <?php echo check_current_cat('clothes-that-help-heal', $categories); ?>">
		<a href="<?php echo bloginfo('url'); ?>/shop/clothes-that-help-heal">Clothes That Help &amp; Heal</a>
	</li>
	<li class="cat-item <?php echo check_current_cat('wrap-it-up-in-style', $categories); ?>">
		<a href="<?php echo bloginfo('url'); ?>/shop/wrap-it-up-in-style">Wrap It Up In Style</a>
	</li>
	<li class="cat-item <?php echo check_current_cat('comfort-thats-cool', $categories); ?>">
		<a href="<?php echo bloginfo('url'); ?>/shop/comfort-thats-cool">Comfort That's Cool</a>
	</li>
	<li class="cat-item <?php echo check_current_cat('thoughtful-things', $categories); ?>">
		<a href="<?php echo bloginfo('url'); ?>/shop/thoughtful-things">Thoughtful Things</a>
	</li>
</ul>
</div>

	<?php
		echo $args['after_widget'];	 
	}
	          
	// Creating widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'New title', 'wpb_widget_domain' );	
		}
		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
	      
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;	 
	}
 
// Class wpb_widget ends here
} 

// Register and load the widget
function cbg_load_widget() {
    register_widget( 'cbg_categories_widget' );
}
add_action( 'widgets_init', 'cbg_load_widget' );



function check_current_cat($current, $categories) {
	if (is_array($categories)):
		if (in_array( $current, $categories )) : return 'current-cat'; endif;
		//else: return 'nope'; endif;
	else :
		if (is_product_category($current)) : return 'current-cat'; endif;
	endif;
	
	return '';
}

?>