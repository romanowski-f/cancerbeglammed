<?php get_header(); ?>

<div id="wpo-mainbody" class="container wpo-mainbody">

	<!--Slider-->
	<div class="row my-4">
		<?php get_template_part('template-parts/front-page/homepage-slider'); ?>
	</div>

	<!-- Tagline -->
	<div class="tagline-wrapper">
		<h2>Cancer Be Glammed empowers women to recover with dignity, positive self-esteem, and personal style</h2>
	</div>

	<!-- Buckets -->
	<div class="row no-gutters" style="margin-left: -15px; margin-right: -15px">

		<!-- Life & Style Collection -->
		<div class="col-sm d-flex">
			<div class="item d-flex flex-column ml-md-0">
				<a class="d-block mb-4" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">
					<div class="bucket-img-wrapper" style="max-height: 200px">
						<picture>
<!-- 							<source srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/front-page/life-style-collection-webp.webp" type="image/webp"> -->
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/front-page/life-style-collection-new.jpg" loading="lazy" alt="Recovery Life & Style Collection">
						</picture>
					</div>
				</a>	
				<div class="desc px-3">
					<div class="d-flex align-items-center justify-content-center" style="min-height:60px">
						<h4>Recovery Life &amp; <br /> Style Collection</h4>
					</div>
					From fashionable recovery-wear and “feel good” goodies to life-made-easier solutions, we enable you to have a well-informed and better prepared recovery.
				</div>
				<div class="d-flex justify-content-center pb-4">
					<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="bucket-btn">Shop</a>	
				</div>			
			</div>
		</div>

		<!-- Gift Her -->
		<div class="col-sm d-flex">
			<div class="item d-flex flex-column">
				<a class="d-block mb-4" href="<?php echo bloginfo('url'); ?>/shop/gift-her">
					<div class="bucket-img-wrapper" style="max-height: 200px">
						<picture>
							<source srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/front-page/feat-help.webp" type="image/webp">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/front-page/feat-help.jpg" loading="lazy" alt="Gift Her Collection">
						</picture>
					</div>
				</a>	
				<div class="desc px-3">
					<div class="d-flex align-items-center justify-content-center" style="min-height:60px">
						<h4>Gift Her<br /> Collection</h4>
					</div>
					From pampering products to stylish recovery apparel, our survivor-inspired Gift Her Collection features thoughtful items that she will use and enjoy. 
				</div>	
				<div class="d-flex justify-content-center pb-4">
					<a href="<?php echo bloginfo('url'); ?>/shop/gift-her" class="bucket-btn">Shop</a>	
				</div>
			</div>
		</div>

		<!-- CBG The Guide -->
		<div class="col-sm d-flex">
			<div class="item d-flex flex-column mr-md-0">
				<a class="d-block mb-4" href="<?php echo get_option('home'); ?>/recover-in-style-book">
					<div class="bucket-img-wrapper" style="max-height: 200px">
						<picture>
							<source srcset="<?php echo get_stylesheet_directory_uri() . '/assets/images/front-page/the-guide.webp'; ?>" type="image/webp">
							<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/the-guide.jpg'; ?>" loading="lazy" alt="Cancer Be Glammed: The Guide">
						</picture>
					</div>
				</a>
				<div class="desc px-2">
					<div class="d-flex align-items-center justify-content-center" style="min-height:60px">
						<h4>Cancer Be Glammed: <br />The Guide</h4>
					</div>
					From diagnosis through survivorship, we help you "Take Charge of Your Recovery with Confidence, Self-esteem and Style!"
				</div>
				<div class="d-flex justify-content-center pb-4">
					<a href="<?php echo get_option('home'); ?>/recover-in-style-book" class="bucket-btn">Shop</a>	
				</div>				
			</div>
		</div>

		<!-- Fab Finds -->
		<div class="col-sm d-flex">
			<div class="item d-flex flex-column mr-md-0">
				<a class="d-block mb-4" href="<?php echo get_option('home'); ?>/cbg-blog/cancer-be-glammeds-best-holiday-gifts-for-women-coping-with-cancer-in-2021">
					<div class="bucket-img-wrapper" style="max-height: 200px">
						<picture>
							<!-- <source srcset="<?php echo get_stylesheet_directory_uri() . '/assets/images/front-page/feat-holiday.webp'; ?>" type="image/webp"> -->
							<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/front-page/feat-holiday.jpg'; ?>" loading="lazy" alt="Cancer Be Glammed Best Holiday Gifts 2021">
						</picture>
					</div>
				</a>
				<div class="desc px-3">
					<div class="d-flex align-items-center justify-content-center" style="min-height:60px">
						<h4>Best Holiday Gifts</h4>
					</div>
					We answer that challenging question, "What would be a great gift for a woman coping with cancer this holiday session?" (Caregiver gifts too!)
				</div>
				<div class="d-flex justify-content-center pb-4">
					<a href="<?php echo get_option('home'); ?>/cbg-blog/cancer-be-glammeds-best-holiday-gifts-for-women-coping-with-cancer-in-2021" class="bucket-btn">Shop</a>	
				</div>				
			</div>
		</div>
	</div>


	<!--Fab Finds Slider-->

	<div class="row">
		<div class="col p-0">
			<h2 class="section-heading text-center mt-5 mb-4"><span class="fave">Shop</span> Fab Finds</h2>
			<?php /* Query */

				if (function_exists('acf_add_options_page')) :
					get_template_part('template-parts/fab-finds/fab-finds-acf');
				else :
					get_template_part('template-parts/fab-finds/fab-finds-loop');
				endif;

			?>
		</div>
	</div>


	<!-- Know & Tell -->
	<?php get_template_part('template-parts/front-page/know-and-tell'); ?>


	<!-- Blog Slider -->

	<div class="row my-4 hot-and-bloggered" style="background-color: #ebf3f3;">
		<div class="col px-5">
			<h2 class="section-heading text-spaced text-center mt-5 mb-4">Hot &amp; Bloggered<span class="sup">TM</span></h2>
			<?php get_template_part('template-parts/blog-slider'); ?>
		</div>
	</div>


	<!-- CBG TV -->
	<?php get_template_part('template-parts/front-page/cbg-tv'); ?>

	<hr class="mt-4 mb-5">


