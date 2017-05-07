<?php

class HemsidorController extends BaseController
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

    public function FUTF_Old()
    {
        return Redirect::away('http://www.futf.se/');
    }

    public function FUTF_nyhetsbrev()
    {
        return Redirect::away('http://nyhetsbrev.futf.se/');
    }

    public function FUTF_alumn()
    {
        return Redirect::away('http://alumn.futf.se/');
    }

}
