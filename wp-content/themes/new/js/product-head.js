jQuery(document).ready(function( $ ) {

	var prodDesc = $('.product-head-desc'),
	prodTitle  = $('.section-head .product-title'),
	imageCont = $('.section-head .image-container'),
	finished = false,
	duration = 400,
	delay = 520;

	var headerAnimate = (function(){
			var intv = setInterval(function(){
				// add class to :before, creates "animation" of expanding color overlay. Hooked into .image-container.animate, line 1047 of style.css
				imageCont.addClass(function(index){
					finished = true;
					return "animate";
				});
				// fade in header and description
				if (finished === true) {

					prodDesc.fadeIn(duration, function(){
						prodDesc.addClass("animate");
						// add class product-title to animate in icons, see line 1354 of style.css
						prodTitle.addClass("animate");
					});

				clearInterval(intv);
				
				}

			}, delay);
	})();

});