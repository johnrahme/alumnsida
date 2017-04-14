@if(!is_null($activeMenu))
    <ul>
        @foreach($currentSubMenus as $currentSubMenu)
            <?php
            $currentSubSubMenus = Subsubmenu::where('subMenuId', '=', $currentSubMenu->id)->orderBy('order')->get();
            ?>
            <li id="{{$currentSubMenu->url}}2"> {{link_to($currentSubMenu->url,$currentSubMenu->name)}}
                <ul class="blockSidemenuPanel_ul">
                    @foreach($currentSubSubMenus as $currentSubSubMenu)
                        <li class="blockSidemenuPanel_li">
                            {{link_to($currentSubSubMenu->url,$currentSubSubMenu->name)}}
                            <ul class="test"></ul>
                        </li>
                    @endforeach
                </ul>
            </li>

        @endforeach
    </ul>
@endif