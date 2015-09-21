@extends('layouts.event')

@section('styles')

{{ HTML::style('plugins/summernote/css/summernote.css') }}
{{ HTML::style('plugins/summernote/css/css/font-awesome.min.css') }}
@stop

@section('before')

@include('common.events_errors')
{{Form::open(array('url'=> 'events/create','files'=>true, 'id'=>'form1'))}}
@stop
@section('panelOne')
        <p>
            {{Form::label('name', 'Namn', array('class' => 'required'))}} <br/>

            {{Form::text('name', '', array('class'=>'form-control'))}}

        </p>
        <p>
            {{Form::label('dateTimeFrom', 'Starttid', array('class' => 'required'))}} <br/>

            {{Form::input('datepicker', 'dateTimeFrom','', array('class'=>'form-control'))}}


        </p>

        <p>
            {{Form::label('dateTimeTo', 'Sluttid', array('class' => 'required'))}} <br/>

            {{Form::input('datetime', 'dateTimeTo','', array('class'=>'form-control'))}}


        </p>
        <p>
            {{Form::label('place', 'Plats', array('class' => 'required'))}} <br/>

            {{Form::text('place','', array('class'=>'form-control'))}}

        </p>
        @stop
        @section('panelTwo')
    {{--Beskrivning--}}

        <p>
            {{Form::label('description', 'Beskrivning', array('class' => 'required'))}} <br/>

            <div class = "summernote" id="col">{{Input::old('description')}}</div>
            {{Form::hidden('description')}}
        </p>
        @stop
    {{--Registrering--}}
        @section('panelThree')
        <p>
            {{Form::label('reg', 'Ska man kunna registrera sig till eventet?')}}  <br/>
            {{Form::checkbox('reg','Check',0,array('class' => 'check-box'))}} <br/>
        </p>

        @if(Input::old('reg'))
            <div id = "registrering">

        @else
            <div id = "registrering" style="display: none;">

        @endif


            <p>
                {{Form::label('regnr', 'Antal som kan registrera sig', array('class' => 'required'))}} <br/>

                {{Form::input('number', 'regnr','', array('class'=>'form-control'))}}


            </p>
            <p>
                {{Form::label('regFrom', 'Registrering öppnar', array('class' => 'required'))}} <br/>

                {{Form::input('datepicker', 'regFrom','', array('class'=>'form-control'))}}


            </p>

            <p>
                {{Form::label('regTo', 'Registrering stänger', array('class' => 'required'))}} <br/>

                {{Form::input('datetime', 'regTo','', array('class'=>'form-control'))}}


            </p>

            <p>
                {{Form::label('reserv', 'Kan man anmäla sig som reserv?')}}  <br/>
                {{Form::checkbox('reserv')}} <br/>
            </p>
            <p>
                {{Form::label('extra', 'Lägg till extra fält för anmälan')}}  <br/>
            <div id = "wrapper">
                {{Form::button('Lägg till', array('id'=>'addEx', 'class' => 'btn btn-default'))}}
                <br>
                <br>
                @if(Input::old('extras'))
                    @foreach(Input::old('extras') as $key => $text)
                        @if($text != "")
                            <div><input type="text" value = {{$text}} name="extras[]" id="extras[]"/><a href="#" id="remove_field">X</a><br><br></div>
                        @else
                            <div><input type="text" value = "" name="extras[]" id="extras[]"/><a href="#" id="remove_field">X</a><br><br></div>
                        @endif
                    @endforeach
                @endif
            </div>
            </p>

        </div>
        @stop
        @section('panelFour')
    {{--Övrigt--}}
        <p>
            {{Form::label('publish', 'Online')}} <br/>

            {{Form::checkbox('publish', 'Check')}}

        </p>

        <p>
            {{Form::label('image', 'Bild')}} <br/>
            {{ Form::file('image')}} <br/>
        </p>
        @stop
@section('after')
<p> <button id="save" class="btn btn-primary" onclick="save()" type="button">Add event</button> {{ link_to_route('events', 'Cancel', array(), array('class'=>'btn btn-default')) }}</p>
{{Form::close()}}
@stop


@section('scripts')

{{HTML::script('js/datetimepickerconfig2.js')}}

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

                 $("#wrapper").append('<div><input type="text" name="extras[]" id="extras[]"/><a href="#" id="remove_field">X</a><br><br></div>'); //add input box
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
    height: 400,
    minHeight: 400,
    maxHeight: 400,
    onkeyup: function(e) {
                $("#desc").html($('#col').code());
             }
    });
  });
  </script>
    <script>

     $("#save").click(function(){
         $("#description").val($('#col').code());
         $("#form1").submit();
     });

    </script>
    {{HTML::script('js/eventPreview.js')}}

<script>
    $("#tab1").click(function(){
        $("#activeTab").val('home');
    });
    $("#tab2").click(function(){
        $("#activeTab").val('profile');
    });
     $("#tab3").click(function(){
         $("#activeTab").val('messages');
     });
    $("#tab4").click(function(){
        $("#activeTab").val('settings');
    });
</script>
@stop