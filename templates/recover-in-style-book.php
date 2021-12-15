<?php /* Template Name: Recover In Style */ ?>

<?php get_header();?>

<div id="wpo-mainbody" class="container wpo-mainbody">
	<div class="row">
		<!-- MAIN CONTENT -->
		<div id="wpo-content" class="wpo-content sidebar-left col section">
			<h2 class="title-section"><span>Our Guidebook</span></h2>
			<div class="row">
				<div class="col">
					<img loading="lazy" class="d-block mx-auto" src="<?php bloginfo('url');?>/wp-content/uploads/2019/04/the-guide-graphic.png" alt="" width="600" height="126" srcset="<?php bloginfo('url');?>/wp-content/uploads/2019/04/the-guide-graphic.png 600w, <?php bloginfo('url');?>/wp-content/uploads/2019/04/the-guide-graphic-300x63.png 300w" sizes="(max-width: 600px) 100vw, 600px">
				</div>
			</div>

			<div class="row my-4 pt-3" style="border-top: 1px solid #eee">
				<div class="col">
					<?php get_template_part('inc/recover-slider'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<p>Introducing Cancer Be Glammed: The Guide, a one-of-a-kind guide, that prepares women, facing all forms of cancer, for the most common appearance-related questions and concerns. These include surgical changes, hair loss, weight fluctuations, wardrobe issues, skin care, and much more. Featuring cancer survivors, this magazine-style guide empowers women to tackle day-to-day recovery challenges while maintaining their dignity, self-esteem, and personal style.</p>
				</div>
			</div>

			<div class="row no-gutters mb-4">
				<div class="col-md">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/recover-book/my-hair.jpg" alt="">
				</div>
				<div class="col-md">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/recover-book/stay-strong.jpg" alt="">
				</div>
				<div class="col-md">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/recover-book/recover-in-style.jpg" alt="">
				</div>
			</div>

			<div class="row" >
				<div class="col-md py-3" style="border-top: 1px solid #eee">
					<div style="text-align: center;">
					<div style="font-weight: bold; font-size: 250%; color: #01b0ce;">TO ORDER</div>
					<div style="font-weight: bold; color: #db6ba2;"><span style="font-size: 125%;">$18.00</span> (includes tax &amp; shipping)</div>
					<div><strong>72 Full Color Pages • Measures 9” x 6”</strong></div>
					<div>The perfect size for a purse or tote bag.</div>
					<div id="rule-wrap">
					<hr class="small">
					</div>
					<div style="margin-top: 10px;">Bulk pricing &amp; custom orders available.</div>
					<div id="guide-contact-button"><a id="guide-button" href="https://cancerbeglammed.com/contact">Contact Us</a></div>
					</div>					
				</div>
			</div>

			<h2 class="title-section"><span>Purchase</span></h2>

			<div class="row">
				<div class="col">
					<p style="text-align: center;">All payments are managed through Paypal. You will be directed to a Paypal form where you can:</p>
					<p style="text-align: center;">• Pay directly if you have an account<br>
					-or-<br>
					• Select the button marked “pay with debit or credit card”</p>		
					<div class="paypal-button"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="2HY92LF3YS8YY">
						<input type="submit" class="paypal-submit d-block mx-auto mb-4" name="submit" value="Purchase">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>
					</div>		
				</div>
			</div>

			<h2 class="title-section"><span>Contribute</span></h2>

			<div class="row">
				<div class="col">
					<p class="text-center">For contributions or sponsorships, please use the link below:</p>
					<div class="paypal-button">
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="6B9Q6FE2GN5X2">
						<input type="submit" name="submit" class="paypal-submit d-block mx-auto mb-4" value="Contribute">
						</form>
					</div>

					<p style="text-align: center;">Your contribution will help get <em>Cancer Be Glammed: The Guide</em> into<br>
					the hands of more women struggling with cancer recovery. Thank you for your generosity and support.</p>
					<p style="text-align: center; color: #00c9f0;"><strong>(Contributions are not tax deductible)</strong></p>
				</div>
			</div>
		</div>
		<!-- //END MAINCONTENT -->
	</div>
</div>

<?php get_footer(); ?>
