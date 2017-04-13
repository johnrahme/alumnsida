<?php

$activeMenu = Menu::where('url', '=', $active)->first();
if (isset($subsubactive)) {
    $activeSubSubMenu = Subsubmenu::where('url', '=', $subsubactive)->first();
}
if (isset($subactive)) {
    $activeSubMenu = Submenu::where('url', '=', $subactive)->first();
}
if (!is_null($activeMenu)) {
    $currentSubMenus = Submenu::where('menuId', '=', $activeMenu->id)->get();
}

?>

@if(!is_null($activeMenu)&&isset($activeSubMenu)&&isset($activeSubSubMenu))
    {{Breadcrumbs::renderIfExists('menu.dyn3', $activeMenu, $activeSubMenu, $activeSubSubMenu)}}

@elseif(!is_null($activeMenu)&&isset($activeSubMenu))

    {{Breadcrumbs::renderIfExists('menu.dyn2', $activeMenu, $activeSubMenu)}}
@elseif(!is_null($activeMenu)&&!isset($activeSubMenu))
    {{Breadcrumbs::renderIfExists('menu.dyn1', $activeMenu)}}
@else
    {{Breadcrumbs::renderIfExists()}}
@endif


@if(!is_null($activeMenu))

    {{--Old breadcrumbs!--}}
    {{--<ol class="breadcrumb">
      @if(!isset($subactive)||$subactive=="")
        <li class ="active">{{$activeMenu->name}}</li>
      @else
        <li>{{link_to($activeMenu->url, $activeMenu->name)}}</li>
        <li class ="active">{{$activeSubMenu->name}}</li>
      @endif
    </ol>--}}
    {{--<div>--}}
    {{--<div class="toggleMenu contentsidemenupanel sidemenupanel">--}}
    {{--<div class="" style="margin-top: 5px;margin-bottom: 5px;margin-left: 10px;font-size:17px;">--}}
    {{--{{$activeMenu->name}}--}}
    {{--</div>--}}
    {{--<div class="">--}}
    {{--<ul class="sidemenupanel">--}}
    {{--@include('layouts.menulinks.menu_sidebar')--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}


    <ul class="sidemenu">
        <li>Start
            <a href="#"></a></li>
        <li class="parent">Event
            <a href="#"></a>
            <ul class="sub-nav">
                <li>Event 1</li>
                <ul class="sub-sub-nav">
                    <li>Mer info om event 1</li>
                    <li>Mer info om event 1</li>
                    <li>Mer info om event 1</li>
                </ul>
                <li>Event 2</li>
                <li>Event 3</li>
            </ul>
        </li>
        <li>Kontakt</li>
    </ul>

@endif
