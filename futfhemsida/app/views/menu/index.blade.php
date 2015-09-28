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
                                    <?php
                                        $subMenusView = Submenu::where('menuId','=',$menu->id)->orderBy('order')->get();
                                    ?>
                                        <li class='has-sub last' id = "{{$menu->id}}"><a href='#'><span>{{$menu->name}}</span></a>
                                            <ul class = "sortable" id = "menu{{$menu->id}}">
                                                @foreach($subMenusView as $subMenu)
                                                  <li class='has-sub' id = "{{$subMenu->id}}"><a href='#'><span>{{$subMenu->name}}</span></a>
                                                  </li>
                                                @endforeach
                                           </ul>
                                        </li>
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
                    <th data-sortable = "true">Föräldermeny</th>
                    <th data-sortable = "true">Delete</th>
                </tr>
                </thead>
                <tbody class = "searchable">
                  @foreach ($menus as $menu)
                   <tr>
                    <td>{{$menu->name}} </td>
                    <td>{{$menu->url}}</td>
                    <td>Ingen</td>
                    {{--<td>{{link_to_route('edit_admin','Ändra', $admin->id, array('class'=>'btn btn-primary btn-sm'))}}</td>--}}
                    <?php
                        $submenusCurrent = Submenu::where('menuId', '=', $menu->id)->get();

                    ?>
                    @if($submenusCurrent->isEmpty())
                    <td>
                        {{ Form::open(array('route'=>array('menu.destroy', $menu->id), 'method' =>'DELETE')) }}
                        {{ Form::submit('Radera', array('class'=>'btn btn-danger btn-sm')) }}
                        {{Form::close()}}
                    </td>
                    @endif
                  </tr>
                  @endforeach

                  @foreach ($submenus as $submenu)
                    <?php
                        $menuFindName = Menu::find($submenu->menuId);
                    ?>
                   <tr>
                    <td>{{$submenu->name}} </td>
                    <td>{{$submenu->url}}</td>
                    <td>{{$menuFindName->name}}</td>
                    {{--<td>{{link_to_route('edit_admin','Ändra', $admin->id, array('class'=>'btn btn-primary btn-sm'))}}</td>--}}
                    <td>
                        {{ Form::open(array('route'=>array('menu.destroySub', $submenu->id), 'method' =>'DELETE')) }}
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
{{Form::hidden('subId','',array('id' => 'subId'))}}
{{Form::close()}}
@stop

@section('scripts')
<script>
  $(function() {
    $( ".sortable" ).sortable({opacity: 0.5, cursor: 'move', update: function(){
        var subIdString = $(this).attr('id');
        var order = $(this).sortable("toArray");
        $("#order").val(JSON.stringify(order));
        $("#subId").val(subIdString);
        $('#sortForm').submit();

    }});
    $( ".sortable" ).disableSelection();
  });
  </script>

{{HTML::script('js/searchable.js')}}
@stop