@extends('layouts.default')

@section('content')
@include('events.del')

<div class = "row">
    <div class = "col-sm-8">
        <div class = "panel panel-default">
            <div class = "panel-body" style = "padding-top: 0">
                <div class = "page-header" style = "margin-top:0px">
                    <h3>{{$currEvent->name}} <small>{{date('Y-m-d', strtotime($currEvent->dateTimeFrom))}} Kl. {{date('H:i', strtotime($currEvent->dateTimeFrom))}}</small></h3>

                </div>
                @if($currEvent->pictureUrl != "")
                <p align = "middle">{{ HTML::image($currEvent->pictureUrl, 'Event picture',  array('width' => '100%', 'align'=>'middle')) }}</p>
                @endif
                <p>{{$currEvent->description}}</p>
                {{--Ett alternativ--}}
                {{--<a href = "#" class="btn btn-default"  role = "button" aria-label="Left Align" style="margin-bottom: 5px">--}}
                  {{--<span class="glyphicon glyphicon-time" aria-hidden="true" style="font-size: 1.8em"></span>--}}
                  {{--{{date('Y-m-d', strtotime($currEvent->dateTimeFrom))}} Kl. {{date('H:i', strtotime($currEvent->dateTimeFrom))}} - {{date('Y-m-d', strtotime($currEvent->dateTimeTo))}} Kl. {{date('H:i', strtotime($currEvent->dateTimeTo))}}--}}
                {{--</a>--}}

                <p aria-label = "Left Align">
                        <span class="glyphicon glyphicon-time" style="font-size: 1.8em" ></span>
                        {{date('Y-m-d', strtotime($currEvent->dateTimeFrom))}} Kl. {{date('H:i', strtotime($currEvent->dateTimeFrom))}} - {{date('Y-m-d', strtotime($currEvent->dateTimeTo))}} Kl. {{date('H:i', strtotime($currEvent->dateTimeTo))}}
                </p>
                <p>
                    <span class="glyphicon glyphicon-map-marker" style="font-size: 1.8em"></span>
                    {{link_to_route('map', $currEvent->place, array($currEvent->id), array('target'=>'_blank'))}}
                </p>
                @if($currEvent->reg == 1)
                <p>
                    <span class="glyphicon glyphicon-pencil" style="font-size: 1.8em"></span>
                    @if($regCount>=$currEvent->regnr&&$currEvent->reserv == 0)
                    Eventet är tyvärr fullt!                    
                    @elseif($regOngoing==true)
                    {{link_to_route('new_registration', 'Anmälan', array($currEvent->id))}}
                    @elseif($regEnded == true)
                    Anmälan tyvärr stängd!
                    @else
                    Anmälan öppnar {{$currEvent->regFrom}}
                    @endif

                </p>
                @endif
                @if(Auth::check())
                <p>
                    <span class="glyphicon glyphicon-edit" style="font-size: 1.8em"></span>
                    {{ link_to_route('edit_event', 'Ändra', array($currEvent->id)) }}
                </p>
                    @if($currEvent->reg == 1)
                    <p>
                        <span class="glyphicon glyphicon-eye-open" style="font-size: 1.8em"></span>
                        {{ link_to_route('registrations', 'See anmälningar', array($currEvent->id)) }}
                    </p>
                    @endif
                <a href = "#del" data-toggle = "modal" class = "btn btn-danger">Ta bort</a>
                @endif

            </div>
        </div>
    </div>

    <div class = "col-sm-4">
        <div class = "panel panel-default">
            <div class = "panel-body" style = "padding-top: 0">
                <div class = "page-header" style = "margin-top:0px; margin-bottom: 2">
                <h4 class = "text-center">Kommande evenemang</h4>
                </div>
                <div class = "list-group">
                    @foreach($events as $key => $event)
                    @if($event->id == $currEvent->id)
                    <a href = "{{route('event', array($event->id))}}" class = "list-group-item active">
                    @else
                    <a href = "{{route('event', array($event->id))}}" class = "list-group-item">
                    @endif

                        <div class = "list-group-item-heading">
                            <h4>{{$event->name}}</h4>
                            <small>{{date('Y-m-d', strtotime($event->dateTimeFrom))}} Kl. {{date('H:i', strtotime($event->dateTimeFrom))}}</small>
                        </div>
                        <p>{{$event->place}}</p>
                    </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@stop