
<div class = "carousel slide" id = "myCarousel">

    {{--Indicators--}}


    <ol class = "carousel-indicators">
        @foreach($eventsWithPictures as $key => $picEvent)
            @if($key == 0)
            <li class = "active" data-slide-to = "0" data-target = "#myCarousel"> </li>
            @else
            <li data-slide-to = "{{$key}}" data-target = "#myCarousel"></li>
            @endif
        @endforeach
    </ol>
    <div class = "carousel-inner">
        @foreach($eventsWithPictures as $key => $picEvent)
        @if($key == 0)
        <div class = "item active" id = "{{'slide'.$picEvent->id}}">
        @else
        <div class = "item" id = "{{'slide'.$picEvent->id}}">
        @endif
            <img src="{{$picEvent->pictureUrl}}">
            <div class = "carousel-caption">
                <h4>{{$picEvent->name}}
                </h4>
                {{--<p>--}}
                    {{--{{$picEvent->description}}--}}
                {{--</p>--}}
                <p>
                {{ link_to_route('event', 'Läs mer', array($picEvent->id), array('class'=>'btn btn-primary btn-xs', 'role' =>'button')) }}
                </p>

            </div>
        </div>
        @endforeach
    </div>
    {{--controls--}}
    <a class = "left carousel-control" data-slide="prev" href="#myCarousel"><span class="icon-prev"></span></a>
    <a class = "right carousel-control" data-slide="next" href="#myCarousel"><span class="icon-next"></span></a>
</div>