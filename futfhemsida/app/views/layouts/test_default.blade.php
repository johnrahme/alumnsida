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
</head>

<body style = "background-image: url('{{URL::asset('img/yellow2.jpg');}}');background-repeat: no-repeat;background-attachment: fixed;">
<!-- Navbar -->
<div id = "wrap">
    <div class = "navbar navbar-inverse navbar-static-top">
        <div class = "container">
            <div class = "navbar-header">
                {{--<a href = "{{url('/')}}" class = "navbar-brand">{{ HTML::image(URL::asset('img/TuppStorR.png'),'banner', array('class'=>'img-responsive', 'style'=>'height: 187%')) }}</a>
                <a href = "{{url('/')}}" class = "navbar-brand">Föreingen Uppsala Tekniska Fysiker</a>
                <a href = "{{url('/')}}" class = "navbar-brand">{{ HTML::image(URL::asset('img/TuppStor.png'),'banner', array('class'=>'img-responsive', 'style'=>'height: 187%')) }}</a>--}}
                <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                    <span class = "icon-bar"> </span>
                    <span class = "icon-bar"> </span>
                    <span class = "icon-bar"> </span>

                </button>
            </div>
            <div class = "navbar-collapse collapse navHeaderCollapse">
                <ul class = "nav navbar-nav navbar-right">
                    @if(Auth::check())
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
</body>
</html>