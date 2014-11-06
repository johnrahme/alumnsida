
<div class = "carousel slide" id = "myCarousel">

    {{--Indicators--}}


    <ol class = "carousel-indicators">
        <li class = "active" data-slide-to = "0" data-target = "#myCarousel"> </li>
        @foreach($eventsWithPictures as $key => $picEvent)
        <li data-slide-to = "{{$key+1}}" data-target = "#myCarousel"></li>
        @endforeach
    </ol>
    <div class = "carousel-inner">
        <div class = "item active" id = "slide1">
            <img src="http://placehold.it//1200x500" alt="images/img2.png">
            <div class = "carousel-caption">
                <h4>Bootstrap!
                </h4>
                <p>
                    Learning carousel
                </p>
            </div>
        </div>
        @foreach($eventsWithPictures as $key => $picEvent)
        <div class = "item" id = "{{'slide'.$picEvent->id}}">
            <img src="{{$picEvent->pictureUrl}}">
            <div class = "carousel-caption">
                <h4>{{$picEvent->name}}
                </h4>
                <p>
                    {{$picEvent->description}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
    {{--controls--}}
    <a class = "left carousel-control" data-slide="prev" href="#myCarousel"><span class="icon-prev"></span></a>
    <a class = "right carousel-control" data-slide="next" href="#myCarousel"><span class="icon-next"></span></a>
</div>