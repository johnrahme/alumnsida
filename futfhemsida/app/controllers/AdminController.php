<?php


class AdminController extends BaseController
{
    public $restful = true;

    public function index()
    {
        $admin = Admin::all();

        if (Auth::check() && Auth::user()->level == 2) {
            return View::make('admin.index')
                ->with('title', 'Admin')
                ->with('admins', $admin)
                ->with('active', 'admin');
        } else {
            return View::make('admin.downScaled.index')
                ->with('title', 'Admin')
                ->with('admins', $admin)
                ->with('active', 'admin');
        }
    }

    public function newadmin()
    {
        if (Auth::check() && Auth::user()->level == 2) {
            return View::make('admin.new')
                ->with('title', 'New Admin')
                ->with('active', 'admin');
        }
    }

    public function createAdmin()
    {
        $validation = Admin::validate(Input::all());
        if ($validation->fails()) {
            return Redirect::route('new_admin')->withErrors($validation)->withInput();
        }
        $admin = new Admin;
        $admin->username = Input::get('username');
        $admin->email = Input::get('email');
        $admin->password = Hash::make(Input::get('password'));
        $admin->level = Input::get('level');
        $admin->name = Input::get('name');
        $admin->surname = Input::get('surname');
        $admin->tel = Input::get('tel');
        $admin->accounttype = Input::get('accounttype');
        $admin->description = Input::get('description');
        $admin->post = Input::get('post');
        $admin->save();

        return Redirect::to('admin')
            ->with('message', 'Konto skapat!');
    }

    public function createAdminReg()
    {
        $validation = Admin::validate(Input::all());
        if ($validation->fails()) {
            return Redirect::route('new_admin')->withErrors($validation)->withInput();
        }
        $admin = new Admin;
        $admin->username = Input::get('username');
        $admin->email = Input::get('email');
        $admin->password = Hash::make(Input::get('password'));
        $admin->level = Input::get('level');
        $admin->name = Input::get('name');
        $admin->surname = Input::get('surname');
        $admin->tel = Input::get('tel');
        $admin->startYear = Input::get('startYear');
        $admin->company = Input::get('company');
        $admin->save();

        return Redirect::to('login')
            ->with('message', 'Du är nu registrerad och kan logga in!');
    }

    public function view($id)
    {
        $admin = Admin::find($id);
        return View::make('admin.downScaled.view')
            ->with('title', 'Admins')
            ->with('admin', $admin)
            ->with('active', 'admin');
    }

    public function viewAllAdminsPublic()
    {
        $admins = Admin::where('accounttype', '=', 'styrelse')->get();
        return View::make('admin.viewPublic')
            ->with('title', 'FUTFs Styrelse')
            ->with('admins', $admins)
            ->with('active', 'admin');
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return View::make('admin.edit')
            ->with('title', 'Ändra konto')
            ->with('admin', $admin)
            ->with('active', 'admin');
    }

    public function update()
    {
        $id = Input::get('id');
        $admin = Admin::find($id);
        $admin->username = Input::get('username');
        $admin->email = Input::get('email');
        $admin->level = Input::get('level');
        $admin->name = Input::get('name');
        $admin->surname = Input::get('surname');
        $admin->tel = Input::get('tel');
        $admin->accounttype = Input::get('accounttype');
        $admin->post = Input::get('post');
        $admin->description = Input::get('description');

        if (Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                if (strpos($admin->pictureUrl, 'img') !== false) {
                    File::delete($admin->pictureUrl);
                }
                $imgName = Input::file('image')->getClientOriginalName();
                $imgExtension = Input::file('image')->getClientOriginalExtension();
                $saveName = microtime() . '_' . $imgName;
                Input::file('image')->move('img/admins', $saveName);
                $URL = 'img/admins/' . $saveName;
                $admin->pictureUrl = $URL;
            }
        } else {
            if (strpos($admin->pictureUrl, 'img') !== false) {
                File::delete($admin->pictureUrl);
            }
            $admin->pictureUrl = 'empty';
        }

        if (Input::get('password') != '') {
            $admin->password = Hash::make(Input::get('password'));
        }
        $admin->save();
        if (Auth::check() && Auth::user()->level == 2) {
            return Redirect::route('admin')
                ->with('message', 'Ditt konto är nu uppdaterat!');
        } else {
            return Redirect::route('start')
                ->with('message', 'Ditt konto är nu uppdaterat!');
        }
    }

    public function destroy()
    {
        $id = Input::get('id');
        $admin = Admin::find($id);
        $events = Event::where('createdBy', '=', $id)->get();
        //Tar bort event kopplat till användaren
        foreach ($events as $event) {
            if ($event->pictureUrl != "") {
                File::delete($event->pictureUrl);
            }
            $extraFormControl = Extraformcontrol::where('eventId', '=', $id)->get();
            $registrations = Registration::where('eventId', '=', $id)->get();
            $name = $event->name;
            //Viktigt! Ta även bort ExtraData
            foreach ($extraFormControl as $ex) {
                $extraData = Extradata::where('extraFromControlId', '=', $ex->id)->get();
                foreach ($extraData as $exD) {
                    $exD->delete();
                }
                $ex->delete();
            }
            foreach ($registrations as $reg) {
                $reg->delete();
            }
            $event->delete();
        }
        $admin->delete();
        return Redirect::route('admin')
            ->with('message', 'The admin ' . htmlentities($admin->username) . ' was deleted successfully');
    }
}
