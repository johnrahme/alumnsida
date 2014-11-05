@extends('layouts.default')

@section('content')

<div class = "carousel slide" id = "myCarousel">

    {{--Indicators--}}

    <ol class = "carousel-indicators">
        <li class = "active" data-slide-to = "0" data-target = "#myCarousel"> </li>
        <li data-slide-to = "1" data-target = "#myCarousel"></li>
        <li data-slide-to = "2" data-target = "#myCarousel"></li>
    </ol>
    <div class = "carousel-inner">
        <div class = "item active" id = "slide1">
            <img src="img/events/0.86546200 1415206937_Desert.jpg" alt="images/img2.png">
            <div class = "carousel-caption">
                <h4>Bootstrap!
                </h4>
                <p>
                    Learning carousel
                </p>
            </div>
        </div>
        <div class = "item" id = "slide2">
            <img src="http://placehold.it//1200x500">
            <div class = "carousel-caption">
                <h4>Website!
                </h4>
                <p>
                    Crapcrap
                </p>
            </div>
        </div>
        <div class = "item" id = "slide3">
            <img src="images/img1.png" alt="images/img2.png">
            <div class = "carousel-caption">
                <h4>Bootcrap!
                </h4>
                <p>
                    Host websites!
                </p>
            </div>
        </div>
    </div>
    {{--controls--}}
    <a class = "left carousel-control" data-slide="prev" href="#myCarousel"><span class="icon-prev"></span></a>
    <a class = "right carousel-control" data-slide="next" href="#myCarousel"><span class="icon-next"></span></a>
</div>
@stop