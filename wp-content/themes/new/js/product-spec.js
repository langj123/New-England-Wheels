jQuery(document).ready(function( $ ) {

	var button = $('.features-list button'),
	tHeight = $('.features-table table').height(),
	tCont = $('.features-table'),
	done = false,
	duration = 500;

	// unhide and grow the container to the height of the table within
	button.click(function(){

		if (done == false) {
			tCont.animate({
				height : tHeight
			}, duration);
			done = true;
		} else {
			tCont.animate({
				height : 0
			}, duration);
			done = false;
		}

	});
});