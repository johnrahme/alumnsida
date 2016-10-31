{{--Gör i sepparat php fil!! Eller gör på ett bättre sätt!!--}}
<?php
$pageDB = Menu::where('url', '=', Request::path())->first();
$subPageDB = Submenu::where('url', '=', Request::path())->first();
$subSubPageDB = Subsubmenu::where('url', '=', Request::path())->first();
$page = "";
$menuActive = "";
$subactive = "";
$subsubactive = "";
if (!is_null($pageDB)) {
    $page = $pageDB;
    $menuActive = $pageDB;
    $active = $menuActive->url;
}
if (!is_null($subPageDB)) {
    $page = $subPageDB;
    $subactive = $subPageDB->url;
    $menuActive = Menu::find($subPageDB->menuId);
    $active = $menuActive->url;
}
if (!is_null($subSubPageDB)) {
    $page = $subSubPageDB;
    $subsubactive = $subSubPageDB->url;
    $subactiveObj = Submenu::find($subSubPageDB->subMenuId);
    $subactive = $subactiveObj->url;
    $menuActive = Menu::find($subactiveObj->menuId);
    $active = $menuActive->url;
}
?>
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
    {{ HTML::style('css/custom.css') }}
    {{ HTML::style('css/navigationbar.css') }}
    {{ HTML::style('css/scrollbar.css') }}
    {{ HTML::style('css/subsubmenus.css') }}
    {{ HTML::style('css/sidemenupanel.css') }}
    {{ HTML::style('css/dropzone.css') }}
    {{ HTML::style('css/dropzone1.css') }}
    {{ HTML::style('jasny-bootstrap/css/jasny-bootstrap.css') }}

    {{--LinkedIn--}}
    @include('sessions.linkedIn.linkedIn')
    @yield('styles')

