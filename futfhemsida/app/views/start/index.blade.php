@extends('layouts.default')

@section('styles')
    <link rel="stylesheet" href="css/plugins/flexslider.css" type="text/css">
@stop
@section('content')
    <div class="jumbotron text-center">
        <h2> Välkommen till betaversionen av FUTF:s nya hemsida!</h2>

        <p> Hör gärna av er med idéer till {{HTML::mailto('it@futf.se')}}, vi vill ha all feedback vi kan få.</p>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-header">
                            <a data-toggle="collapse" href="#collapse1">
                                LOREM IPSUM #1</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat.
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-header">
                            <a data-toggle="collapse" href="#collapse2">
                                LOREM IPSUM #2</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat.
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-header">
                            <a data-toggle="collapse" href="#collapse3">
                                LOREM IPSUM #3</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat.
                        </div>
                    </div>
                </div>
            </div>

            <div>
                @if(count($eventsWithPictures)!=0)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('start.Extra.carousel2')
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-sm-4">
            @if(count($events)!=0)
                <div class="panel panel-default">
                    <div class="panel-body" style="padding-top: 0">
                        <div class="page-header" style="margin-top: 0; margin-bottom: 2px">
                            <h4 class="text-center">Kommande evenemang</h4>
                        </div>
                        <div class="list-group" style="max-height: 345px; overflow-y: scroll">
                            @foreach($events as $key => $event)
                                <a href="{{route('event', array($event->id))}}" class="list-group-item">
                                    <div class="list-group-item-heading">
                                        <h4>{{$event->name}}</h4>
                                        <small>{{date('Y-m-d', strtotime($event->dateTimeFrom))}}
                                            Kl. {{date('H:i', strtotime($event->dateTimeFrom))}}</small>
                                    </div>
                                    <p>{{$event->place}}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @endif

@stop
@section('scripts')
    {{ HTML::script('js/carousel2/jquery.flexslider.js') }}
    {{--Carousel 2--}}
    <script type="text/javascript" charset="utf-8">

        $(window).load(function () {
            $('.flexslider')
                    .flexslider({
                        animation: "slide",
                        useCSS: false,
                        animationLoop: false,
                        smoothHeight: true

                    });
        });
    </script>


    <script type='text/javascript'>
        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 5000
            })
        });
    </script>
    <script>
        $("#loginButton").click(function () {
            $("#modalLogin").modal('show');
        });

    </script>
@stop