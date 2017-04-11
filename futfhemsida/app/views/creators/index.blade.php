@extends('layouts.default')

<style>
    @media (min-width: 768px) {
        #adjust {
            left: -187.5px;{{-- -187.5 px to replace the column of width 3 to the left (col-sm-3 =3*750px/12=187.5 px) on big screen--}}
        }
    }
</style>

@section('content')
    <div id="adjust" class="row" style="position: relative; "> <div class="col-sm-3">
            <p>
                Place The First One Here
            </p>
        </div>
        <div class="col-sm-3">
            <p>
                Place The Second One Here
            </p>
        </div>
        <div class="col-sm-3">
            <p>
                Place The third One Here
            </p>
        </div>
        <div class="col-sm-3">
            <p>
                Place The Fourth One Here
            </p>
        </div>
    </div>
@stop
