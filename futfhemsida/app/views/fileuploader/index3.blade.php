@extends('layouts.default')

@section('content')

{{ Form::open(array('url' => 'upload3', 'class'=>'dropzone', 'id'=>'my-dropzone')) }}
<div class="dz-message">
    <h4>Dra filer hit för att ladda upp.</h4>
    <span>Eller tryck för att välja fil.</span>
</div>
{{ Form::close() }}

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