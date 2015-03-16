@extends('layouts.default')

@section('content')
	<h1> Skapa nytt konto!</h1>

    @include('common.users_errors')
	{{Form::open(array('url'=> 'admin/create/reg','files'=>true))}}

    Personuppgifter
		<p>
		{{Form::label('name', 'Förnamn')}} <br/>

		{{Form::text('name')}}

	</p>
    <p>
        {{Form::label('surname', 'Efternamn')}} <br/>

        {{Form::text('surname')}}

    </p>

    <p>
        {{Form::label('tel', 'Telefon')}} <br/>

        {{Form::input('tel', 'tel')}}

    </p>

    <p>
        {{Form::label('startYear', 'Startår')}} <br/>

        {{Form::input('number', 'startYear')}}

    </p>

    <p>
        {{Form::label('company', 'Företag')}} <br/>

        {{Form::text('company')}}

    </p>
	Till Inloggningen
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
    <p>
    {{Form::checkbox('agreement')}} Jag godkänner att andra alumner tar del av min information.
    </p>
	<p> {{Form::submit('Skapa konto')}} </p>
	{{Form::close()}}
	
@stop