
$(document).ready(function() {
	$('.dropdown-main').click(function(event) {
		$(this).next().toggle();
	});
});