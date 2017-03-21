@extends('layouts.default')
@section('styles')

    {{ HTML::style('plugins/summernote/css/summernote.css') }}
    {{ HTML::style('plugins/summernote/css/css/font-awesome.min.css') }}
@stop
@section('content')
    @include('common.menu_errors')

    {{Form::open(array('route'=> 'menu.store','files'=>true, 'id'=>'form1'))}}

    <p>
        {{Form::label('name', 'Namn', array('class' => 'required'))}} <br/>

        {{Form::text('name', '',array('class' => 'form-control','placeholder' => 'Namn') )}}

    </p>
    <p>
        {{Form::label('parent', 'Övermeny')}} <br/>
        <select class="form-control" id="parent" name="parent">
            <option value="">Ingen</option>
            @foreach($menus as $menu)
                <option id="{{$menu->url}}" value="{{$menu->id}}">{{$menu->name}}</option>
            @endforeach
        </select>

    </p>
    <p>
        {{Form::label('grandparent', 'Övermeny 2')}} <br/>
        <select class="form-control" id="grandparent" name="grandparent">
            <option value="">Ingen</option>
        </select>

    </p>
    <p>
        {{Form::label('url', 'Länk', array('class' => 'required'))}} <br/>

        {{Form::text('url', '',array('class' => 'form-control','placeholder' => 'länk') )}}

    </p>

    <p>
            {{Form::label('content', 'Innehåll', array('class' => 'required'))}} <br/>

        <div class="summernote" id="col">{{Input::old('content')}}</div>
        {{Form::hidden('content')}}
    </p>


    <button id="save" class="btn btn-primary" onclick="save()" type="button">Lägg till</button>
    {{Form::close()}}
@stop
@section('scripts')

      {{HTML::script('plugins/summernote/js/summernote.min.js')}}
      {{HTML::script('plugins/summernote/custom/onImageUpload.js')}}
      <script>
       {{--When uploading an image save it in the folder event--}}

      onImageUpload("filesOwncloud/styrelsen/files/images/menus","{{url('events/imgstore')}}");
      </script>
       <script>

                    $("#save").click(function () {
                        $("#content").val($('#col').summernote('code'));
                        $("#form1").submit();
                    });

        </script>

    <script>
        updateGrandparent();
        $('#parent').change(function () {
            updateGrandparent();

        });
        function updateGrandparent() {
            $('#grandparent').empty();
            $('#grandparent')
                    .append($("<option></option>")
                            .attr("value", "")
                            .text("Ingen"));
            var currParentId = $('#parent').val();
            var currentTest = "";
            if (currParentId !== "") {
                @foreach($submenus as $submenu)
                  currentTest = "{{$submenu->menuId}}";
                if (currentTest == currParentId) {
                    $('#grandparent')
                            .append($("<option></option>")
                                    .attr("id", "{{$submenu->url}}")
                                    .attr("value", "{{$submenu->id}}")
                                    .text("{{$submenu->name}}"));

                }
                @endforeach


            }
        }
    </script>
    {{ HTML::script('js/menu/menu.js')}}

@stop