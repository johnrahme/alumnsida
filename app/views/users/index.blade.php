@extends('layouts.default')

@section('content')
	<h1> Användare</h1>
	<ul>
	@foreach($users as $user)
	
	<li> {{link_to_route('user',$user->name, array($user->id))}} </li>
	
	@endforeach
	</ul>
	<p>{{link_to_route('new_user', 'New User')}}</p>
@stop