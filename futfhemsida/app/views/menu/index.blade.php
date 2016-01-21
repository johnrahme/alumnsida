@extends('layouts.default')

@section('content')


    {{--Lägga i ordning!--}}

    <h3>Lägg meny i rätt ordning!</h3>
    <div class="navbar navbar-inverse navbar-default">

        <ul class="navbar-collapse" style="margin: 0px">
            <ul class="nav navbar-nav sortable">
                @foreach ($menus as $menu)
                    <?php
                    $subMenusView = Submenu::where('menuId', '=', $menu->id)->orderBy('order')->get();
                    ?>
                    <li class="dropdown" id="{{$menu->id}}">
                        <a href='#' class="dropdown-toggle">{{$menu->name}}<span
                                    @if(count($subMenusView)!=0)class="caret"@endif></span></a>
                        @if(count($subMenusView)!=0)
                            <ul class="sortable dropdown-menu dropdown-fade" id="menu{{$menu->id}}">
                                @foreach($subMenusView as $subMenu)
                                <?php
                                $subSubMenusView = Subsubmenu::where('subMenuId', '=', $subMenu->id)->orderBy('order')->get();
                                ?>
                                    <li id="{{$subMenu->id}}"class="dropdown-submenu"><a href='#'><span>{{$subMenu->name}}</span></a>
                                    @if(count($subSubMenusView)!=0)
                                        <ul class="sortable dropdown-menu dropdown-fade" id="submenu{{$menu->id}}">
                                            @foreach($subSubMenusView as $subSubMenu)
                                            <li id="{{$subSubMenu->id}}"><a href='#'><span>{{$subSubMenu->name}}</span></a>
                                            @endforeach
                                        </ul>
                                     @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </ul>

    </div>
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
                        <th data-sortable="true">Länk</th>
                        <th data-sortable="true">Föräldermeny 1</th>
                        <th data-sortable="true">Föräldermeny 2</th>
                        <th data-sortable="true">Delete</th>
                    </tr>
                    </thead>
                    <tbody class="searchable">
                    {{--Menus--}}
                    @foreach ($menus as $menu)
                        <tr>
                            <td>{{$menu->name}} </td>
                            <td>{{$menu->url}}</td>
                            <td>Ingen</td>
                            <td>Ingen</td>
                            {{--<td>{{link_to_route('edit_admin','Ändra', $admin->id, array('class'=>'btn btn-primary btn-sm'))}}</td>--}}
                            <?php
                            $submenusCurrent = Submenu::where('menuId', '=', $menu->id)->get();

                            ?>
                            <td>
                                {{ Form::open(array('route'=>array('menu.destroy', $menu->id), 'method' =>'DELETE')) }}

                                @if($submenusCurrent->isEmpty())
                                    {{ Form::submit('Radera', array('class'=>'btn btn-danger btn-sm')) }}
                                @else
                                    {{ Form::submit('Radera', array('class'=>'btn btn-danger btn-sm disabled')) }}
                                @endif
                                {{Form::close()}}
                            </td>
                        </tr>
                    @endforeach
                    {{--Sub Menus--}}
                    @foreach ($submenus as $submenu)
                        <?php
                        $menuFindName = Menu::find($submenu->menuId);
                        $subSubmenusCurrent = Subsubmenu::where('subMenuId', '=', $submenu->id)->get();
                        ?>
                        <tr>
                            <td>{{$submenu->name}} </td>
                            <td>{{$submenu->url}}</td>
                            <td>{{$menuFindName->name}}</td>
                            <td>Ingen</td>
                            {{--<td>{{link_to_route('edit_admin','Ändra', $admin->id, array('class'=>'btn btn-primary btn-sm'))}}</td>--}}
                            <td>

                                {{ Form::open(array('route'=>array('menu.destroySub', $submenu->id), 'method' =>'DELETE')) }}
                                @if($subSubmenusCurrent->isEmpty())
                                    {{ Form::submit('Radera', array('class'=>'btn btn-danger btn-sm')) }}
                                @else
                                    {{ Form::submit('Radera', array('class'=>'btn btn-danger btn-sm disabled')) }}
                                @endif
                                {{Form::close()}}
                            </td>
                        </tr>
                    @endforeach
                    {{--Subsub Menus--}}
                    @foreach ($subsubmenus as $subsubmenu)
                        <?php
                        $subMenuFindName = Submenu::find($subsubmenu->subMenuId);
                        $menuFindName = Menu::find($subMenuFindName->menuId)
                        ?>
                        <tr>
                            <td>{{$subsubmenu->name}} </td>
                            <td>{{$subsubmenu->url}}</td>
                            <td>{{$menuFindName->name}}</td>
                            <td>{{$subMenuFindName->name}}</td>
                            {{--<td>{{link_to_route('edit_admin','Ändra', $admin->id, array('class'=>'btn btn-primary btn-sm'))}}</td>--}}
                            <td>

                                {{ Form::open(array('route'=>array('menu.destroySubSub', $subsubmenu->id), 'method' =>'DELETE')) }}
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
    {{Form::hidden('subSubId','',array('id' => 'subSubId'))}}
    {{Form::close()}}
@stop

@section('scripts')
    <script>
        $(function () {
            $(".sortable").sortable({
                opacity: 0.5, cursor: 'move', update: function () {
                    var subIdString = $(this).attr('id');
                    var order = $(this).sortable("toArray");
                    $("#order").val(JSON.stringify(order));
                    $("#subId").val(subIdString);
                    $('#sortForm').submit();

                }
            });
            $(".sortable").disableSelection();
        });
    </script>

    {{HTML::script('js/searchable.js')}}
@stop