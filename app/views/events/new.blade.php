@extends('layouts.default')

@section('styles')

{{ HTML::style('plugins/summernote/css/summernote.css') }}
{{ HTML::style('plugins/summernote/css/css/font-awesome.min.css') }}
@stop

@section('content')



<h1> Add new Event </h1>

@include('common.events_errors')
{{Form::open(array('url'=> 'events/create','files'=>true, 'id'=>'form1'))}}

<p>
    {{Form::label('name', 'Namn')}} <br/>

    {{Form::text('name')}}

</p>
<p>
    {{Form::label('dateTimeFrom', 'Starttid')}} <br/>

    {{Form::input('datepicker', 'dateTimeFrom')}}


</p>

<p>
    {{Form::label('dateTimeTo', 'Sluttid')}} <br/>

    {{Form::input('datetime', 'dateTimeTo')}}


</p>
<p>
    {{Form::label('description', 'Beskrivning')}} <br/>

    <div class = "summernote" id="col">{{Input::old('description')}}</div>
    {{Form::hidden('description')}}
</p>

<p>
    {{Form::label('place', 'Plats')}} <br/>

    {{Form::text('place')}}

</p>



<p>
    {{Form::label('publish', 'Online')}} <br/>

    {{Form::checkbox('publish', 'Check')}}

</p>

<p>
    {{Form::label('image', 'Bild')}} <br/>
    {{ Form::file('image')}} <br/>
</p>

<p>
    {{Form::label('reg', 'Ska man kunna registrera sig till eventet?')}}  <br/>
    {{Form::checkbox('reg')}} <br/>
</p>

@if(Input::old('reg'))
    <div id = "registrering">

@else
    <div id = "registrering" style="display: none;">

@endif


    <p>
        {{Form::label('regnr', 'Antal som kan registrera sig')}} <br/>

        {{Form::input('number', 'regnr')}}


    </p>
    <p>
        {{Form::label('reserv', 'Kan man anmäla sig som reserv?')}}  <br/>
        {{Form::checkbox('reserv')}} <br/>
    </p>
    <p>
        {{Form::label('extra', 'Lägg till extra fält för anmälan')}}  <br/>
    <div id = "wrapper">
        {{Form::button('Lägg till', array('id'=>'addEx'))}}
        @if(Input::old('extras'))
            @foreach(Input::old('extras') as $key => $text)
                @if($text != "")
                    <div><input type="text" value = {{$text}} name="extras[]" id="extras[]"/><a href="#" id="remove_field">X</a></div>
                @else
                    <div><input type="text" value = "" name="extras[]" id="extras[]"/><a href="#" id="remove_field">X</a></div>
                @endif
            @endforeach
        @endif
    </div>
    </p>

</div>


<p> <button id="save" class="btn btn-primary" onclick="save()" type="button">Add event</button> </p>
{{Form::close()}}


@stop

@section('scripts')

{{HTML::script('js/datetimepickerconfig.js')}}

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

         var x = {{count(Input::old('extras'))}};
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

 {{--Summernote--}}
 {{HTML::script('plugins/summernote/js/summernote.min.js')}}

  <script>
  $(document).ready(function() {
    $('.summernote').summernote({
    width: 450,
    height: 400,
    minHeight: 400,
    maxHeight: 400
    });
  });
  </script>
    <script>

     $("#save").click(function(){
         $("#description").val($('#col').code());
         $("#form1").submit();
     });

    </script>
@stop