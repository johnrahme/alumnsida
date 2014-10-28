@extends('layouts.default')

@section('content')

<h1> Events</h1>

<ul>
    @foreach($events as $event)

    <li> {{link_to_route('event',$event->name, array($event->id))}} </li>

    @endforeach
</ul>
<p>{{link_to_route('new_event', 'New Event')}}</p>

@stop