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
                <th>{{$currNews->created_at}}</th>
                <th @if($currNews->url != 'empty')style="width: 200px; height: 200px"@endif>@if($currNews->url != 'empty'){{HTML::image($currNews->url, '', array('class' => 'img-responsive'))}}@endif</th>
            </tr>
        @endforeach
    </table>
@stop

@section('scripts')

@stop