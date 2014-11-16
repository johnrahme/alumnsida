<?php

class SessionsController extends \BaseController {


	public function create()
	{
        return View::make('sessions.create')
            ->with('title', 'Login');
	}



	public function store()
	{
		$input = Input::all();
        $attempt = Auth::attempt(['email' => $input['email'], 'password'=>$input['password']]);

        if($attempt) return Redirect::intended('/')->with('message', 'logged in!');

        return Redirect::back()->with('message', 'Invalid Credentials')->withInput();

	}



	public function destroy()
	{
		Auth::logout();
        return Redirect::route('start')->with('message', 'logged out!');
	}


}
