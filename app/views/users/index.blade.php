@extends('layouts.default')

@section('content')

	<p>{{ link_to_route('new_user', 'Lägg till användare', array(), array('class'=>'btn btn-primary', 'role' =>'button')) }}</p>
	<div class = "row">
        <div class="col-md-4">{{Form::text('search', '', array('id' => 'search', 'placeholder' => 'Sök...','class' => 'form-control'))}}</div>
    </div>
    </br>
    <div class = "row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class = "table table-striped table-bordered">
                <thead>
                <tr>
                    <th data-sortable = "true">Namn</th>
                    <th data-sortable = "true">Email</th>
                    <th data-sortable = "true">Telefon</th>
                    <th data-sortable = "true">Startår</th>
                </tr>
                </thead>
                <tbody class = "searchable">
                  @foreach ($users as $user)
                   <tr>
                    <td>{{link_to_route('user',$user->name, array($user->id))}} </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->tel}}</td>
                    <td>{{$user->startYear}}</td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')

<script>
    (function ($) {

        $('#search').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));
</script>
@stop