@extends('layouts.default')

@section('content')
Alla views

    @foreach($news as $currNews)
        <li>
            <p>
                <h2>{{link_to_route('news.show',$currNews->name,$currNews->id)}}</h2>
            </p>

        </li>
    @endforeach

@stop

@section('scripts')

@stop