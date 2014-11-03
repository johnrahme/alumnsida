@extends('layouts.default')

@section('content')



<h1> Add new registration </h1>

{{--@include('common.events_errors')--}}
{{Form::open(array('url'=> 'events/registrations/create'))}}

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

@foreach($extraFields as $key => $ex)
    <p>
        {{Form::label('extras[]', $ex->title)}}<br/>
        {{Form::text('extras[]')}}
        {{Form::hidden('extrasId[]',$ex->id)}}
    </p>
@endforeach


{{Form::hidden('eventId',$eventId)}}

<p> {{Form::submit('Register')}} </p>
{{Form::close()}}

@stop
