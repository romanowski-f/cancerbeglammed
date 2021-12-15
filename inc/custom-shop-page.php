<?php add_action('woocommerce_before_shop_loop', 'cbg_shop_page');

function cbg_shop_page() { 
?>

<div class="container">
	<div class="shop-headline mt-4">
		<p class="text-center color-blue m-0">Nothing makes a woman more beautiful than the belief that she is beautiful</p>
	</div>
	<div class="shop-categories">
		<ul>
			<li><a href="<?php echo bloginfo('url');?>/shopping-guide/after-surgery">After Surgery</a></li>
			<li><a href="<?php echo bloginfo('url');?>/shopping-guide/chemo-radiation-essentials">Chemo & Radiation Essentials</a></li>
			<li><a href="<?php echo bloginfo('url');?>/shopping-guide/feel-good-goodies">"Feel Good" Goodies</a></li>
			<li><a href="<?php echo bloginfo('url');?>/shopping-guide/menopause-madness-relief-2">Menopause Madness Relief</a></li>
			<li><a href="<?php echo bloginfo('url');?>/shopping-guide/clean-beauty-2">Clean Beauty</a></li>
		</ul>
	</div>

	<div class="row my-5">
		<div class="col-md-8">
			<div class="shop-product featured">
				<div class="shop-product__image">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/featured-product-sample-1.jpg" alt="">
				</div>
				<h2>Dress For Success</h2>
				<p>Be fashion-forward!  Prepare for surgery with our collection of clever, easy-to-wear post-op clothes.  Perfect for limited mobility, managing drains, and a "life made easier" recovery.  <a href="#">Shop Collection</a></p>
			</div>
			<div class="shop-product featured">
				<div class="shop-product__image">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/featured-product-sample-2.jpg" alt="">
				</div>
				<h2>Chemo & Radiation Essentials</h2>
				<p>Create a recovery wardrobe as unique as you! From chic chemo beanies for hair loss to clothes with easy port-access or cozy cover-ups, express yourself in comfort & style. <a href="#">Shop Collection</a></p>
			</div>
		</div>
		<div class="col-md-4 shop-sidebar d-none d-md-block">
			<div class="shop-product">
				<div class="shop-product__image">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/sidebar-1.jpg" alt="">
				</div>
				<h3>Menopause Madness Relief</h3>
				<p>Torm rem apariem, eaque ipsa qae ab illo</p>
			</div>
			<div class="shop-product">
				<div class="shop-product__image">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/sidebar-2.jpg" alt="">
				</div>
				<h3>Your Breast Life (Re-Imagined)</h3>
				<p>Torm rem apariem, eaque ipsa qae ab illo</p>
			</div>
			<div class="shop-product">
				<div class="shop-product__image">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/sidebar-3.jpg" alt="">
				</div>
				<h3>Clean Beauty & Wellness</h3>
				<p>Torm rem apariem, eaque ipsa qae ab illo</p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="shop-product banner">
				<div class="shop-product__image">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/banner-1.jpg" alt="">
				</div>
				<h2>"Feel Good" Goodies</h2>
				<p>Delight yourself with hip essentials like a water bottle with a built-in flavor infuser or frozen pearls for cool, soothing relief. All styled to help you look and feel better. (Of course!) <a href="#">Shop Collection</a></p>
			</div>
		</div>
	</div>

	<div class="row mb-5">
		<div class="col-sm-8">
			<div class="shop-product preview mb-0">
				<div class="shop-product__image"></div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="shop-product h-100">
				<div class="shop-product__image h-100"></div>
				<h2></h2>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<a href="#">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/shop-more.jpg" alt="">
			</a>
		</div>
	</div>
</div>

<?php
}
?>