</head>
<body>
<!-- Navbar -->
<div id="wrapping">
    @include('layouts.defaultBackground') <!-- The triangular moving background-->
    <div>
        <div style="display:none" id="hideAndShow" role="main ">
            <div class="navbar navbar-inverse navbar-default navbar-static-top">
            <div onclick="location.href='{{url('/login')}}'" class="navbar-brand" style="width: 20px; height: 5px; top: 0px; left: 99%; position:relative; z-index: 10000;"></div>
                <a href = "{{url('/')}}" class = "navbar-brand">Föreingen Uppsala Tekniska Fysiker</a>
                <div id='navigationbar' class="navigationbar">
                    <ul role="navigation">
                        <li id="futf"> {{link_to('/','Futf')}}</li>
                        <li id="alumn"> {{link_to('http://alumn.futf.se/','Alumn')}}</li>
                        <li id="nyhetsbrev"> {{link_to('http://nyhetsbrev.futf.se/','Nyhetsbrev')}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="box">
            <span class="navigationbarbutton" style="float:left;"><a href="#" id="toggle1"><img src="img/arrow.png" height="33" width="29" id="bg" style="margin-top:0px; margin-left: 10px"/></a></span>
        </div>
    </div>
    <div class="column-center">
        <div class="container clear-top" style="padding:0px" role="main">
            <div class="navbar navbar-inverse navbar-default">
                <div onclick="location.href='{{url('/')}}'" class="tupplogoR_small img-responsive">
                    <div class="navbar-header">
                        {{--<a href = "{{url('/')}}" class = "navbar-brand">{{ HTML::image(URL::asset('img/TuppStorR.png'),'banner', array('class'=>'img-responsive', 'style'=>'height: 187%')) }}</a>
                        <a href = "{{url('/')}}" class = "navbar-brand">Föreingen Uppsala Tekniska Fysiker</a>
                        <a href = "{{url('/')}}" class = "navbar-brand">{{ HTML::image(URL::asset('img/TuppStor.png'),'banner', array('class'=>'img-responsive', 'style'=>'height: 187%')) }}</a>--}}
                        <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                            <span class="icon-bar"> </span>
                            <span class="icon-bar"> </span>
                            <span class="icon-bar"> </span>
                        </button>
                    </div>
                </div>
                <div class="navbar-collapse collapse navHeaderCollapse dropdownArrow" role="navigation">
                    <div onclick="location.href='{{url('/')}}'" class="tupplogoR img-responsive">
                        <div onclick="location.href='{{url('/')}}'" class="tupplogo img-responsive">
                            <ul class="nav navbar-nav">
                                <!--<div id="screenSize" class="sizeShowHidenav navbar-nav">
                                    <li id="futf"> {{link_to('/','Futf')}}</li>
                                   <li id="alumn"> {{link_to('http://alumn.futf.se/','Alumn')}}</li>
                                    <hr>
                                </div>-->
                                @include('layouts.menulinks.menu_default')
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="column-right">
    </div>
    <a href="#" class="scrollToTop"></a>

<!-- Container -->

    <div id="main" class="container clear-top conatinerScreen">
        <div class="row">
            <div class="@if(Auth::check()) col-md-9 @else col-md-12 @endif">
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
                <div class="col-md-3" style="padding-bottom: 10px">
                    <div class="dropdown" align="right">
                        <button class="btn btn-default" style="margin-bottom: -2px" type="button" id="dropdownMenu1"
                                data-toggle="dropdown" aria-expanded="true">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            Inloggad som {{Auth::user()->username}}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('logout')}}"><span
                                            class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logga ut</a>
                            </li>
                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                       href="{{route('edit_admin', Auth::user()->id)}}"><span
                                            class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Ändra
                                    konto</a></li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
        @include('contact.index')
        @include('sessions.modalLogin')

        <div class="row">

            <div class="col-sm-3">
                @include('layouts.menuPanel')
                <div id="id_företag" style="padding-top: 20px; display:none;">
                    <div class="panel panel-default">
                        <h4 style="text-align: center; ">Sammarbetspartners</h4>
                        <div>
                            <p>För närvarande finns inga sammarbetspartners.</p>  // Gör klart detta :)
                            <div @if(Auth::check()) id="dynamicCompany" @else @endif>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                @yield('content')
            </div>
        </div>
    </div>
    @include('layouts.defaultFooter')
</div>
<!-- Scripts are placed here -->
{{ HTML::script('js/jquery-1.11.1.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/jquery.datetimepicker.js')}}
{{ HTML::script('js/checkmodal.js')}}
{{ HTML::script('js/jquery-ui.js')}}
{{ HTML::script('js/dropdownFadeOut.js')}}
{{ HTML::script('js/showHideButton.js')}}
{{ HTML::script('js/bootstrap-toolkit.min.js')}}
{{ HTML::script('js/scrollToTop.js')}}
{{ HTML::script('js/sidemenupanel.js')}}
{{ HTML::script('https://addthisevent.com/libs/1.5.8/ate.min.js')}}
{{ HTML::script('js/jquery.ui.touch-punch.min.js')}}
{{ HTML::script('js/sammarbetspartners.js')}}
{{ HTML::script('js/dropzone.js')}} <!-- drag'n drop upload -->
{{ HTML::script('jasny-bootstrap/js/jasny-bootstrap.js')}}

<script>

    @if(isset($active))
    $(document).ready(function () {
        var active = '#{{$active}}';
        $(active).addClass("active");
    });
    @endif
</script>
<script>
    if ($(window).width() <= 750) {
        $("#testP").html($(window).width());
        $(".dropdown-toggle").attr({
            'data-toggle': 'dropdown'
        });
    } else {
        $(".dropdown-toggle").removeAttr('data-toggle');
    }
    $(window).on("resize", function () {
        if ($(window).width() <= 750) {
            $("#testP").html($(window).width());
            $(".dropdown-toggle").attr({
                'data-toggle': 'dropdown'
            });
        } else {
            $(".dropdown-toggle").removeAttr('data-toggle');
        }
    });
</script>
<!-- Script -->
@yield('scripts')
</body>

</html>