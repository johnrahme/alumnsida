@extends('layouts.default')

@section('content')

<div class = "row">
    <div class = "col-sm-8">
        <div class = "panel panel-default">
            <div class = "panel-body">
                @include('start.Extra.carousel')
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
                    <a href = "{{route('event', array($event->id))}}" class = "list-group-item">
                        <div class = "list-group-item-heading">
                            <h4>{{$event->name}}</h4>
                            <small>{{date('Y-m-d', strtotime($event->dateTimeFrom))}} Kl. {{date('H:i', strtotime($event->dateTimeFrom))}}</small>
                        </div>
                        <p>{{$event->description}}</p>
                    </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>


@stop
@section('scripts')
<script type='text/javascript'>
    $(document).ready(function() {
         $('.carousel').carousel({
             interval: 5000
         })
    });
</script>
@stop