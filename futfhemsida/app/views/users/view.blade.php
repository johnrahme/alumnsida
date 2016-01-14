@extends('layouts.default')

@section('content')

    <h1> {{{$user->name}}} {{{$user->surname}}} </h1>
    <h1> {{{$user->email}}} </h1>
    <h1> {{{$user->tel}}} </h1>
    <h1> {{{$user->startYear}}} </h1>
    <h1> {{{$user->company}}} </h1>

    <span>
    {{link_to_route('users', 'Users')}}|
        {{ link_to_route('edit_user', 'Edit', array($user->id)) }}

        {{ Form::open(array('url'=>'users/delete', 'method' =>'DELETE')) }}
        {{ Form::hidden('id', $user->id)}}
        {{ Form::submit('Delete') }}
        {{ Form::close() }}

    </span>

@stop