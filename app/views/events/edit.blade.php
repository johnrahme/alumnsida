@extends('layouts.default')

@section('content')

<h1> Edit Event </h1>

@include('common.events_errors')
{{Form::open(array('url'=> 'events/update','files'=>true, 'method' => 'put'))}}

<p>
    {{Form::label('name', 'Namn')}} <br/>

    {{Form::text('name', $event->name)}}

</p>
<p>
    {{Form::label('dateTimeFrom', 'Starttid')}} <br/>

    {{Form::input('datepicker', 'dateTimeFrom', $event->dateTimeFrom)}}


</p>

<p>
    {{Form::label('dateTimeTo', 'Sluttid')}} <br/>

    {{Form::input('datetime', 'dateTimeTo', $event->dateTimeTo)}}


</p>
<p>
    {{Form::label('description', 'Beskrivning')}} <br/>

    {{Form::textarea('description', $event->description)}}
</p>

<p>
    {{Form::label('place', 'Plats')}} <br/>

    {{Form::text('place', $event->place)}}

</p>


<p>
    {{Form::label('publish', 'Online')}} <br/>

    {{Form::checkbox('publish', 'Check', $event->publish)}}

</p>

<p>
    {{Form::label('image', 'Bild')}} <br/>
    {{ Form::file('image')}} <br/>
</p>


{{Form::hidden('id', $event->id)}}
<p> {{Form::submit('Update event')}} </p>
{{Form::close()}}

@stop