jQuery(document).ready(function($) {
	$.each(accordion_shortcode, function(id, attr) {
		$("#" + id).accordion(attr);
	});
});