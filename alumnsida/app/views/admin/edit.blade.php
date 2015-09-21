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
                 {{Form::open(array('url'=> 'admin/update','method'=>'put'))}}
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
                             {{Form::label('startYear', 'Startår')}} <br/>

                             {{Form::input('number', 'startYear', $admin->startYear, array('class' => 'form-control'))}}

                         </p>

                         <p>
                             {{Form::label('company', 'Företag')}} <br/>

                             {{Form::text('company', $admin->company, array('class' => 'form-control'))}}

                         </p>

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