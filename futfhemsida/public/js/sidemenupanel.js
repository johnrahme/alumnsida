(function ($) {
    $.fn.menumaker = function (options) {
        var sidemenuPanel = $(this), settings = $.extend({
            format: "multitoggle",
            sticky: false
        }, options);
        return this.each(function () {
            sidemenuPanel.find('ul li').has('li').addClass('has-sub');
            multiTg = function () {
                sidemenuPanel.find(".has-sub").prepend('<span class="submenu-button"></span>');
                sidemenuPanel.find('.submenu-button').on('click', function () {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').slideToggle();
                    }
                    else {
                        $(this).siblings('ul').addClass('open').slideToggle();
                    }
                });
            };
            if (settings.format === 'multitoggle') multiTg();

            resizeFix = function () {
                sidemenuPanel.find('ul').show();
                sidemenuPanel.find('li ul').hide().removeClass('open');
            };
            resizeFix();
            return $(window).on('resize', resizeFix);
        });
    };
})(jQuery);

(function ($) {
    $(document).ready(function () {
        $("#sidemenuPanel").menumaker({
            format: "multitoggle"
        });
    });
})(jQuery);
