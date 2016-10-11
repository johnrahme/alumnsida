$(document).ready(function() {
    $('#toggle1').click(function() {
        $('#hideAndShow').slideToggle('slow');
        var src = $("#bg").attr('src') == "img/uparrow.png" ? "img/arrow.png" : "img/uparrow.png";
        $("#bg").attr('src', src);
        return false;
    });
});