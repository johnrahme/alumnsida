<?php

$activeMenu = Menu::where('url', '=', $active)->first();
if (isset($subsubactive)) {
    $activeSubSubMenu = Subsubmenu::where('url', '=', $subsubactive)->first();
}
if (isset($subactive)) {
    $activeSubMenu = Submenu::where('url', '=', $subactive)->first();
}
if (!is_null($activeMenu)) {
    $currentSubMenus = Submenu::where('menuId', '=', $activeMenu->id)->orderBy('order')->get();
}

?>
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
    <nav id='sidemenuPanel'>
        @include('layouts.menulinks.menu_sidebar')
    </nav>


@endif
