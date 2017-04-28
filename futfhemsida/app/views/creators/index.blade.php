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
                    <div class="page-header" style="margin-top:0px">
                        <h4>John Rahme</h4>
                    </div>
                    {{--<img class="img-responsive" src="imgurl_here"/>--}}
                    Beskrivning här!
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body" style="padding-top: 0">
                    <div class="page-header" style="margin-top:0px">
                        <h4>Jonathan Haraldsson</h4>
                    </div>
                    <img class="img-responsive" src="filesOwncloud/styrelsen/files/images/creatos/Jonathan.jpg  "/>
                    Beskrivning här!
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body" style="padding-top: 0">
                    <div class="page-header" style="margin-top:0px">
                        <h4>Johan Soodla</h4>
                    </div>
                    {{--<img class="img-responsive" src="imgurl_here"/>--}}
                    Beskrivning här!
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body" style="padding-top: 0">
                    <div class="page-header" style="margin-top:0px">
                        <h4>Albin Gideonsson</h4>
                    </div>
                    {{--<img class="img-responsive" src="imgurl_here"/>--}}
                    Beskrivning här!
                </div>
            </div>
        </div>
    </div>
@stop
