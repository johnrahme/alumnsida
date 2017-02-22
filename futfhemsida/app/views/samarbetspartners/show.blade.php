@extends('layouts.default')

@section('content')

    <h1>{{$sp->name}}</h1>
    <!--url har värdet 'empty' om det inte finns någon bild-->
    @if($sp->url != 'empty')
        {{HTML::image($sp->url, '', array('class' => 'img-responsive'))}}
    @endif
    <div style="word-wrap: break-word">
        <p><i>{{$sp->abstract}}</i> </p>
        <p>{{$sp->content}}</p>
        <p>Order: {{$sp->order}}</p>
    </div>

    <td>
        {{ Form::open(array('url'=>'sp/delete', 'method' =>'DELETE')) }}
        {{ Form::hidden('id', $sp->id)}}
        {{ Form::submit('Radera', array('class'=>'btn btn-danger btn-sm')) }}
        {{Form::close()}}
    </td>

    <td>{{link_to_route('samarbetspartners.edit','Ändra', $sp->id, array('class'=>'btn btn-primary btn-sm'))}}</td>

@stop

@section('scripts')

@stop