@extends('layouts.default')

@section('content')

<div class = "row">
    <div class = "col-sm-8">
        <div class = "panel-group" id = "accordion" role = "tablist" aria-multiselectable = "false">
        @foreach($events as $key => $currEvent)
            <div class = "panel panel-default">
                <div class = "panel-heading" role = "tab" id = "heading{{$currEvent->id}}">
                    <h4 class = "panel-title">
                    <a data-toggle = "collapse" data-parent = "#accordion" href = "#collapse{{$currEvent->id}}" aria-expanded = "true" aria-controls = "collapse{{$currEvent->id}}">
                        {{$currEvent->name}}
                    </a>
                    <small>{{date('Y-m-d', strtotime($currEvent->dateTimeFrom))}} Kl. {{date('H:i', strtotime($currEvent->dateTimeFrom))}}</small>
                    </h4>
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
    <div class = "col-sm-4">
       <div class = "panel panel-default">
            <div class = "panel-body" style = "padding-top: 0">
               <div class = "page-header" style = "margin-top:0px">
                    <h3>Alternativ</h3>
               </div>
               {{link_to_route('events','Se passerade events', array(), array('class'=>'btn btn-sm btn-primary', 'role'=>'button'))}}
               @if(Auth::check())
               {{link_to_route('new_event','Nytt event', array(), array('class'=>'btn btn-sm btn-success', 'role'=>'button'))}}
               @endif
            </div>
       </div>
    </div>
</div>
<a href="#" id = "example" tabindex="0" class="btn btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Validering" data-content="Wow, är du verkligen säker på det?">Radera alla events</a>


@stop

@section('scripts')
<script>
$('#example').popover();
</script>



@stop