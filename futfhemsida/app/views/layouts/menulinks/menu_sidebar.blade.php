 @if(!is_null($currentMenu))
 @foreach($currentSubMenus as $currentSubMenu)
<li  id = "{{$currentSubMenu->url}}2" class> {{link_to($currentSubMenu->url,$currentSubMenu->name)}}</li>
@endforeach
@endif