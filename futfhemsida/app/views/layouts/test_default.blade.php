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
    {{ HTML::style('custom.css') }}
</head>

<body style="background-image: url('{{URL::asset('img/yellow2.jpg');}}');background-repeat: no-repeat;background-attachment: fixed;">
<!-- Navbar -->
<div id="wrap">

    <div class="container">
        <div class="navbar navbar-inverse navbar-default">
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
            <div class="navbar-collapse collapse navHeaderCollapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>

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
    $(document).ready(function () {
                var active = '#{{$active}}';
                $(active).addClass("active");
            });
    @endif
</script>
</body>
</html>