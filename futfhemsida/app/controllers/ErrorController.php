<?php

class ErrorController extends BaseController {

    protected $layout = 'layouts.default';

    public function missing()
    {
        return View::make('errors.404')
            ->with('title', 'FUTF 404 Error')
            ->with('active', '404 Error'); //Måste ha denna kvar för att sidan ska fungera
    }

}