@extends('layouts.default')

@section('styles')


    <link rel="stylesheet" href="css/plugins/flexslider.css" type="text/css">
@stop

@section('content')
    {{--Jumbotron--}}
    <div class="jumbotron text-center">
        <h2> Välkommen till betaversionen av FUTF:s nya hemsida!</h2>

        <p> Hör gärna av er med idéer till {{HTML::mailto('it@futf.se')}}, vi vill ha all feedback vi kan få. Om du inte känner dig redo
    </div>

    <div class="row">
        <div class="col-sm-8">

            {{--"News" Accordion--}}
            @if(count($news)!=0)
                @foreach($news as$key => $currNews)
                    <div class="panel panel-default" style="word-wrap: break-word">
                        <div class="panel-heading">
                            <h4 class="panel-header">
                                <a data-toggle="collapse" href="#news{{$currNews->id}}" style="display: inline-block">
                                    {{$currNews->name}}
                                    <div style="float: right">
                                        <a href="news/{{$currNews->id}}">Läs mer</a>
                                    </div>
                                </a>
                            </h4>
                        </div>
                        @if ($key == 0 )
                            <div id="news{{$currNews->id}}" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    {{$currNews->abstract}}
                                </div>
                            </div>
                        @else
                            <div id="news{{$currNews->id}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    {{$currNews->abstract}}
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif
            {{--@endif--}}

            {{--Event Carousel--}}
            <div style="margin-top: 1%">
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
            {{--Event Panel--}}
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
            @endif
        </div>
    </div>
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