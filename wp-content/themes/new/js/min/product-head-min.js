jQuery(document).ready(function($){var a=$(".product-head-desc"),n=$(".section-head .product-title"),e=$(".section-head .image-container"),t=!1,d=400,c=520,i=function(){var i=setInterval(function(){e.addClass(function(a){return t=!0,"animate"}),t===!0&&(a.fadeIn(d,function(){a.addClass("animate"),n.addClass("animate")}),clearInterval(i))},c)}()});