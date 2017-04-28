@if(!is_null($activeMenu))
    <ul>
        <?php
        $menus = Menu::orderBy('order')->get();
        ?>
        @foreach($menus as $menu)
            @if($menu->online == 1)
                <?php
                $currentSubMenus = Submenu::where('menuId', '=', $menu->id)->orderBy('order')->get();
                ?>
                @foreach($currentSubMenus as $currentSubMenu)
                    <?php
                    $currentSubSubMenus = Subsubmenu::where('subMenuId', '=', $currentSubMenu->id)->orderBy('order')->get();
                    ?>
                    @if($currentSubMenu->online == 1)
                        <li id="{{$currentSubMenu->url}}2"> {{link_to($currentSubMenu->url,$currentSubMenu->name)}}
                            <ul class="blockSidemenuPanel_ul">
                                @foreach($currentSubSubMenus as $currentSubSubMenu)
                                    @if($currentSubSubMenu->online == 1)
                                        <li class="blockSidemenuPanel_li">
                                            {{link_to($currentSubSubMenu->url,$currentSubSubMenu->name)}}
                                            <ul class="test"></ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif

                @endforeach
            @endif
        @endforeach
    </ul>
@endif