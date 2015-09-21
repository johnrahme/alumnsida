@extends('layouts.default')

@section('content')
    <h1> Editing {{{$user->name}}}</h1>

    @include('common.users_errors')

    {{Form::open(array('url'=> 'users/update', 'method' => 'put'))}}

    <p>
        {{Form::label('name', 'Förnamn')}} <br/>

        {{Form::text('name', $user->name)}}

    </p>
    <p>
        {{Form::label('surname', 'Efternamn')}} <br/>

        {{Form::text('surname', $user->surname)}}

    </p>
    <p>
        {{Form::label('email', 'Email:')}} <br/>

        {{Form::text('email', $user->email,array('class' => 'form-control','placeholder' => 'email@example.com') )}}
    </p>

    <p>
        {{Form::label('tel', 'Telefon')}} <br/>

        {{Form::input('tel', 'tel', $user->tel)}}

    </p>

    <p>
        {{Form::label('startYear', 'Startår')}} <br/>

        {{Form::input('number', 'startYear', $user->startYear)}}

    </p>

    <p>
        {{Form::label('company', 'Företag')}} <br/>

        {{Form::text('company', $user->company)}}

    </p>

    <p>
        {{ Form::file('image')}} <br/>
    </p>

    {{Form::hidden('id', $user->id)}}
    <p>{{ Form::submit('Update user') }}</p>

    {{ Form::close()}}

@stop