<div class="row sign-up-section mb-5">
	<div class="col">
		<a href="" data-toggle="modal" data-target="#tell-a-glam-signup" class="d-block">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/front-page/tell-a-glam-banner.jpg" alt="">
		</a>
	</div>
	<div class="col">
		<a href="https://cancerbeglammed.com/recovery-shopping-checklist">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/front-page/shopping-checklist-banner.jpg" alt="">
		</a>
	</div>
</div>


<!-- Featured In -->
<h2 class="title-section mb-2"><span>Featured In</span></h2>
<div class="row">
    <div class="featured-in">
    	<div class="featured-in--item">
    		<a href="https://www.nytimes.com/2019/09/19/well/live/cancer-patients-tell-us-about-finding-clothing-to-adapt-to-changing-bodies.html" target="_blank">
    			<picture>
    				<source srcset="<?php echo get_stylesheet_directory_uri() . '/assets/images/featured/New-York-Times-Logo.webp'; ?>" type="image/webp">
    				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/featured/New-York-Times-Logo.png'; ?>" alt="New York Times">
    			</picture>
    		</a>
    	</div>
    	<div class="featured-in--item">
    		<a href="https://www.today.com/style/gowns-scarves-designers-help-cancer-patients-recover-style-6C10931270" target="_blank">
    			<picture>
    				<source srcset="<?php echo get_stylesheet_directory_uri() . '/assets/images/featured/today-logo.webp'; ?>" type="image/webp">
    				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/featured/today-logo.jpg'; ?>" loading="lazy" alt="Today.com">
    			</picture>
    		</a>
    	</div>
    	<div class="featured-in--item">
    		<a href="https://conquer-magazine.com/issues/2019/vol-5-no-2-april-2019/953-when-losing-is-winning" target="_blank">
    			<picture>
    				<source srcset="<?php echo get_stylesheet_directory_uri() . '/assets/images/featured/conquer-logo.webp'; ?>" type="image/webp">
    				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/featured/conquer-logo.jpg'; ?>" loading="lazy" alt="Conquer Magazine">
    			</picture>
    		</a>
    	</div>
    	<div class="featured-in--item">
    		<a href="https://www.business.att.com/learn/top-voices/helping-women-recover-with-comfort-and-style.html" target="_blank">
    			<picture>
    				<source srcset="<?php echo get_stylesheet_directory_uri() . '/assets/images/featured/att-logo.webp'; ?>" type="image/webp">
    				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/featured/att-logo.png'; ?>" loading="lazy" alt="AT&T Business">
    			</picture>
    		</a>
    	</div>
    	<div class="featured-in--item">
    		<a href="https://pittsburgh.cbslocal.com/video/3874485-cancer-be-glammed-unveils-new-guidebook/" target="_blank">
    			<picture>
    				<source srcset="<?php echo get_stylesheet_directory_uri() . '/assets/images/featured/kdka-logo.webp'; ?>" type="image/webp">
    				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/featured/kdka-logo.jpg'; ?>" loading="lazy" alt="CBS Local Pittsburgh">
    			</picture>
    		</a>
    	</div>
    	<div class="featured-in--item">
    		<a href="http://broadcast-podcast.com/2018/05/31/the-broadcast-podcast-episode-39-lisa-lurie/" target="_blank">
    			<picture>
    				<source srcset="<?php echo get_stylesheet_directory_uri() . '/assets/images/featured/broadcast-logo.webp'; ?>" type="image/webp">
    				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/featured/broadcast-logo.jpg'; ?>" loading="lazy" alt="The Broadcast Podcast">
    			</picture>
    		</a>
    	</div>
    </div>
</div>
</div>
<?php get_footer(); ?>
