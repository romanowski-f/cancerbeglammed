		<!-- HEADER -->
		<header id="wpo-header" class="wpo-header">
            <div id="wpo-topbar">
                <div class="container">
                    <div class="row">

                    </div>
                </div>
            </div>
			<div class="container">
				<div class="header-wrap">

					<div class="row" style="justify-content: space-between">
						<div class="d-md-none col">
							<div class="mobile-menu-toggle">
								<i class="fas fa-bars"></i>
							</div>				
						</div>

					<!-- LOGO -->
					<div class="col-6 col-md-3">
						<div class="logo-stacked mx-auto" style="margin-bottom: 0">
							<a href="<?php echo bloginfo('url'); ?>">
								<img src="<?php echo get_stylesheet_directory_uri(). '/images/header/cbg-logo-stacked.png'; ?>" alt="Cancer Be Glammed">
							</a>
						</div>
					</div>
					<!-- //LOGO -->

						<!-- MENU -->
                        <div class="col">
                        	<div class="row">
		                        <div class="col-md-12 col-sm-12 header-share align-items-end align-items-md-start">
		                        	<div class="secondary-menu d-none d-md-block">
									<?php
		                               $args = array(  'theme_location' => 'secondary-menu',
		                                                'container_class' => 'secondary-nav',
		                                                'menu_class' => 'nav megamenu',
		                                                'fallback_cb' => '',
		                                                'menu_id' => 'secondary-menu',
		                                            );
		                                wp_nav_menu($args);
									?>
		                        	</div>
									<ul class="header-social-networks d-none d-md-block">
										<li class="facebook">
										<a href="https://www.facebook.com/CancerBeGlammed?fref=ts" target="_blank">
											<img src="https://www.cancerbeglammed.com/wp-content/uploads/2015/04/facebook.png" style="height: 32px;">
										</a>
										</li>
										<li class="twitter">
										<a href="https://twitter.com/CancerBeGlammed" target="_blank">
											<img src="https://www.cancerbeglammed.com/wp-content/uploads/2015/04/twitter.png" style="height: 32px;">
										</a>
										</li>
										<li class="you-tube">
										<a href="https://www.youtube.com/channel/UCLGHhbTCcYGrED__CkpUHqg" target="_blank">
											<img src="https://www.cancerbeglammed.com/wp-content/uploads/2015/04/you-tube.png" style="height: 32px;">
										</a>
										</li>
										<li class="pinterest">
										<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
										<a href="https://www.pinterest.com/cancerbeglammed" target="_blank">
											<img src="https://www.cancerbeglammed.com/wp-content/uploads/2015/04/pinterest.png" style="height: 32px;">
										</a>
										</li>
										<li class="instagram">
										<a href="https://instagram.com/cancerbeglammed" target="_blank">
											<img src="https://www.cancerbeglammed.com/wp-content/uploads/2015/04/instagram.png" style="height: 32px;">
										</a>
										</li>
									</ul>
									<div class="d-flex">
										<a class="my-account d-none d-md-block" href="<?php echo bloginfo('url'); ?>/my-account" title="My Account"><i class="fas fa-user-circle"></i></a>

										<a class="view-cart" href="<?php echo bloginfo('url'); ?>/bag">
											<span class="bag d-block d-md-inline"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/header/icon-bag.png"></span>
											<div class="cart-total">
												<?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
											</div>
										</a>										
									</div>

		                        </div>
                        	</div>

	                        <div class="row">
		                        <div class="col-md-4 col-sm-5 ml-auto d-none d-md-block search-topbar">
		                            <?php get_search_form(); ?>
		                        </div>
	                        </div>

                        </div>


                        <!-- Mobile Menu -->
                        <nav class="d-md-none mobile-nav">
	                    	<?php 	wp_nav_menu( array(
								'theme_location' => 'mobile-menu',
								'menu_id'        => 'cbg-mobile-menu',
								'menu_class'	 => 'nav-home',
							) ); ?>         
							<div class="mobile-menu-close">Close</div>               	
                        </nav>


						<!-- //MENU -->
					</div>
				</div>

                        <div class="row">
                            <nav id="wpo-mainnav" class="d-none d-md-block wpo-megamenu mx-auto animate navbar navbar-default" role="navigation">
					   			<?php get_template_part('/templates/nav/nav'); ?>
                            </nav>
						</div>
				
			</div>
		</header>
		<!-- //HEADER -->