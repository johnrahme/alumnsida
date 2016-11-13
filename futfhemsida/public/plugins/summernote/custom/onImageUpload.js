function onImageUpload(folder,url) {
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 400,
            minHeight: 400,
            //maxHeight: 400,
            callbacks: {
                onImageUpload: function (image) {
                    //alert(JSON.stringify(image));

                    sendFile(image[0]);
                },
                onKeyup: function (e) {

                    $("#desc").html($('#col').summernote('code'));
                }
            }

        });

    });
    function sendFile(image) {
        var data = new FormData();
        data.append("image", image);
        data.append("test", "test");
        alert(url);
        $.ajax({
            method: "POST",
            data: data,
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            success: function (url) {
                var imgNode = $('<img>').attr('src', url);
                $('.summernote').summernote('insertNode', imgNode[0]);  // insert native dom
                alert(url);
            },
            error: function (e) {
                alert(e.responseText);
            }
        });
    }

}
/**
 * Created by John Stationary on 11/13/2016.
 */
