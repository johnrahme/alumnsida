@extends('layouts.default')
@section('content')
    Create new menu slide!

    {{Form::open(array('route'=> 'menu.store'))}}

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

        {{Form::textarea('content', '',array('class' => 'form-control','placeholder' => 'Innehåll') )}}
    </p>


    <p> {{Form::submit('Lägg till', array('class'=>'btn btn-primary'))}} </p>
    {{Form::close()}}
@stop
@section('scripts')
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