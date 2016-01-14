<?php

class SessionsController extends \BaseController
{


    public function create()
    {
        return View::make('sessions.create')
            ->with('title', 'Login')
            ->with('active', 'login');
    }


    public function store()
    {
        $input = Input::all();
        $attempt = Auth::attempt(['email' => $input['email'], 'password' => $input['password']]);

        if ($attempt) return Redirect::intended('/')->with('message', 'Inloggad!');

        return Redirect::back()->with('errorMessage', 'Inloggningen misslyckades')->withInput();

    }

    public function storeLinkedIn()
    {
        //Data från linkedIn
        $email = Input::get('linkedInEmail');
        $name = Input::get('linkedInName');
        $linkedInId = Input::get('linkedInId');
        $surname = Input::get('linkedInSurname');
        $headline = Input::get('linkedInHeadline');
        $pictureUrl = Input::get('linkedInPictureUrl');

        $adminOld = Admin::where('email', '=', $email)->get();
        $adminOldSave = Admin::where('email', '=', $email)->first();
        $adminCurrentSave = Admin::where('linkedInId', '=', $linkedInId)->first();
        $unregistered = Admin::where('linkedInId', '=', $linkedInId)->get()->isEmpty();
        if ($unregistered && $adminOld->isEmpty()) {
            $newAdmin = new Admin();
            $admin = $newAdmin;
            $admin->username = $name;
            $admin->level = 1;
        } else if ($unregistered && !$adminOld->isEmpty()) {
            $admin = $adminOldSave;
        } else {
            $admin = $adminCurrentSave;
        }
        $admin->name = $name;
        $admin->linkedInId = $linkedInId;
        $admin->email = $email;
        $admin->surname = $surname;
        $admin->company = $headline;
        $admin->pictureUrl = $pictureUrl;
        $admin->save();
        Auth::login($admin);

        return Redirect::route("start")->with('message', 'Inloggad!');
    }

    public function forgot()
    {

        return View::make('sessions.forgot')
            ->with('title', 'Glömt lösenord')
            ->with('active', 'login');
    }

    public function recover()
    {

        $admin = Admin::where('email', '=', Input::get('email'))->first();
        if (is_null($admin)) {
            return Redirect::back()->with('errorMessage', 'Email existerar inte')->withInput();
        }

        $recoverPassword = substr(md5(rand('99999', '999999')), 0, 8);
        $admin->password = Hash::make($recoverPassword);
        $admin->save();
        $data = array('recoverPassword' => $recoverPassword, 'email' => $admin->email);
        $email = $admin->email;
        Mail::send('emails.login.recoverPassword', $data, function ($message) use ($email) {
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
