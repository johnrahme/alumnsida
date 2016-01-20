@extends('layouts.default')

@section('content')

 @include('common.events_errors')
{{Form::open(array('url'=> 'news/store','files'=>true, 'id'=>'form1'))}}
    <p>
        {{Form::label('name', 'Titel', array('class' => 'required'))}} <br/>

        {{Form::text('name', '', array('class'=>'form-control'))}}

    </p>

    <p>
            {{Form::label('content', 'Innehåll', array('class' => 'required'))}} <br/>

            {{Form::textarea('content', '', array('class'=>'form-control'))}}

        </p>

    <p>
            {{Form::label('author', 'Författare', array('class' => 'required'))}} <br/>

            {{Form::text('author', '', array('class'=>'form-control'))}}

        </p>

{{Form::submit('Skapa Nyhet', array('class' => 'btn btn-success'))}}
{{Form::close()}}
@stop

@section('scripts')

@stop