$(document).ready(function() {
    $('.parent').click(function() {
        $('.sub-nav').toggleClass('visible');
    });

    $('.sub-nav').click(function() {
        $('.sub-sub-nav').toggleClass('visible');
    });
});
