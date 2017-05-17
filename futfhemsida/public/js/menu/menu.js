$('#name').on("keyup", function () {
    update();
});
$('#parent').change(function () {
    update();
});

$('#grandparent').change(function () {
    update();
});

function update() {

    if ($('#grandparent').val() != '') {

        var id = $('#grandparent').children(":selected").attr("id");
        $('#url').val((id + '/' + $('#name').val()).toLocaleLowerCase().replace(/\s+/g, ''));
    }

    else if ($('#parent').val() != '') {
        var id = $('#parent').children(":selected").attr("id");
        $('#url').val((id + '/' + $('#name').val()).toLocaleLowerCase().replace(/\s+/g, ''));
    }
    else {
        $('#url').val($('#name').val().toLowerCase().replace(/\s+/g, ''));
    }
}
