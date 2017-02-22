@extends('layouts.default')

@section('content')
    <style>
        table tr:nth-child(odd){
            background-color: #dddddd;
        }
    </style>

    <table style="width: 100%">
        @foreach($sp as$key => $currSp)
            <tr>
                <th>{{link_to_route('samarbetspartners.show',$currSp->name,$currSp->id)}}</th>
                <th>{{$currSp->created_at}}</th>
                <th @if($currSp->url != 'empty')style="width: 200px; height: 200px"@endif>@if($currSp->url != 'empty'){{HTML::image($currSp->url, '', array('class' => 'img-responsive'))}}@endif</th>
            </tr>
        @endforeach
    </table>
@stop

@section('scripts')

@stop