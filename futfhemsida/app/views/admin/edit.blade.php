@extends('layouts.default')

@section('content')
<div class = "row">
    <div class = "col-md-12">
        <div class = "panel panel-default">
            <div class = "panel-body" style = "padding-top: 0">
                 <div class = "page-header" style = "margin-top:0px">
                    <h2>Ändra mitt konto</h2>
                 </div>
                 @include('common.users_errors')
                 <div class = "col-sm-6">
                 {{Form::open(array('url'=> 'admin/update','files'=>true, 'method'=>'put'))}}
                 	<h3>Personuppgifter</h3>
                     <p>
                     		{{Form::label('name', 'Förnamn')}} <br/>

                     		{{Form::text('name', $admin->name, array('class' => 'form-control'))}}

                     	</p>
                         <p>
                             {{Form::label('surname', 'Efternamn')}} <br/>

                             {{Form::text('surname', $admin->surname, array('class' => 'form-control'))}}

                         </p>

                         <p>
                             {{Form::label('tel', 'Telefon')}} <br/>

                             {{Form::input('tel', 'tel', $admin->tel, array('class' => 'form-control'))}}

                         </p>

                         <p>
                             {{Form::label('accounttype', 'Kontotyp')}} <br/>

                             {{Form::select('accounttype', array('styrelse' => 'Styrelsemedlem', 'it' => 'IT-support', 'extra' => 'Övrigt'), $admin->accounttype, array('class' => 'form-control'))}}
                         </p>

                         <p>
                             {{Form::label('post', 'Postnamn')}} <br/>

                             {{Form::text('post', $admin->post, array('class' => 'form-control'))}}
                         </p>

                         <p>
                             {{Form::label('description', 'Beskrivning')}} <br/>

                             {{Form::textarea('description', $admin->description, array('class' => 'form-control'))}}
                         </p>

                         <p>
                             {{Form::label('image', 'Bild')}} <br/>

                         </p>

                         @if(strpos($admin->pictureUrl,'img') !== FALSE)
                         <div class="fileinput fileinput-exists" data-provides="fileinput">

                         @else
                         <div class="fileinput fileinput-new" data-provides="fileinput">
                         @endif
                           <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                             <!--<img data-src="holder.js/100%x100%" alt="...">-->
                           </div>
                           <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                {{HTML::image($admin->pictureUrl)}}
                           </div>
                           <div>
                             <span class="btn btn-default btn-file">
                             <span class="fileinput-new">Select image</span>
                             <span class="fileinput-exists">Change</span>
                             <input id="image" type="file" name="image"></span>
                             <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                           </div>
                         </div>

                 </div>
                 <div class = "col-sm-6">
                  <h3>Inloggningsuppgfiter</h3>
                 		<p>
                 		{{Form::label('username', 'Användarnamn')}} <br/>

                 		{{Form::text('username', $admin->username, array('class' => 'form-control'))}}

                 	</p>
                 	<p>
                 		{{Form::label('email', 'Email:')}} <br/>

                 		{{Form::text('email',$admin->email, array('class' => 'form-control'))}}
                 	</p>

                     <p>
                         {{Form::label('password', 'Nytt lösenord')}} <br/>

                         {{Form::password('password', array('class' => 'form-control'))}}

                     </p>
                     @if(Auth::check()&& Auth::user()->level == 2)
                     <p>
                         {{Form::label('level', 'Level')}}
                         {{Form::select('level', array('1' => '1', '2' => '2'), $admin->level, array('class' => 'form-control'))}}
                     </p>
                     @else
                         {{Form::hidden('level', 1)}}
                     @endif
                     {{Form::hidden('id',$admin->id)}}

                 	<p> {{Form::submit('Uppdatera', array('class'=>'btn btn-success'))}} </p>

                 	{{Form::close()}}
                 </div>
            </div>
        </div>
    </div>
</div>


	
@stop