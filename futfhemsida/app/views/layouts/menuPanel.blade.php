<?php

$currentMenu = Menu::where('url', '=',$active)->first();
if(!is_null($currentMenu)){
	$currentSubMenus = Submenu::where('menuId', '=', $currentMenu->id)->get();

}
 ?>
@if(!is_null($currentMenu))
<div class = "navbar navbar-default">
	<div class="page-header" style="margin-top: 0px;margin-left: 10px">
		<h3>{{$currentMenu->name}}</h3>
	</div>
	<div class = "">
		<ul class="nav">
		@include('layouts.menulinks.menu_sidebar')
		</ul>
	</div>
</div>
@endif
