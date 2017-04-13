@if(Auth::check())
    <li id="start"> {{link_to('/','Start')}}</li>
    <li id="events"> {{link_to_route('events','Event')}}</li>
    <li id="admin"> {{link_to_route('admin','Styrelsemedlemmar')}}</li>
    <li id="menu"> {{link_to_route('menu.index','Menyer')}}</li>
    <li id="news"> {{link_to_route('news','Nyhetsarkiv')}}</li>
    {{--<li id="tower_defense"> {{link_to_route('tower_defense','Tower Defense')}}</li>--}}
    {{--<li id="snake"> {{link_to_route('snake','Snake')}}</li>--}}
    <li id="ownCloud"> {{link_to_route('ownCloud','Filer')}}</li>
    <li id="events"> {{link_to_route('samarbetspartners','Samarbetspartners')}}</li>

    {{--Detta bör troligtvis göras snyggare--}}
    <?php
    $menus = Menu::orderBy('order')->get();
    ?>
    @foreach($menus as $menu)
        <?php
        $subMenusView = Submenu::where('menuId', '=', $menu->id)->orderBy('order')->get();
        ?>
        <li id='{{$menu->url}}'>
            @if(count($subMenusView)!= 0)
                <a href="{{route('menu.dyn',$menu->url)}}" class="testa_mig">{{$menu->name}}</a>
                <ul class="dropdown-fade">
                    @foreach($subMenusView as $subMenu)
                        <li id="{{$subMenu->id}}">{{link_to_route('menu.dyn',$subMenu->name, $subMenu->url)}}
                        </li>
                    @endforeach
                </ul>
            @else
                <a href= {{route('menu.dyn',$menu->url)}}>{{$menu->name}}</a>
            @endif
        </li>

    @endforeach
    <li><a href="#contact" data-toggle="modal">Kontakt</a></li>
@else

    {{--<li id="futf"> {{link_to('/','Futf')}}</li>
    <li id="alumn"> {{link_to('http://alumn.futf.se/','Alumn')}}</li>--}}
    <li id="start"> {{link_to('/','Start')}}</li>
    <li id="events"> {{link_to_route('events','Event')}}</li>
    {{--<li id="create">{{link_to_route('new_admin', 'Skapa konto')}}</li>--}}
    {{--<li> {{link_to_route('login','Login')}}</li>--}}
    @if(isset($showLogin))
        <li id="login"><a href="#modalLogin" data-toggle="modal">Login</a></li>
    @endif
    <li id="contactA"><a href="#contact" data-toggle="modal">Kontakt</a></li>
@endif