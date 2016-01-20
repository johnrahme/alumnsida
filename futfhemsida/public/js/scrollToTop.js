(function ($, document, window, viewport) {


    $(window).resize(
        viewport.changed(function () {
            if (viewport.is('<=xs')) {
                $('#screenSize').show();
            }
            else {
                $('#screenSize').hide();
            }

            console.log('Current breakpoint:', viewport.current());
        })
    );

})(jQuery, document, window, ResponsiveBootstrapToolkit);

$(window).resize(
    viewport.changed(function () {

    }));

$(function () {
    $('#screenSize1').removeClass('hidden');
});


$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    $('.scrollToTop').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

});


