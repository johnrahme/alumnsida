@extends('layouts.default')

<style>
    iframe {
        max-width: 100%;
    }

    iframe.kalender {
        border: none;
        margin-bottom: -24.5px;
        width: 100%;
        height: 700px;
    }

    .kalender-wrapper {
        width: 100%;
        overflow: hidden;
    }

    @media (max-width: 768px) {
        .kalender-big {
            display: none;
        }
    }

    @media (min-width: 768px) {
        .kalender-small {
            display: none;
        }
    }
</style>

@section('content')
    <div class="kalender-wrapper row" style="width: calc(100% + 30px);">
        <div class="col-sm-8">
            <iframe class="kalender kalender-big" style="position: relative;"
                    src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showDate=0&amp;showPrint=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=2&amp;hl=sv&amp;bgcolor=%23e3e9ff&amp;src=q4m62rfm3iut7p69fqni5uaedc%40group.calendar.google.com&amp;color=%23AB8B00&amp;src=sv.swedish%23holiday%40group.v.calendar.google.com&amp;color=%2329527A&amp;src=e_2_sv%23weeknum%40group.v.calendar.google.com&amp;color=%23A32929&amp;ctz=Europe%2FStockholm">
            </iframe>
            <iframe class="kalender kalender-small" style="position: relative;"
                    src="https://calendar.google.com/calendar/embed?mode=AGENDA&amp;showTitle=0&amp;showDate=0&amp;showPrint=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=2&amp;hl=sv&amp;bgcolor=%23e3e9ff&amp;src=q4m62rfm3iut7p69fqni5uaedc%40group.calendar.google.com&amp;color=%23AB8B00&amp;src=sv.swedish%23holiday%40group.v.calendar.google.com&amp;color=%2329527A&amp;src=e_2_sv%23weeknum%40group.v.calendar.google.com&amp;color=%23A32929&amp;ctz=Europe%2FStockholm">
            </iframe>
        </div>
    </div>
@stop
