// Check window width
function checkWidth() {
	var mobile;
    windowSize = window.innerWidth;
    if (windowSize < 800)   mobile = true;
    else                    mobile = false;

    return mobile;
    console.log('Mobile: ' + mobile);
}

// ------------------ Adjust slider height based on slide content
// function normalizeSlideHeights() {
//     jQuery('.carousel').each(function(){
//       var items = jQuery('.carousel-item', this);
//       console.log(items);
//       // reset the height
//       items.css('min-height', 0);
//       // set the height
//       var maxHeight = Math.max.apply(null, 
//           items.map(function(){
//               return jQuery(this).outerHeight()}).get() );
//       items.css('min-height', maxHeight + 'px');
//     })
// }

// jQuery(window).on(
//     'load resize orientationchange', 
//     normalizeSlideHeights);



jQuery(document).ready(function($) {

/*
*
*
*
*
*/
// -------------------------------------------------------------- //
// ----------------------- In Viewport -------------------------- //
// -------------------------------------------------------------- //
	$.fn.isInViewport = function(diff) {
		if (diff == null) {
			diff = 0;
		}

		var elementTop = $(this).offset().top + diff;
		var elementBottom = elementTop + $(this).outerHeight();
		var viewportTop = $(window).scrollTop();
		var viewportBottom = viewportTop + $(window).height();
		return elementBottom > viewportTop && elementTop < viewportBottom;
	};


	function revealElement(element, className, trigger) {
		if (element.length && element.isInViewport(trigger)) {
			element.removeClass(className);
		}
	}

	const hidden = $('.anim-hide');
	const animTrigger = $('.anim-trigger');
	$(window).on('load scroll resize', function() {

		// Show sticky header
		if ($(window).scrollTop() > 120) $('.sticky').addClass('show');
		else 							 $('.sticky').removeClass('show');

		// Viewport Trigger
		let viewportTrigger = window.innerHeight * 0.3;
		if (checkWidth()) {
			viewportTrigger = window.innerHeight * 0.1;
		} 
		

		hidden.each(function(item) {
			if ($(this).length && $(this).isInViewport(viewportTrigger)) {
				var elementAnim = $(this).attr('data-anim');

				if (elementAnim != undefined) {
					$(this).addClass(elementAnim).addClass('animate__animated');
				} else {
					$(this).addClass('fade-in slow');
				}

				$(this).removeClass('anim-hide');
			}
		})

		animTrigger.each(function(item) {
			if ($(this).length && $(this).isInViewport(viewportTrigger)) {
				let animChild = $(this).find('.anim-child');

				animChild.each(function(item) {
					var elementAnim = $(this).attr('data-anim');

					if (elementAnim != undefined) {
						$(this).addClass(elementAnim).addClass('animate__animated');
					} else {
						$(this).addClass('fade-in slow');
					}

					$(this).removeClass('anim-child');				
				})

				$(this).removeClass('anim-trigger')
			}
		})		

	})

})