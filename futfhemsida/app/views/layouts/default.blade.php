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

    <div class = "container clear-top" style = "padding:0px" role="main">
        <div class = "navbar navbar-inverse navbar-default">
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
            <div class = "navbar-collapse collapse navHeaderCollapse" role="navigation">
                <ul class = "nav navbar-nav navbar-left">
					@include('layouts.menulinks.menu_default')
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

    <div class = "row">
    	<div class = "col-sm-3">
			@include('layouts.menuPanel')
    	</div>
    	<div class = "col-sm-9">
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
    {{ HTML::script('js/sidebar.js')}}
    {{ HTML::script('https://addthisevent.com/libs/1.5.8/ate.min.js')}}

<script>
    @if(isset($active))
    $(document).ready(function(){
        var active = '#{{$active}}';
        $(active).addClass("active");
    });
    @endif
</script>
<script>

$(window).on("resize", function () {
  if($(window).width() <= 750) {
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