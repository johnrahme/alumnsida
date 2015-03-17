@extends('layouts.default')

@section('content')

<div class = "row">
    <div class = "col-md-12">
        <div class = "panel panel-default">
            <div class = "panel-body" style = "padding-top: 0">
                 <div class = "page-header" style = "margin-top:0px">
                    <h2>Skapa ett konto</h2>
                 </div>
                 @include('common.users_errors')
                 Skapa ett konto nedan för att kunna lägga upp evenemang och se andra alumners profiler.
                 <div class = "col-sm-6">

                 	{{Form::open(array('url'=> 'admin/create/reg','files'=>true))}}

                     <h3>Personuppgifter</h3>
                    <p>
                 		{{Form::label('name', 'Förnamn')}} <br/>

                 		{{Form::text('name','', array('class' => 'form-control'))}}

                 	</p>
                     <p>
                         {{Form::label('surname', 'Efternamn')}} <br/>

                         {{Form::text('surname','', array('class' => 'form-control'))}}

                     </p>

                     <p>
                         {{Form::label('tel', 'Telefon')}} <br/>

                         {{Form::input('tel', 'tel','', array('class' => 'form-control'))}}

                     </p>

                     <p>
                         {{Form::label('startYear', 'Startår')}} <br/>

                         {{Form::input('number', 'startYear','', array('class' => 'form-control'))}}

                     </p>

                     <p>
                         {{Form::label('company', 'Företag','', array('class' => 'form-control'))}} <br/>

                         {{Form::text('company','', array('class' => 'form-control'))}}

                     </p>
                     </div>
                     <div class = "col-sm-6">
                 	<h3>Inloggningsuppgifter</h3>
                 	<p>
                 		{{Form::label('username', 'Användarnamn')}} <br/>

                 		{{Form::text('username','', array('class' => 'form-control'))}}

                 	</p>
                 	<p>
                 		{{Form::label('email', 'Email:')}} <br/>

                 		{{Form::text('email','', array('class' => 'form-control'))}}
                 	</p>

                     <p>
                         {{Form::label('password', 'Lösenord')}} <br/>

                         {{Form::password('password', array('class' => 'form-control'))}}

                     </p>

                     {{Form::hidden('level', 1)}}
                     <p>
                     {{Form::checkbox('agreement')}} Jag godkänner att andra alumner tar del av min information.
                     </p>
                 	<p> {{Form::submit('Skapa konto', array('class' => 'btn btn-success'))}} </p>
                 	{{Form::close()}}
                 	</div>

            </div>
        </div>
    </div>
</div>
@stop