@extends('layouts.default')

@section('content')

<div class = "row">
   <div class="col-md-4">{{Form::text('search', '', array('id' => 'search', 'placeholder' => 'Sök...','class' => 'form-control'))}}</div>
</div>
<br>
{{--Lägga i ordning!--}}
<div class = "row">
    <div class="col-md-4">
    Lägg Menyn i rätt ordning!
        <div class = "navbar navbar-inverse navbar-static-top">

                    <ul class = "nav navbar-nav navbar-left">
                            <div id='cssmenu'>
                                <ul class = "sortable">
                                    @foreach ($menus as $menu)
                                        <li class='has-sub last' id = "{{$menu->url}}"><a href='#'><span>{{$menu->name}}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                    </ul>

        </div>
    </div>
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

{{ Form::open(array('route'=>array('menu.arrange'), 'id' => 'sortForm'))}}
{{Form::hidden('order','',array('id' => 'order'))}}
{{Form::close()}}
@stop

@section('scripts')
<script>
  $(function() {
    $( ".sortable" ).sortable({opacity: 0.5, cursor: 'move', update: function(){
        var order = $(this).sortable("toArray");
        $("#order").val(JSON.stringify(order));
        $('#sortForm').submit();

    }});
    $( ".sortable" ).disableSelection();
  });
  </script>

{{HTML::script('js/searchable.js')}}
@stop