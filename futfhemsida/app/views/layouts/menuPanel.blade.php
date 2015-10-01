<?php

$activeMenu = Menu::where('url', '=',$active)->first();
if(isset($subactive)){
    $activeSubMenu = Submenu::where('url', '=', $subactive)->first();
}
if(!is_null($activeMenu)){
	$currentSubMenus = Submenu::where('menuId', '=', $activeMenu->id)->get();
}
 ?>
@if(!is_null($activeMenu))

<ol class="breadcrumb">

  @if(is_null($subactive)||$subactive=="")
    <li class ="active">{{$activeMenu->name}}</li>
  @else
    <li>{{link_to($activeMenu->url, $activeMenu->name)}}</li>
    <li class ="active">{{$activeSubMenu->name}}</li>
  @endif
</ol>

<div class = "navbar navbar-default">
	<div class="page-header" style="margin-top: 0px;margin-left: 10px">
		<h3>{{$activeMenu->name}}</h3>
	</div>
	<div class = "">
		<ul class="nav">
		@include('layouts.menulinks.menu_sidebar')
		</ul>
	</div>
</div>
@endif
