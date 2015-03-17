<?php

class SessionsController extends \BaseController {


	public function create()
	{
        return View::make('sessions.create')
            ->with('title', 'Login')
            ->with('active', 'login');
	}



	public function store()
	{
		$input = Input::all();
        $attempt = Auth::attempt(['email' => $input['email'], 'password'=>$input['password']]);

        if($attempt) return Redirect::intended('/')->with('message', 'Inloggad!');

        return Redirect::back()->with('errorMessage', 'Inloggningen misslyckades')->withInput();

	}

    public function forgot(){

        return View::make('sessions.forgot')
            ->with('title', 'Glömt lösenord')
            ->with('active', 'login');
    }
    public function recover (){

        $admin = admin::where('email', '=', Input::get('email'))->first();
        if(is_null($admin)){
            return Redirect::back()->with('errorMessage', 'Email existerar inte')->withInput();
        }

        $recoverPassword = substr(md5(rand('99999','999999')), 0, 8);
        $admin->password = Hash::make($recoverPassword);
        $admin->save();
        $data = array('recoverPassword' => $recoverPassword, 'email' => $admin->email);
        $email = $admin->email;
        Mail::send('emails.login.recoverPassword', $data, function($message) use ($email)
        {
            $message->from('no-reply@futf.se', 'alumn.futf.se');

            $message->to($email)->subject('Nytt lösenord');

        });
        return Redirect::route('login')->with('message', 'Temporärt lösenord skickat till din email');

    }

	public function destroy()
	{
		Auth::logout();
        return Redirect::route('start')->with('message', 'Utloggad!');
	}


}
