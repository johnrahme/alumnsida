@extends('layouts.default')

@section('content')


<div class = "row">
    <div class = "col-sm-6">
        <div class = "panel panel-default">
            <div class = "panel-body" style = "padding-top: 0">
                <div class = "page-header" style = "margin-top:0px">
                <h2> Anmälan till {{$event->name}} </h2>
                </div>
                {{--@include('common.events_errors')--}}
                {{Form::open(array('url'=> 'events/registrations/create'))}}

                <p>
                    {{Form::label('name', 'Förnamn')}} <br/>

                    {{Form::text('name', '',array('class' => 'form-control','placeholder' => 'Förnamn') )}}

                </p>
                <p>
                    {{Form::label('surname', 'Efternamn')}} <br/>

                    {{Form::text('surname', '',array('class' => 'form-control','placeholder' => 'Efternamn') )}}

                </p>

                <p>
                    {{Form::label('email', 'Email:')}} <br/>

                    {{Form::text('email', '',array('class' => 'form-control','placeholder' => 'email@example.com') )}}
                </p>

                <p>
                    {{Form::label('tel', 'Telefon')}} <br/>

                    {{Form::input('tel', 'tel', '',array('class' => 'form-control','placeholder' => 'Telefon') )}}

                </p>

                @foreach($extraFields as $key => $ex)
                    <p>
                        {{Form::label('extras[]', $ex->title)}}<br/>
                        {{Form::text('extras[]', '',array('class' => 'form-control') )}}
                        {{Form::hidden('extrasId[]',$ex->id)}}
                    </p>
                @endforeach


                {{Form::hidden('eventId',$event->id)}}

                <p> {{Form::submit('Registrera', array('class'=>'btn btn-primary'))}} </p>
                {{Form::close()}}

            </div>
        </div>
    </div>
</div>


@stop
