@extends('layouts.default')

@section('content')
    <style>
            table tr:nth-child(odd){
                background-color: #dddddd;
            }
    </style>

    <table style="width: 100%">
        @foreach($news as $currNews)
            <tr>
                <th>{{link_to_route('news.show',$currNews->name,$currNews->id)}}</th>
                <th>{{$currNews->author}}</th>
            </tr>
        @endforeach
    </table>
@stop

@section('scripts')

@stop