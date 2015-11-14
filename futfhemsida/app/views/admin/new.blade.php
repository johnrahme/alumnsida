@extends('layouts.default')

@section('content')

<div class = "row">
    <div class = "col-md-12">
        <div class = "panel panel-default">
            <div class = "panel-body" style = "padding-top: 0">
                 <div class = "page-header" style = "margin-top:0px">
                    <h2>Skapa ett konto <small>eller </small><script type="in/Login"></script></h2>
                 </div>
                 @include('common.users_errors')
                 Om du är medlem i styrelsen kan du be it-ansvarig att skapa ett konto åt dig.
                 <div class = "col-sm-6">

                 	{{Form::open(array('url'=> 'admin/create','files'=>true))}}

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
                        {{Form::label('accounttype', 'Kontotyp')}} <br/>
                        {{Form::select('accounttype', array('styrelse' => 'Styrelsemedlem', 'it' => 'IT-support', 'extra' => 'Övrigt'), 'styrelse', array('class' => 'form-control'))}}
                     </p>
                     <p>
                        {{Form::label('description', 'Beskrivning')}}
                        {{Form::textarea('description', '', array('class' => 'form-control'))}}
                     </p>

                     </div>
                     <div class = "col-sm-6">
                 	<h3>Inloggningsuppgifter</h3>
                 	<p>
                 		{{Form::label('username', 'Användarnamn', array('class' => 'required'))}} <br/>

                 		{{Form::text('username','', array('class' => 'form-control'))}}

                 	</p>
                 	<p>
                 		{{Form::label('email', 'Email', array('class' => 'required'))}} <br/>

                 		{{Form::text('email','', array('class' => 'form-control'))}}
                 	</p>

                     <p>
                         {{Form::label('password', 'Lösenord', array('class' => 'required'))}} <br/>

                         {{Form::password('password', array('class' => 'form-control'))}}

                     </p>

                     <p>
                        {{Form::label('post', 'Postnamn')}}

                        {{Form::text('post', '',array('class' => 'form-control'))}}
                     </p>

                     <p>
                        {{Form::label('level', 'Level')}} <br/>
                        {{Form::select('level', array(1 => '1', 2 => '2'), 1, array('class' => 'form-control'))}}
                     </p>

                 	<p> {{Form::submit('Skapa konto', array('class' => 'btn btn-success'))}} </p>
                 	{{Form::close()}}
                 	</div>

            </div>
        </div>
    </div>
</div>
@stop