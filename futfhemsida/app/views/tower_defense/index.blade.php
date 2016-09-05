@extends('layouts.default')

@section('styles')
    {{ HTML::style('css/tower_defense.css') }}
@stop

@section('content')

    <div id="to_small_window"> <!-- Hide if window is smaller than 978px -->
        <canvas id="movable_circle" width="600px" height="600px" style="border:1px solid #000000;">
            Your browser does not support the HTML5 canvas tag.
        </canvas>
    </div>
    <div id="to_small_window2"> <!-- Show if window is to small -->
        <h2>Your window width is too small!</h2>
    </div>

@stop

@section('scripts')
    {{ HTML::script('js/tower_defense/tower_defense.js') }}
    {{ HTML::script('js/tower_defense/tower_defense_map.js') }}
@stop