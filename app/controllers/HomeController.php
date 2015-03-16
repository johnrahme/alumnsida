<?php

class HomeController extends BaseController {

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
        $events = event::orderBy('dateTimeFrom')->get();
        $onlineEvents = event::where('publish', '=', 1)->orderBy('dateTimeFrom')->get();
        $eventsWithPictures = event::where('publish', '=', 1)->where('pictureUrl', '!=', '')->orderBy('dateTimeFrom')->get();
        return View::make('start.index')
            ->with('title', 'FUTF-alumnsida')
            ->with('events', $onlineEvents)
            ->with('eventsWithPictures', $eventsWithPictures);
	}

}
