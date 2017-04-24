@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-4">{{Form::text('search', '', array('id' => 'search', 'placeholder' => 'Sök...','class' => 'form-control'))}}</div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th data-sortable="true">Namn</th>
                        <th data-sortable="true">Email</th>
                        <th data-sortable="true">Profil</th>
                    </tr>
                    </thead>
                    <tbody class="searchable">
                    @foreach ($admins as $admin)
                        <tr>
                            <td>{{$admin->name}} {{$admin->surname}}</td>
                            <th> {{ HTML::mailto($admin->email) }}</th>
                            <th> {{link_to_route('view_admin', 'Visa', array('id' => $admin->id))}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br>


@stop

@section('scripts')

    {{HTML::script('js/searchable.js')}}
@stop