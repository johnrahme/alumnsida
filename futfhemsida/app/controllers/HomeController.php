<?php

class HomeController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function index()
    {
        $onlineEvents = Event::where('publish', '=', 1)->orderBy('dateTimeFrom')->get();
        $eventsWithPictures = Event::where('publish', '=', 1)->where('pictureUrl', '!=', '')->orderBy('dateTimeFrom')->get();
        $news = News::orderBy('created_at', 'desc')->get();
        return View::make('start.index')
            ->with('title', 'FUTF-alumnsida')
            ->with('events', $onlineEvents)
            ->with('news', $news)
            ->with('eventsWithPictures', $eventsWithPictures)
            ->with('active', 'start');
    }

    public function adminIndex()
    {
        $onlineEvents = Event::where('publish', '=', 1)->orderBy('dateTimeFrom')->get();
        $eventsWithPictures = Event::where('publish', '=', 1)->where('pictureUrl', '!=', '')->orderBy('dateTimeFrom')->get();
        $news = News::orderBy('created_at', 'desc')->get();
        return View::make('start.index')
            ->with('title', 'FUTF-alumnsida')
            ->with('events', $onlineEvents)
            ->with('news', $news)
            ->with('eventsWithPictures', $eventsWithPictures)
            ->with('showLogin', '1')
            ->with('active', 'start');
    }

}
