@extends('layouts.default')

@section('styles')
    {{ HTML::style('css/owncloud.css') }}
@stop

@section('content')

    <div class="futf-documents-wrapper panel panel-default">
        <iframe class="futf-documents"
                src="http://beta.futf.se/owncloud/public.php?service=files&t=bb6e7dc555946d24a5546686f447fe72"></iframe>
    </div>

@stop

@section('scripts')
    {{ HTML::script('js/snake/snake.js') }}
@stop