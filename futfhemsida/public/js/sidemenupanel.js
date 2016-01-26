
var ww = document.body.clientWidth;

$(document).ready(function() {
	$(".sidemenupanel li a").each(function() {
		if ($(this).next().length > 0) {
			$(this).addClass("parent");
		};
	})

	$(".toggleMenu").click(function(e) {
		e.preventDefault();
		$(this).toggleClass("active");
		$(".sidemenupanel").toggle();
	});
	adjustMenu();
})

$(window).bind('resize orientationchange', function() {
	ww = document.body.clientWidth;
	adjustMenu();
});

var adjustMenu = function() {
	if (ww < 768) {
		$(".toggleMenu").css("display", "inline-block");
		if (!$(".toggleMenu").hasClass("active")) {
			$(".sidemenupanel").hide();
		} else {
			$(".sidemenupanel").show();
		}
		$(".sidemenupanel li").unbind('mouseenter mouseleave');
		$(".sidemenupanel li a.parent").unbind('click').bind('click', function(e) {
			// must be attached to anchor element to prevent bubbling
			e.preventDefault();
			$(this).parent("li").toggleClass("hover");
		});
	}
	else if (ww >= 768) {
		$(".toggleMenu").css("display", "none");
		$(".sidemenupanel").show();
		$(".sidemenupanel li").removeClass("hover");
		$(".sidemenupanel li a").unbind('click');
		$(".sidemenupanel li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
		 	// must be attached to li so that mouseleave is not triggered when hover over submenu
		 	$(this).toggleClass('hover');
		});
	}
}

