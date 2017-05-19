@extends('layouts.default')
@section('content')
    <div style="position: relative;">
        <div>
            <h1>
                Styrelsen
            </h1>
            <p>
                Styrelsen utgör föreningens strategiska och operativa ledning. Den består av nio ledamöter, där fem
                ledamöter väljs under vårens stormöte och resterande under höstens stormöte.
            </p>
        </div>
        <div class="row">
            @foreach($admins as $key => $admin)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body" style="padding-top: 0">
                            <div class="page-header" style="margin-top:0px">
                                <h3>{{$admin->name}} {{$admin->surname}}</h3>
                                <h4>{{$admin->post}}</h4>
                            </div>
                            <div class="page-header" style="margin-top:0px">
                                <img class="img-responsive" src="{{$admin->pictureUrl}}"/>
                            </div>
                            <div class="page-header" style="margin-top:0px">
                                <h4>Kontaktuppgifter</h4>
                                <br>
                                <p style="margin-top: -20px">
                                    <b>Telefonnummer:</b> {{$admin->tel}}
                                    <br>
                                    <b>Emailadress:</b> {{$admin->email}}
                                </p>
                            </div>
                            {{$admin->description}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop