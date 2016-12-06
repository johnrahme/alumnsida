(function ($) {

    $.fn.dropdownMenus = function (options) {

        var dropdownMenu = $(this), settings = $.extend({
            title: "Menu",
            format: "dropdown",
            breakpoint: 768,
            sticky: true
        }, options);

        return this.each(function () {
            dropdownMenu.find('li ul').parent().addClass('has-sub');
            if (settings.format != 'select') {
                dropdownMenu.prepend('<div id="menu-button">' + settings.title + '</div>');
                $(this).find("#menu-button").on('click', function () {
                    $(this).toggleClass('menu-opened');
                    var mainmenu = $(this).next('ul');
                    if (mainmenu.hasClass('open')) {
                        mainmenu.hide().removeClass('open');
                    }
                    else {
                        mainmenu.show().addClass('open');
                        if (settings.format === "dropdown") {
                            mainmenu.find('ul').show();
                        }
                    }
                });

                multiTg = function () {
                    dropdownMenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                    dropdownMenu.find('.submenu-button').on('click', function () {
                        $(this).toggleClass('submenu-opened');
                        if ($(this).siblings('ul').hasClass('open')) {
                            $(this).siblings('ul').removeClass('open').hide();
                        }
                        else {
                            $(this).siblings('ul').addClass('open').show();
                        }
                    });
                };

                if (settings.format === 'multitoggle') multiTg();
                else dropdownMenu.addClass('dropdown');
            }

            else if (settings.format === 'select') {
                dropdownMenu.append('<select style="width: 100%"/>').addClass('select-list');
                var selectList = dropdownMenu.find('select');
                selectList.append('<option>' + settings.title + '</option>', {
                    "selected": "selected",
                    "value": ""
                });
                dropdownMenu.find('a').each(function () {
                    var element = $(this), indentation = "";
                    for (i = 1; i < element.parents('ul').length; i++) {
                        indentation += '-';
                    }
                    selectList.append('<option value="' + $(this).attr('href') + '">' + indentation + element.text() + '</option>');
                });
                selectList.on('change', function () {
                    window.location = $(this).find("option:selected").val();
                });
            }

            if (settings.sticky === true) dropdownMenu.css('position', 'fixed');

            resizeFix = function () {
                if ($(window).width() > settings.breakpoint) {
                    dropdownMenu.find('ul').show();
                    dropdownMenu.removeClass('small-screen');
                    if (settings.format === 'select') {
                        dropdownMenu.find('select').hide();
                    }
                    else {
                        dropdownMenu.find("#menu-button").removeClass("menu-opened");
                    }
                }

                if ($(window).width() <= settings.breakpoint && !dropdownMenu.hasClass("small-screen")) {
                    dropdownMenu.find('ul').hide().removeClass('open');
                    dropdownMenu.addClass('small-screen');
                    if (settings.format === 'select') {
                        dropdownMenu.find('select').show();
                    }
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);

        });
    };
})(jQuery);