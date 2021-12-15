<?php $url = get_bloginfo('url'); ?>
<div id="main-slider" class="carousel slide cbg-front-page-slider full-width d-flex" data-ride="carousel"  data-interval="12000" data-pause="hover">
	<div class="carousel-inner">

		<div id="slide-holiday" class="carousel-item active" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/slides/holiday-slide-bg.jpg'); background-position: center; background-size:cover;">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/slides/holiday-slide-present.png" alt="" class="animate__animated animate__fadeInRightSmall one present">
			<div class="row h-100">
				<div class="col-8 d-flex align-items-center justify-content-center">
					<div class="elements-wrapper"  style="margin-top: 20px">
						<div class="slide-title text-center mb-2 animate__animated animate__fadeInLeftSmall two">Holidays <span>By</span></div>
						<div class="slide-title smaller text-center mb-4 animate__animated animate__fadeInLeftSmall three">Cancer Be Glammed</div>
						<div class="slider-button-wrapper d-flex justify-content-center w-100">
							<a href="https://cancerbeglammed.com/cbg-blog/cancer-be-glammeds-best-holiday-gifts-for-women-coping-with-cancer-in-2021">
								<div class="slider-button animate__animated animate__fadeInLeftSmall five" data-anim="animate__animateFadeIn">SHOP GIFTS NOW</div>
							</a>
						</div>							
					</div>						
				</div>
			</div>
		</div>

		<div id="slide-1" class="carousel-item" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/slides/cbg-slide-1-bg.jpg'); background-position: center; background-size:cover;">
			<div class="row h-100">
				<div class="col-md-9 col-10 d-flex align-items-center justify-content-center">
					<div class="elements-wrapper">
						<div class="recovery-logo mb-3 animate__animated animate__fadeInRightSmall one"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/slides/recovery-logo.png" alt=""  class="d-block mx-auto"></div>
						<div class="slide-title text-center blue mb-4 animate__animated animate__fadeInLeftSmall two">Life &amp; Style <br />Collection</div>
						<div class="slider-button-wrapper d-flex justify-content-center w-100">
							<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">
								<div class="slider-button animate__animated animate__fadeInLeftSmall five" data-anim="animate__animateFadeIn">BROWSE & SHOP</div>
							</a>
						</div>							
					</div>						
				</div>
			</div>
		</div>

 		<div id="slide-2" class="carousel-item" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/slides/cbg-slide-2-bg.jpg'); background-position: center; background-size:cover;">
			<div class="row h-100">
				<div class="col-9 d-flex align-items-center justify-content-center">
					<div class="elements-wrapper">
						<div class="recovery-logo mb-3 animate__animated animate__fadeInRightSmall one"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/slides/recovery-logo.png" alt=""  class="d-block mx-auto"></div>
						<div class="slide-title text-center blue mb-4 animate__animated animate__fadeInLeftSmall two">Gift Her <br />Collection</div>
						<div class="slider-button-wrapper d-flex justify-content-center w-100">
							<a href="<?php echo $url; ?>/shop/gift-her">
								<div class="slider-button animate__animated animate__fadeInLeftSmall five" data-anim="animate__animateFadeIn">SHOP FOR GIFTS</div>
							</a>
						</div>							
					</div>						
				</div>
			</div>
		</div> 


 		<div id="slide-3" class="carousel-item" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/slides/cbg-slide-3-bg.jpg'); background-position: center; background-size:cover;">
 			<div class="row">
 				<div class="col">
					<div class="logo-element-wrapper d-flex align-items-center">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/slides/cbg-logo-white.png" class="img-fluid animate__animated animate__popInFlash three mr-3" style="width: 14%; z-index:2;"alt="">

						<div class="slide-3-title text-center text-white">
							<div class="animate__animated animate__popInLeft" style="animation-delay:0.45s">CANCER BE</div>
							<div class="animate__animated animate__popInLeft" style="animation-delay:0.5s">GLAMMED</div>
						</div>
					</div> 						
 				</div>
 			</div>

			<div class="row">
				<div class="col">
					<div class="elements-wrapper">						
						<div class="slide-3-subtitle text-center animate__animated animate__fadeIn" style="animation-delay: 0.7s;">THE GUIDE</div>
						<div class="slide-3-tagline text-center animate__animated animate__fadeIn" style="animation-delay: 0.7s">
							Take Charge of Your Recovery <br />With Confidence, Comfort, and Style
						</div>
						<div class="slider-button-wrapper d-flex justify-content-center w-100">
							<a href="<?php echo $url; ?>/recover-in-style-book">
								<div class="slider-button white animate__animated animate__fadeInLeftSmall" style="animation-delay: 0.6s">PURCHASE</div>
							</a>
						</div>							
					</div>						
				</div>
			</div>
		</div> 

 	<div id="slide-7" class="carousel-item">
			<div class="item-wrapper d-flex align-items-center h-100">
				<a href="<?php echo $url; ?>/cancer-be-glammed-for-real">
					<picture>
						<source srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/slides/cbg-slide-7.webp" type="image/webp">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/slides/cbg-slide-7.jpg" loading="lazy" alt="">
					</picture>
				</a>
			</div>
		</div>

	</div>

	<a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#main-slider" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>

	<ol class="carousel-indicators">
		<li data-target="#main-slider" data-slide-to="0" class="active"></li>
		<li data-target="#main-slider" data-slide-to="1"></li>
		<li data-target="#main-slider" data-slide-to="2"></li>
		<li data-target="#main-slider" data-slide-to="3"></li>
		<li data-target="#main-slider" data-slide-to="4"></li>
<!-- 			<li data-target="#main-slider" data-slide-to="5"></li>
		<li data-target="#main-slider" data-slide-to="6"></li> -->
	</ol>
</div>