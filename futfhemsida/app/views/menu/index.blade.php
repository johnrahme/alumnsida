@extends('layouts.default')

@section('content')
<div class = "row">
    <div class="col-md-4">
    <ul id="sortable" class = "nav navbar-nav navbar-right ">
      <li>Item 1</li>
      <li>Item 2</li>
    </ul>
    </div>
</div>
<div class = "row">
   <div class="col-md-4">{{Form::text('search', '', array('id' => 'search', 'placeholder' => 'Sök...','class' => 'form-control'))}}</div>
</div>
<br>
<div class = "row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class = "table table-striped table-bordered">
                <thead>
                <tr>
                    <th data-sortable = "true">Namn</th>
                    <th data-sortable = "true">Länk</th>
                    <th data-sortable = "true">Delete</th>
                </tr>
                </thead>
                <tbody class = "searchable">
                  @foreach ($menus as $menu)
                   <tr>
                    <td>{{$menu->name}} </td>
                    <td>{{$menu->url}}</td>
                    {{--<td>{{link_to_route('edit_admin','Ändra', $admin->id, array('class'=>'btn btn-primary btn-sm'))}}</td>--}}
                    <td>
                        {{ Form::open(array('route'=>array('menu.destroy', $menu->id), 'method' =>'DELETE')) }}
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
{{link_to_route('menu.create', 'Ny meny','' , array('class'=>'btn btn-success'))}}


@stop

@section('scripts')
  <script>
  $(function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  });
  </script>

{{HTML::script('js/searchable.js')}}
@stop