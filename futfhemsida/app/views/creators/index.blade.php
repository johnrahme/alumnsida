@extends('layouts.default')

<style>
    @media (min-width: 768px) {
        #adjust {
            left: -187.5px;
        {{-- -187.5 px to replace the column of width 3 to the left (col-sm-3 =3*750px/12=187.5 px) on big screen--}}
        }
    }
    .mirrorImage{
        transform: scaleX(-1);
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
                    <img style="margin-top: 5px;" class="img-responsive"
                         src="http://beta.futf.se/img/creators/Jonathan.jpg"/> {{-- Fixa så filen kan ligga lokalt, lcykas inte få access till bilden just nu..--}}
                    <div class="page-header" style="margin-top:0px">
                        <h4 style="text-align: center">Jonathan Haraldsson</h4>
                    </div>
                    Jag har varit med i IT-gruppen sedan start, hösten 2015. Jag har lärt mig mycket av att vara med
                    och utveckla hemsidan från start. Jag var informationsansvarig mellan juli 2016 och juni 2017,
                    vilket bidrog till en ledarroll inom IT-gruppen. Jag har utvecklat mycket av designen, menyerna,
                    felhantering, samarbetspartners, fillagringssystemet
                    (<a href="http://beta.futf.se/files" target="_blank">Dokument</a>),
                    sidfoten, en del småsaker och en massa annat. Jag är väldigt tacksam för att jag fått varit med i
                    arbetet med denna hemsida. Hoppas Ni tycker om hemsidan lika mycket som jag gör.
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
                    <img style="margin-top: 5px;" class="img-responsive mirrorImage"
                         src="http://beta.futf.se/img/creators/Albin.jpg"/> {{-- Fixa så filen kan ligga lokalt, lcykas inte få access till bilden just nu..--}}
                    <div class="page-header" style="margin-top:0px">
                        <h4 style="text-align: center">Albin Gideonsson</h4>
                    </div>
                    Som den nyaste medlemmen i IT-gruppen har jag egentligen gjort ganska lite faktiskt arbete, utan
                    istället stöttat de andra med idéer och tappra försök till problemlösning. Jag var ansvarig för
                    nyheterna som syns på startsidan samt nyhetsarkivets generella layout, och jag kan stolt säga att
                    jag är nöjd med mitt jobb. Till sist vill jag tacka Jonathan, och alla andra, för att jag fick gå
                    med i IT-gruppen. Det har varit ett oerhört lärorikt år, ett projekt som länge väntat på att bli
                    klart och jag är väldigt glad att ha hunnit vara en del av det. Tack.
                </div>
            </div>
        </div>
    </div>
@stop
