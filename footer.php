<div class="modal fade" id="tell-a-glam-signup" tabindex="-1" role="dialog" aria-labelledby="tell-a-glam-signup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content footer-signup">
            <div class="modal-close" data-dismiss="modal"><i class="fas fa-times"></i></div>
            <div class="d-flex justify-content-center">
                <div style="border: 1px solid #ccc; padding: 10px;">
                    <div>
                        <img src="https://cancerbeglammed.com/wp-content/uploads/2017/12/Tell-A-Glam-Subscribe.jpg" alt="Tell A Gram Signup"/>
                    </div>
                    <div>
                    <?php echo do_shortcode('[mc4wp_form id="4626"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	<footer id="wpo-footer" class="wpo-footer">

        <div class="wpo-footer-center">
			<div class="container">
                <div class="footer-center">
                    <div class="row container">
                        <div class="col-md-3 col-sm-6">
                            <?php dynamic_sidebar('cbg-footer-col-1'); ?>
                        </div>
                        <div class="col-md-5 col-sm-6">
                            <?php dynamic_sidebar('cbg-footer-col-2'); ?>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <?php dynamic_sidebar('cbg-footer-col-3'); ?>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <?php dynamic_sidebar('cbg-footer-col-4'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md mx-auto">
                            <div class="text-center">
                                <a href="https://www.facebook.com/CancerBeGlammed?fref=ts"><img src="https://cancerbeglammed.com/wp-content/uploads/2015/04/facebook.png" style="height: 28px;"></a>
                                <a href="https://twitter.com/CancerBeGlammed"><img src="https://cancerbeglammed.com/wp-content/uploads/2015/04/twitter.png" style="height: 28px;"></a>
                                <a href="https://www.youtube.com/channel/UCLGHhbTCcYGrED__CkpUHqg"><img src="https://cancerbeglammed.com/wp-content/uploads/2015/04/you-tube.png" style="height: 28px;"></a>
                                <a href="https://www.pinterest.com/cancerbeglammed/"><img src="https://cancerbeglammed.com/wp-content/uploads/2015/04/pinterest.png" style="height: 28px;"></a>
                                <a href="https://instagram.com/cancerbeglammed"><img src="https://cancerbeglammed.com/wp-content/uploads/2015/04/instagram.png" style="height: 28px;"></a>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>

	</footer>    

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(document).on('click', '.mobile-menu-toggle', function() {
                $('.mobile-nav').addClass('open');
            })

            $(document).on('click', '.mobile-menu-close', function() {
                $('.mobile-nav').removeClass('open');
            })
        })
    </script>

	<?php wp_footer(); ?>
</body>
</html>