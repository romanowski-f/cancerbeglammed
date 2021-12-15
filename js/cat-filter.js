jQuery(document).ready(function() {
jQuery('.post-slide-item').on('click', function(e) {
  e.preventDefault();
  jQuery('.post-slide-item').removeClass('active');
  jQuery(this).addClass('active');

  jQuery('#blog-slider .carousel-inner').addClass('hide-slide');
  console.log('click');

  jQuery.ajax({
    type: 'POST',
    url: ajaxurl,
    cache: false,
    dataType: 'html',
    data: {
      action: 'filter_posts',
      category: jQuery(this).data('slug'),
    },
    success: function(res) {
      jQuery('#blog-slider .carousel-inner').empty();

      var carouselItem = '<div class="carousel-item active">';
          carouselItem += '<div class="row blog-first-slide no-gutters">';

      var carouselEnd = '</div></div>';

      var result = carouselItem + res + carouselEnd;
      jQuery('#blog-slider .carousel-inner').html(result).removeClass('hide-slide');
      console.log(jQuery('#blog-slider .carousel-item').length);

      var count = 0;
      var active = '';
      jQuery('#blog-slider .carousel-indicators').empty();
      jQuery('#blog-slider .carousel-item').each(function() {
        active = (count == 0) ? 'active' : '';
        jQuery('#blog-slider .carousel-indicators').append('<li data-target="#blog-slider" data-slide-to="' + count + '" class="' + active + '"></li>')
        count++;
      })
    },
    error: function(e) {
      console.log('fail');
      console.log(e);
    }
  })
})
})


