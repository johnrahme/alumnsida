<!DOCTYPE html>
<html>
<head>
    <title> {{$title}} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSS are placed here -->
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}
    {{ HTML::style('css/jquery.datetimepicker.css') }}
    {{ HTML::style('css/customBootTest.css') }}

    {{--LinkedIn--}}
    @include('sessions.linkedIn.linkedIn')
    @yield('styles')

</head>

<body style = "background-image: url('{{URL::asset('img/yellow2.jpg');}}');background-repeat: no-repeat;background-attachment: fixed;">
<!-- Navbar -->
<div id = "wrap">
    <div class = "navbar navbar-inverse navbar-static-top">
        <div class = "container">
            <!--<div class = "navbar-header">
                <a href = "{{url('/')}}" class = "navbar-brand">{{ HTML::image(URL::asset('img/TuppStorR.png'),'banner', array('class'=>'img-responsive', 'style'=>'height: 187%')) }}</a>
                <a href = "{{url('/')}}" class = "navbar-brand">Föreingen Uppsala Tekniska Fysiker</a>
                <a href = "{{url('/')}}" class = "navbar-brand">{{ HTML::image(URL::asset('img/TuppStor.png'),'banner', array('class'=>'img-responsive', 'style'=>'height: 187%')) }}</a>
                <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                    <span class = "icon-bar"> </span>
                    <span class = "icon-bar"> </span>
                    <span class = "icon-bar"> </span>

                </button>
            </div>-->
            <div class = "navbar-collapse collapse navHeaderCollapse" id ="cssmenu">
                <ul class = "nav navbar-nav navbar-right">
                    @if(Auth::check())
                                <li class='has-sub last'><a href='#'>DropdownTest</a>
                                   <ul>
                                      <li class='has-sub'><a href='#'><span>Test 1</span></a>
                                         <ul>
                                            <li><a href='#'><span>Test1</span></a></li>
                                            <li class='last'><a href='#'><span>Test2</span></a></li>
                                         </ul>
                                      </li>
                                      <li class='has-sub'><a href='#'><span>Test 2</span></a>
                                         <ul>
                                            <li><a href='#'><span>Test1</span></a></li>
                                            <li class='last'><a href='#'><span>Test2</span></a></li>
                                         </ul>
                                      </li>
                                   </ul>
                                </li>
                                
                                <li class='has-sub last' id = "start"> {{link_to('/','Start')}}</li>
                                <li class='has-sub last' id = "events"> {{link_to_route('events','Event')}}</li>
                                <li class='has-sub last' id = "admin"> {{link_to_route('admin','Styrelsemedlemmar')}}</li>
                                <li class='has-sub last' id = "menu"> {{link_to_route('menu.index','Menyer')}}</li>
                                {{--Detta bör troligtvis göras snyggare--}}
                                <?php
                                $menus = Menu::orderBy('order')->get();
                                ?>
                                @foreach($menus as $menu)
                                    <?php
                                        $subMenusView = Submenu::where('menuId','=',$menu->id)->orderBy('order')->get();
                                    ?>
                                    <li class='has-sub last' id = '{{$menu->url}}'> {{link_to_route('menu.dyn',$menu->name, $menu->url)}}
                                            <ul id = "menu{{$menu->id}}">
                                                @foreach($subMenusView as $subMenu)
                                                  <li class='has-sub' id = "{{$subMenu->id}}">{{link_to_route('menu.dyn',$subMenu->name, $subMenu->url)}}
                                                  </li>
                                                @endforeach
                                           </ul>
                                    </li>

                                @endforeach
                                <li class='has-sub last'> <a href = "#contact" data-toggle = "modal">Kontakt</a></li>
                     @else

                            <li class='has-sub last'><a href='#'><span>Dropdown Test</span></a>
                               <ul>
                                  <li class='has-sub'><a href='#'><span>Test 1</span></a>
                                     <ul>
                                        <li><a href='#'><span>Test1</span></a></li>
                                        <li class='last'><a href='#'><span>Test2</span></a></li>
                                     </ul>
                                  </li>
                                  <li class='has-sub'><a href='#'><span>Test 2</span></a>
                                     <ul>
                                        <li><a href='#'><span>Test1</span></a></li>
                                        <li class='last'><a href='#'><span>Test2</span></a></li>
                                     </ul>
                                  </li>
                               </ul>
                            </li>
                            <li class='has-sub last' id = "start"> {{link_to('/','Start')}}</li>
                            <li class='has-sub last' id = "events"> {{link_to_route('events','Event')}}</li>
                            <li class='has-sub last' id = "create">{{link_to_route('new_admin', 'Skapa konto')}}</li>
                            {{--<li> {{link_to_route('login','Login')}}</li>--}}
                            @if(isset($showLogin))
                                <li class='has-sub last' id = "login"> <a href = "#modalLogin" data-toggle = "modal">Login</a></li>
                            @endif
                            <li class='has-sub last' id = "contactA"> <a href = "#contact" data-toggle = "modal">Kontakt</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- Container -->
    <div id = "main" class="container clear-top" style = "box-shadow: 0px 0px 5px 2px #888888; background-color: #fff; padding: 18px">

        <div class = "row">
            <div class = "@if(Auth::check()) col-md-9 @else col-md-12 @endif">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                      <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                      {{Session::get('message')}}
                    </div>
                @endif
                @if(Session::has('errorMessage'))
                <div class="alert alert-danger" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <span class="sr-only">Error:</span>
                  {{Session::get('errorMessage')}}
                </div>
                @endif
            </div>
            @if(Auth::check())
            <div class = "col-md-3" style = "padding-bottom: 10px">
                    <div class="dropdown" align = "right">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true" >
                          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                          Inloggad som {{Auth::user()->username}}
                          <span class="caret"></span>
                        </button>

                      <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('logout')}}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logga ut</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('edit_admin', Auth::user()->id)}}"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Ändra konto</a></li>
                      </ul>
                    </div>
            </div>
            @endif
        </div>
    @include('contact.index')
    @include('sessions.modalLogin')

        <!-- Content -->
    @yield('content')

    </div>
</div>
@include('layouts.defaultFooter')
<!-- Scripts are placed here -->
    {{ HTML::script('js/jquery-1.11.1.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/jquery.datetimepicker.js')}}
    {{ HTML::script('js/checkmodal.js')}}
    {{ HTML::script('js/jquery-ui.js')}}
    {{ HTML::script('https://addthisevent.com/libs/1.5.8/ate.min.js')}}

<script>
    @if(isset($active))
    $(document).ready(function(){
        var active = '#{{$active}}';
        $(active).addClass("active");
    });
    @endif
</script>
<!-- Script -->
    @yield('scripts')
</body>
</html>