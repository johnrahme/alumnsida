<?php

$currentMenu = Menu::where('url', '=',$active)->first();
if(!is_null($currentMenu)){
	$currentSubMenus = Submenu::where('menuId', '=', $currentMenu->id)->get();

}
 ?>
@if(!is_null($currentMenu))
<div class = "navbar navbar-default" style ="padding-left: 10px">
	<div class="page-header" style="margin-top: 0px">
		<h3>{{$currentMenu->name}}</h3>
	</div>
	<div class = "navbar-collapse">
		<ul class="nav">
		@include('layouts.menulinks.menu_sidebar')
		</ul>
	</div>
</div>
@endif
