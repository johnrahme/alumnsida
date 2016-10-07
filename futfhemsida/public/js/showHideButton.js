$(document).ready(function() {
    $('#toggle1').click(function() {
        $('#hideAndShow').slideToggle('slow');
        var src = $("#bg").attr('src') == "http://i67.tinypic.com/15ias5i.jpg" ? "http://i64.tinypic.com/jqhxer.jpg" : "http://i67.tinypic.com/15ias5i.jpg";
        $("#bg").attr('src', src);
        return false;

    });
});