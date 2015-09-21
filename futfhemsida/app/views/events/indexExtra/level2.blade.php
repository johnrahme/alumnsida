@foreach($events as $key => $currEvent)
            <div class = "panel panel-default @if(time()>strtotime($currEvent->dateTimeTo)) hideable @endif">
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