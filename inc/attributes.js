/*
*
*
*
*
*/
// -------------------------------------------------------------- //
// -------------------- Select Attributes ----------------------- //
// -------------------------------------------------------------- //
jQuery(document).ready(function($) {
	var activeColor = '';
	$(document).on('change', '.attribute-radio-button', function() {
	  $('select[name="'+$(this).attr('name')+'"]').val($(this).val()).trigger('change');
	  activeColor = $(this).parent().find('.attribute-name').attr('data-name');
	  if ($(this).parent().hasClass('.pa_color')) {
	  	$('.color-name').html(activeColor);
	  }
	});


	$(document).on('mouseenter', '.pa_color.attribute-icon', function() {
		name = $(this).find('.attribute-name').attr('data-name');
		$('.color-name').html(name);
	})

	$(document).on('mouseleave', '.pa_color.attribute-icon', function() {
		$('.color-name').html(activeColor);
	})

});