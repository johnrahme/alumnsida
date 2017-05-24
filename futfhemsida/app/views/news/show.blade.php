@extends('layouts.default')

@section('content')

    <h1>{{$news->name}}</h1>
    <!--url har värdet 'empty' om det inte finns någon bild-->
    @if($news->url != 'empty')
        {{HTML::image($news->url, '', array('class' => 'img-responsive'))}}
    @endif
    <div style="word-wrap: break-word">
        {{--<p><i>{{$news->abstract}}</i></p>--}} {{--Onödigt med repititio om man skriver samma i abstract och content--}}
        <p>{{$news->content}}</p>
        @if(Auth::check())
        <p>Order: {{$news->order}}</p> {{--Onödigt att se om man inte är inloggad--}}
        @endif
        <p><i>Författare: {{$news->author}}</i></p>
    </div>

    @if(Auth::check())
        <td>
            {{ Form::open(array('url'=>'news/delete', 'method' =>'DELETE')) }}
            {{ Form::hidden('id', $news->id)}}
            {{ Form::submit('Radera', array('class'=>'btn btn-danger btn-sm')) }}
            {{Form::close()}}
        </td>
        <td>{{link_to_route('news.edit','Ändra', $news->id, array('class'=>'btn btn-primary btn-sm'))}}</td>
    @endif
@stop

@section('scripts')

@stop