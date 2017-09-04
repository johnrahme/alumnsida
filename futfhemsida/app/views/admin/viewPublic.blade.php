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
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body" style="padding-top: 0">
                        <div class="page-header" style="margin-top:0px">
                            <h3>{{$ordf->name}} {{$ordf->surname}}</h3>
                            <h4>{{$ordf->post}}</h4>
                        </div>
                        <div class="page-header" style="margin-top:0px">
                            <img class="img-responsive" src="{{$ordf->pictureUrl}}"/>
                        </div>
                        <div class="page-header" style="margin-top:0px">
                            <h4>Kontaktuppgifter</h4>
                            <br>
                            <p style="margin-top: -20px">
                                <b>Telefonnummer:</b> <a href="tel:{{$ordf->tel}}">{{$ordf->tel}}</a>
                                <br>
                                <b>Emailadress:</b> <a href="mailto:{{$ordf->email}}"
                                                       target="_top">{{$ordf->email}}</a>
                            </p>
                        </div>
                        {{$ordf->description}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body" style="padding-top: 0">
                        <div class="page-header" style="margin-top:0px">
                            <h3>{{$vordf->name}} {{$vordf->surname}}</h3>
                            <h4>{{$vordf->post}}</h4>
                        </div>
                        <div class="page-header" style="margin-top:0px">
                            <img class="img-responsive" src="{{$vordf->pictureUrl}}"/>
                        </div>
                        <div class="page-header" style="margin-top:0px">
                            <h4>Kontaktuppgifter</h4>
                            <br>
                            <p style="margin-top: -20px">
                                <b>Telefonnummer:</b> <a href="tel:{{$vordf->tel}}">{{$vordf->tel}}</a>
                                <br>
                                <b>Emailadress:</b> <a href="mailto:{{$vordf->email}}"
                                                       target="_top">{{$vordf->email}}</a>
                            </p>
                        </div>
                        {{$vordf->description}}
                    </div>
                </div>
            </div>
            @foreach($admins as $key => $admin)
                @if($admin->post != 'Ordförande' and $admin->post != 'Vice ordförande')
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
                                    <b>Telefonnummer:</b> <a href="tel:{{$admin->tel}}">{{$admin->tel}}</a>
                                    <br>
                                    <b>Emailadress:</b> <a href="mailto:{{$admin->email}}"
                                                           target="_top">{{$admin->email}}</a>
                                </p>
                            </div>
                            {{$admin->description}}
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
@stop

