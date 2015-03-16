@extends('layouts.default')

@section('content')
	<h1> Återställ lösenord</h1>

    @include('common.users_errors')
    Kom ihåg att ändra lösenordet så snart du loggat in.

	{{Form::open(array('route'=> 'recover','method' => 'put'))}}
	<p>
		{{Form::label('email', 'Email:')}} <br/>
		
		{{Form::text('email')}}
	</p>

	<p> {{Form::submit('Skicka nytt lösenord')}} </p>
	{{Form::close()}}


@stop
