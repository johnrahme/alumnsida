<?php

class OwnCloudController extends BaseController
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
        return View::make('ownCloud.index')
            ->with('title', 'FUTFs filer')
            ->with('events', $onlineEvents)
            ->with('eventsWithPictures', $eventsWithPictures)
            ->with('active', 'ownCloud');
    }

    public function adminIndex()
    {
        $onlineEvents = Event::where('publish', '=', 1)->orderBy('dateTimeFrom')->get();
        $eventsWithPictures = Event::where('publish', '=', 1)->where('pictureUrl', '!=', '')->orderBy('dateTimeFrom')->get();
        return View::make('ownCloud.index')
            ->with('title', 'FUTFs filer')
            ->with('events', $onlineEvents)
            ->with('eventsWithPictures', $eventsWithPictures)
            ->with('showLogin', '1')
            ->with('active', 'ownCloud');
    }

}
