@extends('layouts.default')

@section('content')

    <h1>{{$news->name}}</h1>
    <!--url har värdet 'empty' om det inte finns någon bild-->
    @if($news->url != 'empty')
        {{HTML::image($news->url, '', array('class' => 'img-responsive'))}}
    @endif
    <p><i>{{$news->abstract}}</i> </p>
    <p>{{$news->content}}</p>
    <p>Order: {{$news->order}}</p>
    <p><i>Författare: {{$news->author}}</i> </p>

    <td>
        {{ Form::open(array('url'=>'news/delete', 'method' =>'DELETE')) }}
        {{ Form::hidden('id', $news->id)}}
        {{ Form::submit('Radera', array('class'=>'btn btn-danger btn-sm')) }}
        {{Form::close()}}
    </td>

    <td>{{link_to_route('news.edit','Ändra', $news->id, array('class'=>'btn btn-primary btn-sm'))}}</td>

@stop

@section('scripts')

@stop