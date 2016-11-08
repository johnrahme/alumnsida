var d = new Date($("#dateTimeFrom").val());
var d2 = new Date($("#dateTimeTo").val());
$("#header").text($('#name').val());
$("#date").text(d.toLocaleDateString() + ' Kl. ' + d.toLocaleTimeString('se-SWE'));
$("#desc").html($('#col').html());
$("#date2").text(d.toLocaleDateString() + ' Kl. ' + d.toLocaleTimeString('se-SWE') + " - " + d2.toLocaleDateString() + ' Kl. ' + d2.toLocaleTimeString('se-SWE'));
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
        $("#date").text(d.toLocaleDateString() + ' Kl. ' + d.toLocaleTimeString('se-SWE'));
        $("#date2").text(d.toLocaleDateString() + ' Kl. ' + d.toLocaleTimeString('se-SWE') + " - " + d2.toLocaleDateString() + ' Kl. ' + d2.toLocaleTimeString('se-SWE'));
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