@extends('layouts.default')

@section('content')

	<p>{{link_to_route('new_user', 'New User')}}</p>
    <p>{{Form::text('search', '', array('id' => 'search', 'placeholder' => 'Sök...'))}}</p>

	<div class="table-responsive">
	    <table class = "table table-striped table-bordered">
	    <tr>
	        <td>Namn</td>
	        <td>Email</td>
	        <td>Telefon</td>
	        <td>Starår</td>
	    </tr>
          @foreach ($users as $user)
           <tr>
            <td>{{link_to_route('user',$user->name, array($user->id))}} </td>
            <td>{{$user->email}}</td>
            <td>{{$user->tel}}</td>
            <td>{{$user->startYear}}</td>
          </tr>
          @endforeach
        </table>
	</div>

@stop

@section('scripts')

<script>
$('#search').keyup(function() {
    var that = this;
    $.each($('tr'),
    function(i, val) {
        if ($(val).text().indexOf($(that).val()) == -1) {
            $('tr').eq(i).hide();
        } else {
            $('tr').eq(i).show();
        }
    });
});
</script>
@stop