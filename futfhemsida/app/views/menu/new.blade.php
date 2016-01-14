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
    {{ HTML::script('js/menu/menu.js')}}

@stop