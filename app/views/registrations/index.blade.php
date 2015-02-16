@extends('layouts.default')

@section('content')

<h1> Registreringar till "{{$event->name}}" </h1>


<div class = "row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class = "table table-striped table-bordered">
                <thead>
                <tr>
                    <th data-sortable = "true">Namn</th>
                    <th data-sortable = "true">Email</th>
                    <th data-sortable = "true">Telefon</th>
                    <th data-sortable = "true">Radera</th>
                </tr>
                </thead>
                <tbody class = "searchable">
                  @foreach ($registrations as $registration)
                   <tr>
                    <td>{{$registration->name}} {{$registration->surname}} </td>
                    <td>{{$registration->email}}</td>
                    <td>{{$registration->tel}}</td>
                    <td>
                    {{ Form::open(array('url'=>'registrations/delete', 'method' =>'DELETE')) }}
                    {{ Form::hidden('id', $registration->id)}}
                    {{ Form::submit('Radera', array('class'=>'btn btn-danger btn-sm')) }}
                    {{ Form::close() }}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
            </div>
        </div>
</div>
@stop