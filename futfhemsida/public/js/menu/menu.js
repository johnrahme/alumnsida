
$('#name').on("keyup",function(){
    update();
});
$('#parent').change(function(){
   update();
});

function update(){
    if($('#parent').val()!=''){
        var id = $('#parent').children(":selected").attr("id");
        $('#url').val((id+'/'+$('#name').val()).toLocaleLowerCase());
    }
    else {
        $('#url').val($('#name').val().toLowerCase());
    }
}