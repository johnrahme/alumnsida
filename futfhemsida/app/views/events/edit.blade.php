@extends('layouts.event')

@section('styles')

    {{ HTML::style('plugins/summernote/css/summernote.css') }}
    {{ HTML::style('plugins/summernote/css/css/font-awesome.min.css') }}
@stop

@section('before')

    @include('common.events_errors')
    {{Form::open(array('url'=> 'events/update','files'=>true, 'method' => 'put', 'id' => 'form1'))}}
@stop
@section('panelOne')
    <p>
        {{Form::label('name', 'Namn', array('class' => 'required'))}}<br/>

        {{Form::text('name', $event->name, array('class'=>'form-control'))}}

    </p>
    <p>
        {{Form::label('dateTimeFrom', 'Starttid', array('class' => 'required'))}} <br/>

        {{Form::input('datepicker', 'dateTimeFrom', $event->dateTimeFrom, array('class'=>'form-control'))}}


    </p>

    <p>
        {{Form::label('dateTimeTo', 'Sluttid', array('class' => 'required'))}} <br/>

        {{Form::input('datetime', 'dateTimeTo', $event->dateTimeTo, array('class'=>'form-control'))}}


    </p>

    <p>
        {{Form::label('place', 'Plats', array('class' => 'required'))}} <br/>

        {{Form::text('place', $event->place, array('class'=>'form-control'))}}

    </p>
@stop
@section('panelTwo')
    <p>
        {{Form::label('description', 'Beskrivning', array('class' => 'required'))}} <br/>

        {{Form::hidden('description')}}
    </p>
    <div class="summernote"
         id="col">@if(Input::old('description')){{Input::old('description')}}@else{{$event->description}}@endif</div>

