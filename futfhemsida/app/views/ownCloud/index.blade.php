@extends('layouts.default')

@section('styles')
    {{ HTML::style('css/owncloud.css') }}
@stop
<style>
    @media (min-width: 768px) {
        #adjust {
            left: -187.5px;{{-- -187.5 px to replace the column of width 3 to the left (col-sm-3 =3*750px/12=187.5 px) on big screen--}}
        }
    }
</style>

@section('content')
    @if(Auth::check()) <a id="adjust" style="position: relative" href="/owncloud">Till inloggningen av OwnCloud.</a>
    @else
    @endif

    <div id="adjust" class="futf-documents-wrapper panel panel-default" style="width: 100%; position:relative;">
        <iframe class="futf-documents"
                src="http://beta.futf.se/owncloud/public.php?service=files&t=d887b8a22ef2f6ec6380bb5e6a43c467"></iframe>
    </div>
@stop