@extends('layouts.default')

@section('content')

<h1> Edit Event </h1>

@include('common.events_errors')
{{Form::open(array('url'=> 'events/update','files'=>true, 'method' => 'put'))}}

<p>
    {{Form::label('name', 'Namn')}} <br/>

    {{Form::text('name', $event->name)}}

</p>
<p>
    {{Form::label('dateTimeFrom', 'Starttid')}} <br/>

    {{Form::input('datepicker', 'dateTimeFrom', $event->dateTimeFrom)}}


</p>

<p>
    {{Form::label('dateTimeTo', 'Sluttid')}} <br/>

    {{Form::input('datetime', 'dateTimeTo', $event->dateTimeTo)}}


</p>
<p>
    {{Form::label('description', 'Beskrivning')}} <br/>

    {{Form::textarea('description', $event->description)}}
</p>

<p>
    {{Form::label('place', 'Plats')}} <br/>

    {{Form::text('place', $event->place)}}

</p>


<p>
    {{Form::label('publish', 'Online')}} <br/>

    {{Form::checkbox('publish', 'Check', $event->publish)}}

</p>

<p>
    {{Form::label('image', 'Bild')}} <br/>
    {{ Form::file('image')}} <br/>
</p>

<p>
    {{Form::label('reg', 'Ska man kunna registrera sig till eventet?')}}  <br/>
    {{Form::checkbox('reg', 'Check', $event->reg)}} <br/>
</p>

    @if($event->reg == 1)
        <div id = "registrering">
    @else
        <div id = "registrering" style = "display: none;">
    @endif

    <p>
        {{Form::label('regnr', 'Antal som kan registrera sig')}} <br/>

        {{Form::input('number', 'regnr', $event->regnr)}}


    </p>
    <p>
        {{Form::label('reserv', 'Kan man anmäla sig som reserv?')}}  <br/>
        {{Form::checkbox('reserv', 'Check', $event->reserv)}} <br/>
    </p>
    <p>
        {{Form::label('extra', 'Lägg till extra fält för anmälan')}}  <br/>
    <div id = "wrapper">
        {{Form::button('Lägg till', array('id'=>'addEx'))}}
        @foreach($extra as $ex)

            @if($ex->title != "")
                 <div><input type="text" value = {{$ex->title}} name="extras[]" id="extras[]"/><a href="#" id="remove_field">X</a></div>
            @else
                 <div><input type="text" value = "" name="extras[]" id="extras[]"/><a href="#" id="remove_field">X</a></div>
            @endif

        @endforeach


    </div>
    </p>

</div>

{{Form::hidden('id', $event->id)}}
<p> {{Form::submit('Update event')}} </p>
{{Form::close()}}

@stop

@section('scripts')

<script>
    $(document).ready(function(){
        $('#reg').change(function(){
            if(!this.checked){
                $('#registrering').hide();
            }
            else{
                $('#registrering').show();
            }
        });
        //Extra fält:
        var max_fields = 5;

        var x = {{$extra->count()}};
        $('#addEx').click(function(e){
            e.preventDefault();
            if(x<max_fields) {
                x++;
                var ex = "extra";
                var fieldID = ex.concat(ex);

                $("#wrapper").append('<div><input type="text" name="extras[]" id="extras[]"/><a href="#" id="remove_field">X</a></div>'); //add input box
            }
        });
        $("#wrapper").on("click","#remove_field", function(e){ //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });
</script>
@stop