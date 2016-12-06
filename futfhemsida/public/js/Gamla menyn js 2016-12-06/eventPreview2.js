var d = new Date($("#dateTimeFrom").val());
var d2 = new Date($("#dateTimeTo").val());
$("#header").text($('#name').val());
$("#date").text(d.toLocaleDateString() + ' Kl. ' + d.toLocaleTimeString('en-GB'));
alert('test');
$("#desc").html($('#col').code());
$("#date2").text(d.toLocaleDateString() + ' Kl. ' + d.toLocaleTimeString() + " - " + d2.toLocaleDateString() + ' Kl. ' + d2.toLocaleTimeString());
$("#location").text($('#place').val());

if ($("#reg").prop('checked') == false) {
    $("#register").hide();
    $("#registrations").hide();
}


$(".form-control")
    .change(function () {
        d = new Date($("#dateTimeFrom").val());
        var d2 = new Date($("#dateTimeTo").val());
        $("#header").text($("#name").val());
        $("#date").text(d.toLocaleDateString() + ' Kl. ' + d.toLocaleTimeString());
        $("#date2").text(d.toLocaleDateString() + ' Kl. ' + d.toLocaleTimeString() + " - " + d2.toLocaleDateString() + ' Kl. ' + d2.toLocaleTimeString());
        $("#location").text($('#place').val());

    });
$(".check-box")
    .change(function () {
        if ($("#reg").prop('checked') == false) {
            $("#register").hide();
            $("#registrations").hide();
        }
        else {
            $("#register").show();
            $("#registrations").show();
        }
    });