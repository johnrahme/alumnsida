@extends('layouts.default')

@section('content')

<h1> {{{$event->name}}}</h1>

<h1> {{{$event->description}}}</h1>

<h1> {{{$event->dateTimeFrom}}}</h1>

<h1> {{{$event->dateTimeTo}}}</h1>

<h1> {{{$event->place}}}</h1>

    <span>
    {{link_to_route('events', 'Events')}}|
    {{ link_to_route('edit_event', 'Edit', array($event->id)) }}|
    {{ link_to_route('new_registration', 'Register', array($event->id)) }}|

    {{ link_to_route('registrations', 'Registrations', array($event->id)) }}|
    {{link_to_route('map', 'Find on map', array($event->id))}}

    {{ Form::open(array('url'=>'events/delete', 'method' =>'DELETE')) }}
    {{ Form::hidden('id', $event->id)}}
    {{ Form::submit('Delete') }}
    {{ Form::close() }}

    </span>

@stop