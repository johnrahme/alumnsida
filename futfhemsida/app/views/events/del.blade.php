<div class="modal fade" id="del">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(array('url'=>'events/delete', 'method' =>'DELETE')) }}
            {{--Head--}}
            <div class="modal-header">
                <h4>Vill du verkligen radera eventet "{{$currEvent->name}}"?</h4>

            </div>
            {{--Body--}}
            <div class="modal-body">
                {{ Form::hidden('id', $currEvent->id)}}
                {{ Form::submit('Radera', array('class'=>'btn btn-danger')) }}
                <a href="#" data-dismiss="modal" class="btn btn-default">Avbryt</a>
            </div>
            {{--Footer--}}

            {{ Form::close() }}
        </div>
    </div>
</div>
