var ww = document.body.clientWidth;

$(document).ready(function () {
    $(".toggleMenu").click(function (e) {
        $(this).toggleClass("active");
        $(".sidemenupanel").toggle();
    });
    adjustMenu();
})

$(window).bind('resize orientationchange', function () {
    ww = document.body.clientWidth;
    adjustMenu();
});

var adjustMenu = function () {
    if (ww >= 0 ) {
        $(".toggleMenu").css("display", "none");
        $(".sidemenupanel").show();
        $(".sidemenupanel li").removeClass("hover");
        $(".sidemenupanel li a").unbind('click');
        $(".sidemenupanel li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function () {
            $(this).toggleClass('hover');
        });
    }
}

