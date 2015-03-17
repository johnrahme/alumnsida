@extends('layouts.default')

@section('content')
<div class = "row">
    <div class = "col-md-4">
        <h2>Återställ lösenord</h2>
         @include('common.users_errors')
            Kom ihåg att ändra lösenordet så snart du loggat in.

        	{{Form::open(array('route'=> 'recover','method' => 'put'))}}
        	<p>
        		{{Form::label('email', 'Email:')}} <br/>

        		{{Form::text('email', '', array('class'=> 'form-control'))}}
        	</p>

        	<p> {{Form::submit('Skicka nytt lösenord', array('class' => 'btn btn-success'))}} </p>
        	{{Form::close()}}

    </div>
</div>




@stop
