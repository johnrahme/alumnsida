<?php
/**
 * Created by PhpStorm.
 * User: jhara
 * Date: 2017-05-19
 * Time: 20:47
 */

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

@if(!is_null($activeMenu)&&isset($activeSubMenu)&&isset($activeSubSubMenu))
    {{Breadcrumbs::renderIfExists('menu.dyn3', $activeMenu, $activeSubMenu, $activeSubSubMenu)}}

@elseif(!is_null($activeMenu)&&isset($activeSubMenu))

    {{Breadcrumbs::renderIfExists('menu.dyn2', $activeMenu, $activeSubMenu)}}
@elseif(!is_null($activeMenu)&&!isset($activeSubMenu))
    {{Breadcrumbs::renderIfExists('menu.dyn1', $activeMenu)}}
@else
    {{Breadcrumbs::renderIfExists()}}
@endif
