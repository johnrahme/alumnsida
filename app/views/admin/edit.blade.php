@extends('layouts.default')

@section('content')
	<h1> Create new User</h1>

    @include('common.users_errors')
	{{Form::open(array('url'=> 'admin/update','method'=>'put'))}}

		<p>
		{{Form::label('username', 'Användarnamn')}} <br/>

		{{Form::text('username', $admin->username)}}

	</p>
	<p>
		{{Form::label('email', 'Email:')}} <br/>
		
		{{Form::text('email',$admin->email)}}
	</p>

    <p>
        {{Form::label('password', 'Nytt lösenord')}} <br/>

        {{Form::password('password', '')}}

    </p>

    <p>
        {{Form::label('level', 'Level')}}
        {{Form::select('level', array('1' => '1', '2' => '2'), '1')}}
    </p>

    {{Form::hidden('id',$admin->id)}}
	
	<p> {{Form::submit('Uppdatera')}} </p>

	{{Form::close()}}
	
@stop