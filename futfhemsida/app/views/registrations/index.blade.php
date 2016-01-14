@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin-top:0px">
                <h3>Registreringar till "{{$event->name}}"</h3>
            </div>

            {{ Form::open(array('route'=>'registrations.download', 'method' =>'post')) }}
            <div class="form-group">
                {{Form::hidden('eventId', $event->id)}}
                {{Form::label('type', 'Format: ')}}
                <label class="radio-inline">
                    <input type="radio" checked="checked" name="format" id="format2" value="xls"> Excel-fil
                </label>
                <label class="radio-inline">
                    <input type="radio" name="format" id="format1" value="csv"> CSV-fil
                </label>

                {{ Form::submit('Ladda ned', array('class'=>'btn btn-success btn-sm'))}}
            </div>
            {{ Form::close() }}

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th data-sortable="true">Namn</th>
                        <th data-sortable="true">Email</th>
                        <th data-sortable="true">Telefon</th>
                        <th data-sortable="true">Radera</th>
                    </tr>
                    </thead>
                    <tbody class="searchable">
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