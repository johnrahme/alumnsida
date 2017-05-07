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
    {{ HTML::style('css/dropdownMenu.css') }}
    {{ HTML::style('css/footer.css') }}
    {{ HTML::style('jasny-bootstrap/css/jasny-bootstrap.css') }}
    {{--LinkedIn--}}
    @include('sessions.linkedIn.linkedIn')
    @yield('styles')
</head>
<body>
<!-- Navbar -->
<div id="wrapping">
@include('layouts.defaultBackground') <!-- The triangular moving background-->
    <div id="dropdownMenu" style="width: 100%; z-index: 1000">
        <ul>
            <a onclick="window.location.href='{{url('/')}}'" class="dropdownMenu-logo"></a>
            <a onclick="window.location.href='{{url('/')}}'" class="dropdownMenu-brand">FUTF</a>
            @include('layouts.menulinks.menu_default')
        </ul>
    </div>
    <a style="z-index: 10000" href="#" class="scrollToTop"></a>

    <!-- Container -->
    <div id="main" class="container clear-top conatinerScreen containerCustom" style="background-color: rgba(255, 255, 255, .75);">
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
                @include('samarbetspartners.samarbetspartners_start')
            </div>
            <div class="col-sm-9">
                @yield('content')
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
{{ HTML::script('js/dropdownFadeOut.js')}}
{{ HTML::script('js/showHideButton.js')}}
{{ HTML::script('js/bootstrap-toolkit.min.js')}}
{{ HTML::script('js/scrollToTop.js')}}
{{ HTML::script('js/sidemenupanel.js')}}
{{ HTML::script('https://addthisevent.com/libs/1.5.8/ate.min.js')}}
{{ HTML::script('js/jquery.ui.touch-punch.min.js')}}
{{ HTML::script('js/sammarbetspartners.js')}}
{{ HTML::script('js/dropdownMenu.js')}}
{{ HTML::script('js/custom.js')}}
{{ HTML::script('jasny-bootstrap/js/jasny-bootstrap.js')}}
<!-- Script -->
@yield('scripts')
<script>
    @if(isset($active))
    $(document).ready(function () {
        var active = '#{{$active}}';
        $(active).addClass("active");
    });
    @endif
</script>
<script type="text/javascript">
    $("#dropdownMenu").dropdownMenus({
        title: "", /*Som ska visas ihopdragen meny vid liten skärm*/
        format: "multitoggle" /*Typ av dropdownmenu vid liten skärm*/
    });
</script>
@include('cookies.cookie')
</body>
</html>