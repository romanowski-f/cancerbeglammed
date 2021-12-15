<div class="container" style="padding-top: 18px">

	<div class="row mb-3 mr-md-0">
		<div class="col-md">
			<div class="callout-banner welcome-banner d-flex align-items-center h-100">
				<div class="row flex-grow-1">
					<div class="col-lg d-sm-flex align-items-center justify-content-center position-relative text-center">
						<div class="fave mr-4 text-nowrap"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/store/welcome-to.svg"></div>
						<p class="m-0 text-center" style="font-size:24px"><strong>CBG's</strong> Gift Her <br /> Boutique</p>
					</div>
					<div class="col-lg d-sm-flex align-items-center justify-content-center">
						<div class="fave mr-4 text-center text-nowrap"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/store/shop-for.svg"></div>
						<p class="m-0 text-center text-sm-left">thoughtful recovery gifts <br />
							that she will use and enjoy</p>	
					</div>			
				</div>
			</div>
		</div>

		<div class="pl-md-0 d-none d-md-flex align-items-center go-home-banner">
			<div class="callout-banner welcome-banner h-100 d-flex align-items-center" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/store/go-home-bg.jpg'); background-size: cover">
				<div class="wrap">
					<div class="fave text-white" style="font-size:53px; line-height:1; display:inline-block">Go to</div>
					<a href="<?php echo bloginfo('url'); ?>" class="go-home-btn d-inline-block">home page</a>
					<p class="text-center mb-1" style="font-size:17px; letter-spacing:0px">For Fab Finds, Blogs, <br />CBG-TV &amp; More</p>
				</div>
			</div>
		</div>
	</div>

	<div class="shop-categories">
		<ul>
			<li><a href="<?php echo bloginfo('url');?>/shop/clothes-that-help-heal">Clothes That Help & Heal</a></li>
			<li><a href="<?php echo bloginfo('url');?>/shop/wrap-it-up-in-style">Wrap It Up In Style</a></li>
			<li><a href="<?php echo bloginfo('url');?>/shop/comfort-thats-cool">Comfort That's Cool</a></li>
			<li><a href="<?php echo bloginfo('url');?>/shop/thoughtful-things">Thoughtful Things</a></li>
		</ul>
	</div>

	<div class="row my-3">
		<div class="col-md-8">
			<div class="shop-product featured">
				<a href="<?php echo bloginfo('url');?>/shop/clothes-that-help-heal">
					<div class="shop-product__image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/gift-her/feat-help.jpg" class="w-100 img-fluid" alt="">
					</div>
				</a>
			</div>
			<div class="shop-product featured">
				<a href="<?php echo bloginfo('url');?>/shop/clothes-that-help-heal">
					<div class="shop-product__image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/gift-her/feat-heal.jpg" class="w-100 img-fluid" alt="">
					</div>
				</a>
				<h2>Clothes That Help & Heal</h2>
				<p>Gift Her with clothes uniquely designed to be worn after surgery, during treatment and for a cozier, life-made-easier recovery.</p>
				<p><a href="<?php echo bloginfo('url');?>/shop/clothes-that-help-heal">Shop our Recovery Apparel Collection</a></p>
			</div>
		</div>
		<div class="col-md-4 shop-sidebar d-none d-md-block pl-0">
			<div class="shop-product">
				<a href="<?php echo bloginfo('url');?>/shop/wrap-it-up-in-style">
					<div class="shop-product__image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/gift-her/feat-wrap.jpg" class="w-100 img-fluid" alt="">
					</div>
				</a>
				<h3>"Wrap It Up" in Style</h3>
				<p>Wraps and cover-ups are a thoughtful gift that she will use and enjoy. Practical-yet-fashionable they are the perfect quick style fix for appointments, treatment and those up close and personal zoom calls!</p>
				<p><a href="<?php echo bloginfo('url');?>/shop/wrap-it-up-in-style">Shop our Wraps & Cover-Ups Collection.</a></p>
			</div>
			<div class="shop-product">
				<a href="<?php echo bloginfo('url');?>/shop/comfort-thats-cool">
					<div class="shop-product__image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/gift-her/feat-comfort.jpg" class="w-100 img-fluid" alt="">
					</div>
				</a>
				<h3>Comfort That's Cool</h3>
				<p>Pearls that are frozen before wearing, a soothing chilled neck wrap or a thermal pillow that holds warm or cold packs – now these are COOL gifts!</p>
				<p><a href="<?php echo bloginfo('url');?>/shop/comfort-thats-cool">Shop our Cool Comfort Collection</a></p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="shop-product banner">
				<a href="<?php echo bloginfo('url');?>/shop/gift-her/thoughtful-things">
					<div class="shop-product__image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/gift-her/thoughtful-things.jpg" class="w-100 img-fluid" alt="">
					</div>
				</a>
				<h2>Thoughtful Things</h2>
				<p>Often it’s the little things that make a big difference. These thoughtful gifts were selected by survivors to make treatment easier (and more stylish), tastefully hydrating and very soothing. <a href="<?php echo bloginfo('url');?>/shop/gift-her/thoughtful-things">Shop Our Thoughtful Things Collection</a></p>
			</div>
		</div>
	</div>

	<div class="row mb-5">
		<div class="col-sm-6 col-md-8">
			<div class="shop-quote mb-0 d-flex flex-column justify-content-center position-relative">
				<span class="quote">Be the reason someone smiles today!</span>
			</div>
		</div>
		<div class="col-sm-6 col-md-4">
			<div class="shop-product">
				<div class="shop-callout text-center d-flex flex-column justify-content-center">
					<span>Shop our <br>Life & Style<br/>Collection</span>
					<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="shop-btn">SHOP</a>
				</div>
				<h2></h2>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/store/banner.jpg" class="w-100 img-fluid"alt="">
		</div>
	</div>
</div>