@if(!is_null($activeMenu))
    @foreach($currentSubMenus as $currentSubMenu)
        <?php
        $currentSubSubMenus = Subsubmenu::where('subMenuId', '=', $currentSubMenu->id)->orderBy('order')->get();
        ?>
        <li id="{{$currentSubMenu->url}}2" class> {{link_to($currentSubMenu->url,$currentSubMenu->name)}}
            <ul>
            @foreach($currentSubSubMenus as $currentSubSubMenu)
            <li>
            {{link_to($currentSubSubMenu->url,$currentSubSubMenu->name)}}
            </li>
            @endforeach
            </ul>
        </li>

    @endforeach
@endif