@stop
@section('panelThree')
    <p>
        @if($editExtra == 1)
            {{Form::label('reg', 'Ska man kunna registrera sig till eventet?')}}  <br/>
            {{Form::checkbox('reg', 'Check', $event->reg, array('class' => 'check-box'))}} <br/>
        @else
            {{Form::hidden('reg', $event->reg)}}
        @endif
    </p>

    @if($event->reg == 1)
        <div id="registrering">
            @else
                <div id="registrering" style="display: none;">
                    @endif

                    <p>
                        {{Form::label('regnr', 'Antal som kan registrera sig', array('class' => 'required'))}} <br/>

                        {{Form::input('number', 'regnr', $event->regnr, array('class'=>'form-control'))}}


                    </p>

                    <p>

                        @if($editExtra == true)
                            {{Form::label('reserv', 'Kan man anmäla sig som reserv?')}}  <br/>
                            {{Form::checkbox('reserv', 'Check', $event->reserv)}} <br/>

                        @else
                            {{Form::hidden('reserv', $event->reserv)}}
                        @endif
                    </p>

                    <p>
                        {{Form::label('regFrom', 'Registrering öppnar', array('class' => 'required'))}} <br/>

                        {{Form::input('datepicker', 'regFrom',$event->regFrom, array('class'=>'form-control'))}}


                    </p>

                    <p>
                        {{Form::label('regTo', 'Registrering stänger', array('class' => 'required'))}} <br/>

                        {{Form::input('datetime', 'regTo',$event->regTo, array('class'=>'form-control'))}}


                    </p>

                    <p>
                    {{Form::label('extra', 'Lägg till extra fält för anmälan')}}
                    <div id="wrapper">
                        {{Form::button('Lägg till', array('id'=>'addEx', 'class' => 'btn btn-default'))}}
                        <br>
                        <br>
                        @foreach($extra as $ex)

                            @if($ex->title != "")
                                @if($editExtra == false)
                                    <div><input type="text" readonly value={{$ex->title}} name="extras[]"
                                                id="extras[]"/><br><br></div>
                                @else
                                    <div><input type="text" value={{$ex->title}} name="extras[]" id="extras[]"/><a
                                                href="#" id="remove_field">X</a><br><br></div>
                                @endif
                            @else
                                @if($editExtra == false)
                                    <div><input type="text" value="" readonly name="extras[]" id="extras[]"/><br><br>
                                    </div>
                                @else
                                    <div><input type="text" value="" name="extras[]" id="extras[]"/><a href="#"
                                                                                                       id="remove_field">X</a><br><br>
                                    </div>
                                @endif
                            @endif
                        @endforeach


                    </div>
                    </p>

                </div>
                @stop
            @section('panelFour')
                <p>
                    {{Form::label('publish', 'Online')}} <br/>

                    {{Form::checkbox('publish', 'Check', $event->publish)}}

                </p>

                <p>
                    {{Form::label('image', 'Bild')}} <br/>
                <div id="oldPicture">{{Form::label('oldPictureL', 'The old Picture')}}<a href="#"
                                                                                         id="remove_picture">X</a></div>
                <br/>
                <div id="newPicture">
                    {{ Form::file('image')}} <br/>
                </div>

                </p>
            @stop
            @section('after')
                {{Form::hidden('id', $event->id)}}
                {{Form::hidden('pictureChanged', 0, array('id' => 'pictureChanged'))}}

                <p>
                    <button id="save" class="btn btn-primary" onclick="save()" type="button">Update event
                    </button> {{ link_to_route('event', 'Cancel', array($event->id), array('class'=>'btn btn-default')) }}
                </p>
                {{Form::close()}}
            @stop

            @section('scripts')

                {{HTML::script('js/datetimepickerconfig2.js')}}

                <script>

                    //Kollar om det finns en bild
                    @if($event->pictureUrl != "")
                        $('#oldPicture').show();
                    $('#newPicture').hide();
                    $("label[for = 'oldPictureL']").text('{{$event->pictureUrl}}');

                    @else
                        $('#oldPicture').hide();
                    $('#newPicture').show();
                    @endif

                            $('#remove_picture').click(function (e) {
                                e.preventDefault();
                                $('#oldPicture').hide();
                                $('#newPicture').show();
                                $('#pictureChanged').val(1);
                            });

                </script>


                <script>


                    //Det går inte att ändra anmälan när det redan finns anmälda

                    @if($editExtra == false)
                        document.getElementById("addEx").disabled = true;
                    document.getElementById("regnr").readOnly = true;
                    @endif


                </script>

                @if($editExtra == true)
                    <script>

                        //Lägger till registreringsfält
                        $(document).ready(function () {
                            $('#reg').change(function () {
                                if (!this.checked) {
                                    $('#registrering').hide();
                                }
                                else {
                                    $('#registrering').show();
                                }
                            });
                            //Extra fält:
                            var max_fields = 5;

                            var x = {{$extra->count()}};
                            $('#addEx').click(function (e) {
                                e.preventDefault();
                                if (x < max_fields) {
                                    x++;
                                    var ex = "extra";
                                    var fieldID = ex.concat(ex);

                                    $("#wrapper").append('<div><input type="text" name="extras[]" id="extras[]"/><a href="#" id="remove_field">X</a><br><br></div>'); //add input box
                                }
                            });
                            $("#wrapper").on("click", "#remove_field", function (e) { //user click on remove text
                                e.preventDefault();
                                $(this).parent('div').remove();
                                x--;
                            });
                        });
                    </script>

                @endif
                {{--Summernote--}}
                {{HTML::script('plugins/summernote/js/summernote.min.js')}}

                 <script>
					$(document).ready(function () {
						$('.summernote').summernote({
							height: 400,
                            minHeight: 400,
                            maxHeight: 400,
							callbacks: {
								onImageUpload: function (image) {
									
								},
								onKeyup: function (e) {
									
									$("#desc").html($('#col').summernote('code'));
								}
							}

						});
						function sendFile(image) {
							var data = new FormData();
							data.append("image", image);
							data.append("test", "test");
							$.ajax({
								method: "POST",
								data: data,
								url: "{{url('events/imgstore')}}",
								cache: false,
								contentType: false,
								processData: false,
								success: function(url) {
									alert(url);
								},
								error: function(e){
									alert(e.responseText);
								}
							});
							
							imagesURL = "http://space-facts.com/wp-content/uploads/magellanic-clouds.png";
							var imgNode = $('<img>').attr('src',imagesURL);
							
							$('.summernote').summernote('insertNode', imgNode[0]);  // insert native dom 
							//$('#summernote').summernote("insertImage", "test/sd.jpg");
						}
					});
                </script>
                <script>

                    $("#save").click(function () {
                        $("#description").val($('#col').summernote('code'));
                        $("#form1").submit();
                    });

                </script>

                {{HTML::script('js/eventPreview.js')}}

                {{--Sätter rätt tab--}}
                <script>
                    $("#tab1").click(function () {
                        $("#activeTab").val('home');
                    });
                    $("#tab2").click(function () {
                        $("#activeTab").val('profile');
                    });
                    $("#tab3").click(function () {
                        $("#activeTab").val('messages');
                    });
                    $("#tab4").click(function () {
                        $("#activeTab").val('settings');
                    });
                </script>
@stop