@extends('layouts.default')

@section('content')

<div class="text-center">
    <h1>
    Styrelsen
    </h1>
    <p>
    Styrelsen utgör föreningens strategiska och operativa ledning. Den består av åtta ledamöter, där fyra ledamöter väljs under vårens stormöte och de andra fyra under höstens stormöte.
    </p>
</div>

<div class = "row">
    @foreach($admins as $key => $admin)
    <div class = "col-md-4">
        <div class="panel panel-default">
                <div class="panel-body" style="padding-top: 0">
                   <div class="page-header" style="margin-top:0px">
                        <h3>{{$admin->post}}</h3>
                   </div>
                   <img class="img-responsive" src="{{$admin->pictureUrl}}"/>
                   {{$admin->description}}
                </div>
        </div>
    </div>
    
    @endforeach
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <tbody>
              @foreach($admins as $key => $admin)
              @if(count($key)%2 == 0) <!-- To make every other entry mirrored to the last one -->
                <!--<div class="col-md-4">-->
                  <tr>
                    <img src="{{$admin->pictureUrl}}"/>
                  </tr>
                  <tr>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->surname}}</td>
                  </tr>
                <!--</div>-->
                <!--<div class="col-md-8">-->
                  <tr>
                    <td>{{$admin->description}}</td>
                    <td>{{$admin->email}}</td>
                  </tr>
                <!--</div>-->
              @else
                <!--<div class="col-md-8">-->
                  <tr>
                    <td>{{$admin->description}}</td>
                    <td>{{$admin->email}}</td>
                  </tr>
                <!--</div>-->
                <!--<div class="col-md-4">-->
                  <tr>
                    <img src="{{$admin->pictureUrl}}"/>
                  </tr>
                  <tr>
                     <td>{{$admin->name}}</td>
                     <td>{{$admin->surname}}</td>
                  </tr>
                <!--</div>-->
              @endif
              @endforeach
            </tbody>
        </div>
    </div>
</div>


@stop