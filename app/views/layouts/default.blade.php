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
    @yield('styles')

</head>

<body>
<!-- Navbar -->
<div class = "navbar navbar-inverse navbar-static-top">
    <div class = "container">
        <div class = "navbar-header">
            <a href = "#" class = "navbar-brand"> FUTF:s alumnsida</a>
            <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                <span class = "icon-bar"> </span>
                <span class = "icon-bar"> </span>
                <span class = "icon-bar"> </span>

            </button>
        </div>
        <div class = "navbar-collapse collapse navHeaderCollapse" >
            <ul class = "nav navbar-nav navbar-right">
                @if(Auth::check())
                <li class = "active"> {{link_to('/','Start')}}</li>
                <li> {{link_to_route('users','Användare')}}</li>
                <li> {{link_to_route('events','Events')}}</li>
                <li> {{link_to_route('admin','Admin')}}</li>
                <li> {{link_to_route('logout','Logout')}}</li>
                <li> <a href = "#contact" data-toggle = "modal">Kontakt</a></li>
                @else
                <li class = "active"> {{link_to('/','Start')}}</li>
                <li> {{link_to_route('events','Events')}}</li>
                <li> {{link_to_route('admin','Admin')}}</li>
                <li> {{link_to_route('login','Login')}}</li>
                <li> <a href = "#contact" data-toggle = "modal">Kontakt</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>


<!-- Container -->
<div class="container">
@if(Auth::check())

Logged in as {{Auth::user()->username}}

@endif
@include('contact.index')

    @if(Session::has('message'))
    <p style = "color: #008000;"> {{Session::get('message')}} </p>

    @endif

    <!-- Content -->
    @yield('content')

</div>

<!-- Scripts are placed here -->
{{ HTML::script('js/jquery-1.11.1.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{HTML::script('js/jquery.datetimepicker.js')}}
{{HTML::script('js/checkmodal.js')}}


    <!-- Script -->
    @yield('scripts')

</body>
</html>