<!-- HEADER -->
<header id="wpo-header" class="wpo-header">
	<div class="topbar text-center py-1" style="background: #08accd; color: #fff">Please be advised due to Covid-19 there may be delays in product fulfillment and shipping beyond our control.</div>
	<div class="container">
		<div class="header-wrap">

			<div class="row">
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

				<div class="col-3 col-md">
					
                	<div class="row">
                        <div class="col-md-12 col-sm-12 header-share align-items-end align-items-md-start">
                        	<div class="secondary-menu  d-none d-md-block">
							<?php
                               $args = array(  'theme_location' => 'secondary-menu',
                                                'container_class' => 'secondary-nav',
                                                'menu_class' => 'nav',
                                                'fallback_cb' => '',
                                                'menu_id' => 'secondary-menu',
                                            );
                                wp_nav_menu($args);
							?>
                        	</div>
							<ul class="header-social-networks d-none d-md-block">
								<li class="facebook">
									<a href="https://www.facebook.com/CancerBeGlammed" target="_blank">
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
							<div class="d-flex align-self-end align-self-sm-start">
								<a class="my-account d-none d-md-block" href="<?php echo bloginfo('url'); ?>/my-account" title="My Account"><i class="fas fa-user-circle"></i></a>
								<a class="view-cart" href="<?php echo bloginfo('url'); ?>/bag">
									<span class="bag d-block d-md-inline"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/header/icon-bag.png"></span>
								<div class="cart-total"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></div>
								</a>										
							</div>
                        </div>
                	</div>

                    <div class="row">
                        <div class="col-md-4 col-sm-5 d-none d-md-block ml-auto search-topbar">
                            <?php get_search_form(); ?>
                        </div>
                    </div>		

				</div>
			</div>



			<?php 
			$subhead = '';
			$link = get_bloginfo('url') . '/shop';
			if (is_woocommerce()) :
				global $post;
				$categories = array();
				if (!is_shop() && isset($post)) :
					$terms = wp_get_post_terms( $post->ID, 'product_cat' );
					foreach ( $terms as $term ) $categories[] = $term->slug; 							
				endif;

				$subhead = '<span>Life &amp; Style Collection</span>';
				if (is_product_category('gift-her') || in_array( 'gift-her', $categories )) :
					$subhead = '<span>Gift Her</span>';
					$link .= '/gift-her';
				endif; ?>
			<?php endif; ?>

			<div class="collection-title" style="z-index: 2; position: relative">
				<a class="d-block" href="<?php echo $link; ?>">
				<div class="shop-header-text text-center">
					<h2>Recovery Boutique</h2>
					<div class="collection-subhead">
						<?php echo $subhead ?>
					</div>
				</div>
				</a>
			</div>



			<!-- MENU -->
			<div class="row">
				<div class="col">
                    <nav id="wpo-mainnav" class="wpo-megamenu animate navbar navbar-default d-none d-md-block" role="navigation" style="background:transparent">
					<?php get_template_part('/templates/nav/nav'); ?>         
				</nav>							
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
</header>
<!-- //HEADER -->