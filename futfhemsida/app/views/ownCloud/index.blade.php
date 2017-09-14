@extends('layouts.default')

@section('styles')
    {{ HTML::style('css/owncloud.css') }}
@stop

@section('content')
    @if(Auth::check()) 
		<a style="position: relative" href="/owncloud">Till inloggningen av OwnCloud.</a>
    @endif

    <div class="futf-documents-wrapper panel panel-default" style="width: 100%; position:relative;">
        <iframe class="futf-documents"
                src="http://futf.se/owncloud/public.php?service=files&t=d887b8a22ef2f6ec6380bb5e6a43c467"></iframe>
    </div>
@stop