@extends('layouts.default')

@section('content')
	<h1> Login</h1>

    @include('common.users_errors')
	{{Form::open(array('route'=> 'sessions.store','files'=>true))}}
	<p>
		{{Form::label('email', 'Email:')}} <br/>
		
		{{Form::text('email')}}
	</p>

    <p>
        {{Form::label('password', 'Lösenord')}} <br/>

        {{Form::password('password')}}

    </p>
    {{link_to_route('forgot', 'Glömt lösenord')}}

	<p> {{Form::submit('Login')}} </p>
	{{Form::close()}}


@stop
