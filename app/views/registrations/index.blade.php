@extends('layouts.default')

@section('content')

<h1> Registrations </h1>

<ul>
    @foreach($registrations as $registration)

    <li>
        {{ Form::open(array('url'=>'registrations/delete', 'method' =>'DELETE')) }}
        {{ Form::hidden('id', $registration->id)}}
        {{$registration->name}} {{ Form::submit('Delete') }}
        {{ Form::close() }}

    </li>

    @endforeach
</ul>
@stop