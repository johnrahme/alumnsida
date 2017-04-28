@extends('layouts.default')

<style>
    @media (min-width: 768px) {
        #adjust {
            left: -187.5px;
        {{-- -187.5 px to replace the column of width 3 to the left (col-sm-3 =3*750px/12=187.5 px) on big screen--}}



        }
    }
</style>

@section('content')
    <div id="adjust" class="row" style="position: relative; ">
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body" style="padding-top: 0">
                    {{--<img style="margin-top: 5px;" class="img-responsive" src="img_link_here"/>  Fixa så filen kan ligga lokalt, lcykas inte få access till bilden just nu..--}}
                    <div class="page-header" style="margin-top:0px">
                        <h4 style="text-align: center">John Rahme</h4>
                    </div>
                    Beskrivning här!
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body" style="padding-top: 0">
                    <img style="margin-top: 5px;" class="img-responsive" src="http://i.imgur.com/Y9lhfmX.jpg"/> {{-- Fixa så filen kan ligga lokalt, lcykas inte få access till bilden just nu..--}}
                    <div class="page-header" style="margin-top:0px">
                        <h4 style="text-align: center">Jonathan Haraldsson</h4>
                    </div>
                    Beskrivning här!
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body" style="padding-top: 0">
                    {{--<img style="margin-top: 5px;" class="img-responsive" src="img_link_here"/> --}}{{-- Fixa så filen kan ligga lokalt, lcykas inte få access till bilden just nu..--}}
                    <div class="page-header" style="margin-top:0px">
                        <h4 style="text-align: center">Johan Soodla</h4>
                    </div>
                    Beskrivning här!
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body" style="padding-top: 0">
                    {{--<img style="margin-top: 5px;" class="img-responsive" src="img_link_here"/> --}}{{-- Fixa så filen kan ligga lokalt, lcykas inte få access till bilden just nu..--}}
                    <div class="page-header" style="margin-top:0px">
                        <h4 style="text-align: center">Albin Gideonsson</h4>
                    </div>
                    Beskrivning här!
                </div>
            </div>
        </div>
    </div>
@stop
