(function($) {

	//add constant for translations
	const { __ } = wp.i18n;

	$(document).ready(function() {

		//tooltip display
		$(".tooltip").hover(function() {
		    $(this).closest("tr").find(".tooltip-text").fadeIn(100);
		}, function() {
		    $(this).closest("tr").find(".tooltip-text").fadeOut(100);
		});
	});

}(jQuery));