@extends('layouts.default')

@section('content')

<h1> {{{$event->name}}}</h1>

<h1> {{{$event->description}}}</h1>

<h1> {{{$event->dateTimeFrom}}}</h1>

<h1> {{{$event->dateTimeTo}}}</h1>

<h1> {{{$event->place}}}</h1>

{{--<span>
    {{link_to_route('users', 'Users')}}|
    {{ link_to_route('edit_user', 'Edit', array($user->id)) }}

    {{ Form::open(array('url'=>'users/delete', 'method' =>'DELETE')) }}
    {{ Form::hidden('id', $user->id)}}
    {{ Form::submit('Delete') }}
    {{ Form::close() }}

    </span>--}}

@stop