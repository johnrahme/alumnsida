@extends('layouts.default')

@section('content')

<div class = "row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class = "table table-striped table-bordered">
                <thead>
                <tr>
                    <th data-sortable = "true">Användarnamn</th>
                    <th data-sortable = "true">Email</th>
                    <th data-sortable = "true">Ändra</th>
                    <th data-sortable = "true">Radera</th>
                </tr>
                </thead>
                <tbody class = "searchable">
                  @foreach ($admins as $admin)
                   <tr>
                    <td>{{$admin->username}} </td>
                    <td>{{$admin->email}}</td>
                    <td>{{link_to_route('edit_admin','Ändra', $admin->id, array('class'=>'btn btn-primary btn-sm'))}}</td>
                    <td>
                        {{ Form::open(array('url'=>'admin/delete', 'method' =>'DELETE')) }}
                        {{ Form::hidden('id', $admin->id)}}
                        {{ Form::submit('Radera', array('class'=>'btn btn-danger btn-sm')) }}
                        {{Form::close()}}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>

<br>
{{link_to_route('new_admin', 'Ny Admin','' , array('class'=>'btn btn-success'))}}

@stop