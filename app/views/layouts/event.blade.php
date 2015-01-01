@extends('layouts.default')
@section('styles')
    @yield('styles')
@stop

@section('content')

    @yield('before')

    <div class = "row">
        <div class = "col-sm-6">
            <div class = "panel panel-default">
                <div class = "panel-body" style = "padding-top: 0">
                    <div class = "page-header" style = "margin-top:0px">
                        <h3>{{$title}}</h3>
                    </div>
                        <div role="tabpanel">

                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Namn tid och plats</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Beskrivning</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Registrering</a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Övrigt</a></li>
                          </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                          {{--Namn tid och plats--}}
                            <div role="tabpanel" class="tab-pane active" id="home">
                            <br>
                            @yield('panelOne')
                            </div>
                            {{--Beskrivning--}}
                            <div role="tabpanel" class="tab-pane" id="profile">
                            <br>
                            @yield('panelTwo')
                            </div>
                            {{--Registrering--}}
                            <div role="tabpanel" class="tab-pane" id="messages">
                            <br>
                            @yield('panelThree')

                            </div>
                            {{--Övrigt--}}
                            <div role="tabpanel" class="tab-pane" id="settings">
                            <br>
                            @yield('panelFour')
                            </div>
                          </div>

                        </div>
                 </div>
            </div>
        </div>
    </div>

    @yield('after')
@stop

@section('scripts')
    @yield('scripts')
@stop
