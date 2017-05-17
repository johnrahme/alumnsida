@extends('layouts.default')
@section('styles')

    {{ HTML::style('plugins/summernote/css/summernote.css') }}
    {{ HTML::style('plugins/summernote/css/css/font-awesome.min.css') }}
@stop
@section('content')
    @include('common.news_errors')

    <p>Tips på layouthjälp <a href="http://www.layoutit.com/build">här</a>. Designa hur du vill att menyn ska se ut,
        välj "Download", sedan "continue non logged". Väl där, kopiera koden, gå tillbaka till denna sida, tryck på
        "Code View" i texeditorn, och klistra in den kopierade koden.</p>

    {{Form::open(array('route'=> 'menu.update','files'=>true,'id'=>'form1','method'=>'put'))}}

    <p>
        {{Form::label('name', 'Namn', array('class' => 'required'))}} <br/>

        {{Form::text('name', $currMenu->name,array('class' => 'form-control','placeholder' => 'Namn') )}}

    </p>
    <p>
        {{Form::label('parent', 'Övermeny')}} <br/>
        <select class="form-control" id="parent" name="parent"
                @if(!$bottom) disabled @endif> {{--Disable if the menu has children --}}
            <option value="">Ingen</option>
            @foreach($menus as $menu)
                @if(!( $type == 0 && $menu->id == $currMenu->id)) {{--Remove the menu that is being changed--}}
                <option @if($menu->name == $firstName) selected @endif id="{{$menu->url}}"
                        value="{{$menu->id}}">{{$menu->name}}</option>
                @endif
            @endforeach
        </select>

    </p>
    <p>
        {{Form::label('grandparent', 'Övermeny 2')}} <br/>
        <select class="form-control" id="grandparent" name="grandparent" @if(!$bottom) disabled @endif>
            <option value="">Ingen</option>
        </select>

    </p>
    <p>
        {{Form::label('url', 'Länk', array('class' => 'required'))}} <br/>

        {{Form::text('url',  $currMenu->url,array('class' => 'form-control','placeholder' => 'länk') )}}

    </p>

    <p>
        {{Form::label('online', 'Ska menyn vara online?', array('class' => 'required'))}}<br/>
        {{Form::radio('online', '0', array('class' => 'form-control') )}}
        <b>Nej.</b>
        <br/>
        {{Form::radio('online', '1', array('class' => 'form-control') )}}
        <b>Ja.</b>
    </p>

    <p>
        {{Form::label('content', 'Innehåll', array('class' => 'required'))}} <br/>

    <div class="summernote" id="col"> {{$currMenu->content}}</div>
    {{Form::hidden('content')}}
    </p>


    <button id="save" class="btn btn-primary" onclick="save()" type="button">Uppdatera</button>
    {{Form::hidden('id', $currMenu->id)}}
    {{Form::hidden('type', $type)}}
    {{Form::close()}}
@stop
@section('scripts')

    {{HTML::script('plugins/summernote/js/summernote.min.js')}}
    {{HTML::script('plugins/summernote/custom/onImageUpload.js')}}
    <script>
        {{--When uploading an image save it in the folder event--}}

       onImageUpload("filesOwncloud/styrelsen/files/images/menus", "{{url('events/imgstore')}}");
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
                        @if(!( $type == 1 && $submenu->id == $currMenu->id)) {{--Remove the menu that is being changed--}}
                            currentTest = "{{$submenu->menuId}}";
                            if (currentTest == currParentId) {
                                $('#grandparent')
                                .append($("<option></option>")
                                .attr("id", "{{$submenu->url}}")
                                .attr("value", "{{$submenu->id}}")
                                @if($submenu->name == $secondName)
                                    .attr("selected", "")
                                @endif
                                .text("{{$submenu->name}}"));
                        }
                        @endif
                @endforeach
            }
        }
    </script>
    {{ HTML::script('js/menu/menu.js')}}

@stop