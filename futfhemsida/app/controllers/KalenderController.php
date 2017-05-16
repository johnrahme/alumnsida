<?php

class KalenderController extends Controller
{

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    public function index()
    {

        return View::make('kalender.index')
            ->with('title', 'Kalender')
            ->with('active', 'kalender');
        /*
        $onlineEvents = Event::where('publish', '=', 1)->orderBy('dateTimeFrom')->get();
        $eventsWithPictures = Event::where('publish', '=', 1)->where('pictureUrl', '!=', '')->orderBy('dateTimeFrom')->get();
        $news = News::orderBy('created_at', 'desc')->get();
        return View::make('start.index')
            ->with('title', 'FUTF:s-betasida')
            ->with('events', $onlineEvents)
            ->with('news', $news)
            ->with('eventsWithPictures', $eventsWithPictures)
            ->with('active', 'start');
        */
    }

}
