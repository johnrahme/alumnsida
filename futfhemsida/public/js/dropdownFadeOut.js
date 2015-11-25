if($(window).width()>=766){
    $('li.dropdown, button.dropdown-toggle').hover(function() {
        var dropUl = $(this).find('.dropdown-fade');
        dropUl.hide();
        dropUl.stop(true, true).fadeIn(0);
        var id = $(this).attr('id');
        var dropB = $("[role='menu']");
        if(dropB.attr('aria-labelledby')==id){
            dropB.hide();
            dropB.stop(true, true).fadeIn(0);
        }

    }, function() {
        $(this).find('.dropdown-fade').stop(true, true).fadeOut(200);
        var id = $(this).attr('id');
        var dropB = $("[role='menu']");
        if(dropB.attr('aria-labelledby')==id){
            dropB.stop(true, true).fadeOut(200);
        }

    });
}
