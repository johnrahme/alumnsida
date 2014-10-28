@extends('layouts.default')

@section('content')


<script>
    $(function(){
        $('.datepicker').datepicker();
    });
</script>


<h1> Add new Event </h1>

@include('common.events_errors')
{{Form::open(array('url'=> 'events/create','files'=>true))}}

<p>
    {{Form::label('name', 'Namn')}} <br/>

    {{Form::text('name')}}

</p>
<p>
    {{Form::label('dateTimeFrom', 'Starttid')}} <br/>

    {{Form::input('datepicker', 'dateTimeFrom')}}


</p>

<p>
    {{Form::label('dateTimeTo', 'Sluttid')}} <br/>

    {{Form::input('datetime', 'dateTimeTo')}}


</p>
<p>
    {{Form::label('description', 'Beskrivning')}} <br/>

    {{Form::textarea('description')}}
</p>

<p>
    {{Form::label('place', 'Plats')}} <br/>

    {{Form::text('place')}}

</p>


<p>
    {{Form::label('publish', 'Online')}} <br/>

    {{Form::checkbox('publish', 'Check')}}

</p>

<p>
    {{Form::label('image', 'Bild')}} <br/>
    {{ Form::file('image')}} <br/>
</p>

<p> {{Form::submit('Add event')}} </p>
{{Form::close()}}

@stop