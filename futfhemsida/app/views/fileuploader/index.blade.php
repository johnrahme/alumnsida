@extends('layouts.default')

@section('content')

        <!DOCTYPE html>
<html lang="sv">
<body>
<div class="container">
    <h2>Välj mapp</h2>

    <div class="container">
        <p>
            <a href="<?php echo url('files/notes', $parameters = array(), $secure = null); ?>" class="btn btn-warning btn-lg">
                <span class="glyphicon glyphicon-folder-open"></span> Anteckningar
            </a>
            <a href="<?php echo url('files/document', $parameters = array(), $secure = null); ?>" class="btn btn-warning btn-lg">
                <span class="glyphicon glyphicon-folder-open"></span> Dokument
            </a>
            <a href="<?php echo url('files/img', $parameters = array(), $secure = null); ?>" class="btn btn-warning btn-lg">
                <span class="glyphicon glyphicon-folder-open"></span> Bilder
            </a>
            <a href="<?php echo url('files/other', $parameters = array(), $secure = null); ?>" class="btn btn-warning btn-lg">
                <span class="glyphicon glyphicon-folder-open"></span> Övrigt
            </a>
        </php>
    </div>
</div>

</body>
</html>

@stop

@section('scripts')
    <script language="javascript">
        // myDropzone is the configuration for the element that has an id attribute
        // with the value my-dropzone (or myDropzone)
        Dropzone.options.myDropzone = {
            init: function () {
                this.on("addedfile", function (file) {
                    var removeButton = Dropzone.createElement('<a class="dz-remove">Remove file</a>');
                    var _this = this;
                    removeButton.addEventListener("click", function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        var fileInfo = new Array();
                        fileInfo['name'] = file.name;
                        $.ajax({
                            type: "POST",
                            url: "{{ url('/delete-image') }}",
                            data: {file: file.name},
                            beforeSend: function () {
                                // before send
                            },
                            success: function (response) {

                                if (response == 'success')
                                    alert('deleted');
                            },
                            error: function () {
                                alert("error");
                            }
                        });
                        _this.removeFile(file);
                        // If you want to the delete the file on the server as well,
                        // you can do the AJAX request here.
                    });
                    // Add the button to the file preview element.
                    file.previewElement.appendChild(removeButton);
                });
            }
        };
    </script>
@stop