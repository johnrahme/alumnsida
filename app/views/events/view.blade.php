@extends('layouts.default')

@section('content')
@include('events.del')

<div class = "row">
    <div class = "col-sm-8">
        <div class = "panel panel-default">
            <div class = "panel-body" style = "padding-top: 0">
                <div class = "page-header" style = "margin-top:0px">
                    <h3>{{$currEvent->name}} <small>{{date('Y-m-d', strtotime($currEvent->dateTimeFrom))}} Kl. {{date('H:i', strtotime($currEvent->dateTimeFrom))}} Skapad av: {{link_to_route('view_admin',admin::find($currEvent->createdBy)->username,array('id'=>$currEvent->createdBy))}}</small></h3>

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

                    @if(Auth::user()->level==2||Auth::user()->id == $currEvent->createdBy)
                    <p>
                        <span class="glyphicon glyphicon-edit" style="font-size: 1.8em"></span>
                        {{ link_to_route('edit_event', 'Ändra', array($currEvent->id)) }}
                    </p>
                    @endif

                    @if($currEvent->reg == 1&&(Auth::user()->level==2||Auth::user()->id == $currEvent->createdBy))
                    <p>
                        <span class="glyphicon glyphicon-eye-open" style="font-size: 1.8em"></span>
                        {{ link_to_route('registrations', 'Se anmälningar', array($currEvent->id)) }}
                    </p>
                    @endif
                @if(Auth::user()->level==2||Auth::user()->id == $currEvent->createdBy)
                <a href = "#del" data-toggle = "modal" class = "btn btn-danger">Ta bort</a>
                @endif
                <a href="http://www.google.se" title="Lägg till i kalender" class="addthisevent">
                    Lägg till i kalender
                    <span class="_start">{{$currEvent->dateTimeFrom}}</span>
                    <span class="_end">{{$currEvent->dateTimeTo}}</span>
                    <span class="_zonecode">38</span>
                    <span class="_summary">{{$currEvent->name}}</span>
                    <span class="_description">{{$currEvent->description}}</span>
                    <span class="_location">{{$currEvent->place}}</span>
                    <span class="_organizer">FUTF</span>
                    <span class="_organizer_email">alumnsida@futf.se</span>
                    <span class="_all_day_event">false</span>
                    <span class="_date_format">DD/MM/YYYY</span>
                </a>
                @else
                <a href="http://www.google.se" title="Lägg till i kalender" class="addthisevent">
                    Lägg till i kalender
                    <span class="_start">{{$currEvent->dateTimeFrom}}</span>
                    <span class="_end">{{$currEvent->dateTimeTo}}</span>
                    <span class="_zonecode">38</span>
                    <span class="_summary">{{$currEvent->name}}</span>
                    <span class="_description">{{$currEvent->description}}</span>
                    <span class="_location">{{$currEvent->place}}</span>
                    <span class="_organizer">FUTF</span>
                    <span class="_organizer_email">alumnsida@futf.se</span>
                    <span class="_all_day_event">false</span>
                    <span class="_date_format">DD/MM/YYYY</span>
                </a>

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
                    @if(time()<strtotime($event->dateTimeTo))

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
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@stop