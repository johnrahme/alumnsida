@extends('layouts.default')

@section('content')
	<h1> Skapa nytt konto!</h1>

    @include('common.users_errors')
	{{Form::open(array('url'=> 'admin/create/reg','files'=>true))}}

		<p>
		{{Form::label('username', 'Användarnamn')}} <br/>

		{{Form::text('username')}}

	</p>
	<p>
		{{Form::label('email', 'Email:')}} <br/>
		
		{{Form::text('email')}}
	</p>

    <p>
        {{Form::label('password', 'Lösenord')}} <br/>

        {{Form::password('password')}}

    </p>

    {{Form::hidden('level', 1)}}

	<p> {{Form::submit('Skapa konto')}} </p>
	{{Form::close()}}
	
@stop