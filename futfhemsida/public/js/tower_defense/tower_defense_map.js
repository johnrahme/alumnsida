$(document).ready(function(){
    $(window).resize(function(){
        if ($(window).width() < 978) {
            document.getElementById('to_small_window').style.display = "none";
        }
        else {
            document.getElementById('to_small_window2').style.display = "none";
        }
    }).resize();
});