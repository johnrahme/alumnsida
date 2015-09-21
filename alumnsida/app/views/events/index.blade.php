@extends('layouts.default')

@section('content')

<div class = "row">
<div class = "col-sm-4">
       <div class = "panel panel-default">
            <div class = "panel-body" style = "padding-top: 0">
               <div class = "page-header" style = "margin-top:0px">
                    <h3>Alternativ</h3>
               </div>
               <button class = "btn btn-sm btn-default changeable" id = "show" name = "show" value = "hidden">Visa tidigare evenemang</button>
               @if(Auth::check())
               {{link_to_route('new_event','Nytt event', array(), array('class'=>'btn btn-sm btn-success', 'role'=>'button'))}}
               @endif
            </div>
       </div>
    </div>
    <div class = "col-sm-8">
        <div class = "panel-group" id = "accordion" role = "tablist" aria-multiselectable = "false">

        @foreach($events as $key => $currEvent)
            <div class = "panel panel-default @if(time()>strtotime($currEvent->dateTimeTo)) hideable @endif">
                <div class = "panel-heading" role = "tab" id = "heading{{$currEvent->id}}">
                    <div class = "row">
                        <div class = "col-xs-8 fixed">
                            <h4 class = "panel-title">
                            <a data-toggle = "collapse" data-parent = "#accordion" href = "#collapse{{$currEvent->id}}" aria-expanded = "true" aria-controls = "collapse{{$currEvent->id}}">
                                {{$currEvent->name}}
                            </a>
                            <small>{{date('Y-m-d', strtotime($currEvent->dateTimeFrom))}} Kl. {{date('H:i', strtotime($currEvent->dateTimeFrom))}}</small>
                            </h4>
                        </div>
                        <div class = "col-xs-4 fixed" align = "right">
                            @if(Auth::check())
                                @if($currEvent->publish == 1)
                                Online  {{ HTML::image(URL::asset('img/online.png'),'banner', array('class'=>'img-responsive', 'style'=>'height: 20px; padding-left: 5px','align' => 'right')) }}
                                @else
                                Offline {{ HTML::image(URL::asset('img/offline.png'),'banner', array('class'=>'img-responsive', 'style'=>'height: 20px; padding-left: 5px', 'align' => 'right')) }}
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div id = "collapse{{$currEvent->id}}" class = "panel-collapse @if($key == 0) in @endif collapse" role = "tabpanel" aria-labelledby="heading{{$currEvent->id}}">
                    <div class = "panel-body">
                        {{$currEvent->description}}
                        {{link_to_route('event','Visa event', array($currEvent->id), array('class'=>'btn btn-sm btn-primary', 'role'=>'button'))}}
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>
</div>


@stop

@section('scripts')
<script>
$('#example').popover();
$('.hideable').hide();
$('#show').click(function(){
    if($(this).val()=='hidden'){
    $('.hideable').show();
    $(this).val('visible');
    $(this).text('Göm tidigare evenemang');
    }
    else{
    $('.hideable').hide();
    $(this).val('hidden');
    $(this).text('Visa tidigare evenemang');
    }
});
</script>



@stop