@extends('layouts.default')

@section('content')
    <h1> Add new user </h1>

    @include('common.users_errors')
    {{Form::open(array('url'=> 'users/create','files'=>true))}}

    <p>
        {{Form::label('name', 'Förnamn')}} <br/>

        {{Form::text('name')}}

    </p>
    <p>
        {{Form::label('surname', 'Efternamn')}} <br/>

        {{Form::text('surname')}}

    </p>
    <p>
        {{Form::label('email', 'Email:')}} <br/>

        {{Form::text('email', '',array('class' => 'form-control','placeholder' => 'email@example.com') )}}
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

    <p>
        {{ Form::file('image')}} <br/>
    </p>

    <p> {{Form::submit('Add user')}} </p>
    {{Form::close()}}

@stop