if ($(window).width() >= 768) {
    $('li.dropdownMenu, button.testa_mig').hover(function () {
        var dropUl = $(this).find('.dropdown-fade');
        dropUl.hide();
        dropUl.stop(true, true).fadeIn(0);
        var id = $(this).attr('id');
        var dropB = $("[role='menu']");
        if (dropB.attr('aria-labelledby') == id) {
            dropB.hide();
            dropB.stop(true, true).fadeIn(0);
        }

    }, function () {
        $(this).find('.dropdown-fade').stop(true, true).fadeOut(2000);
        var id = $(this).attr('id');
        var dropB = $("[role='menu']");
        if (dropB.attr('aria-labelledby') == id) {
            dropB.stop(true, true).fadeOut(200);
        }

    });
}