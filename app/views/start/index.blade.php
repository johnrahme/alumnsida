@extends('layouts.default')

@section('styles')
<link rel="stylesheet" href="css/plugins/flexslider.css" type="text/css">
@stop
@section('content')

		<div class = "jumbotron text-center">
			<h2> Välkommen till betaversionen av FUTF:s alumnsida!</h2>
			<p> Tanken med denna hemsida är att alumner som gått Teknisk Fysik i Uppsala på ett enkelt sätt ska kunna hålla kontakten på en samlad plattform. Har du idéer om något som kan ändras eller läggas till på hemsidan? Tveka inte att kontakta {{HTML::mailto('it@futf.se')}}, vi vill ha all feedback vi kan få.</p>
			<p>Vill du testa skapa ett evenemang eller se andra alumner, kom igång direkt genom att</p>

			{{link_to_route('new_admin', 'Skapa ett konto','', array('class' => 'btn btn-success'))}}

		</div>


<div class = "row">
    <div class = "col-sm-8">
        <div class = "panel panel-default">
            <div class = "panel-body">
                @include('start.Extra.carousel2')
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
                        <p>{{$event->place}}</p>
                    </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>
</div>


@stop
@section('scripts')
{{ HTML::script('js/carousel2/jquery.flexslider.js') }}
{{--Carousel 2--}}
<script type="text/javascript" charset="utf-8">

  $(window).load(function() {
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
    $(document).ready(function() {
         $('.carousel').carousel({
             interval: 5000
         })
    });
</script>
@stop