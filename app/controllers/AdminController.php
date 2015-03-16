<?php


class AdminController extends BaseController
{
    public $restful = true;

    public function index()
    {
        $admin = Admin::all();

        if(Auth::check()&& Auth::user()->level == 2) {
            return View::make('admin.index')
                ->with('title', 'Admin')
                ->with('admins', $admin);
        }
        else{
            return View::make('admin.downScaled.index')
                ->with('title', 'Admin')
                ->with('admins', $admin);
        }
    }
    public function newadmin()
    {
        if(Auth::check()&&Auth::user()->level == 2) {
            return View::make('admin.new')
                ->with('title', 'New Admin');
        }
        else{
            return View::make('admin.newReg')
                ->with('title', 'New Admin');
        }
    }
    public function createAdmin()
    {
        $validation = admin::validate(Input::all());
        if($validation->fails()){
            return Redirect::route('new_admin')->withErrors($validation)->withInput();
        }
        $admin = new admin;
        $admin->username = Input::get('username');
        $admin->email = Input::get('email');
        $admin->password = Hash::make(Input::get('password'));
        $admin->level = Input::get('level');
        $admin->save();

        return Redirect::to('admin')
            ->with('message', 'The admin was created successfully. Alright!');
    }

    public function createAdminReg()
    {
        $validation = admin::validate(Input::all());
        if($validation->fails()){
            return Redirect::route('new_admin')->withErrors($validation)->withInput();
        }
        $admin = new admin;
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

    public function view($id){
        $admin = admin::find($id);
        return View::make('admin.downScaled.view')
            ->with('title', 'Visa alumn')
            ->with('admin', $admin);
    }
    public function edit($id){
        $admin = admin::find($id);
        return View::make('admin.edit')
            ->with('title', 'Ändra konto')
            ->with('admin', $admin);
    }
    public function update(){
        $id = Input::get('id');
        $admin = admin::find($id);
        $admin->username = Input::get('username');
        $admin->email = Input::get('email');
        $admin->level = Input::get('level');
        $admin->name = Input::get('name');
        $admin->surname = Input::get('surname');
        $admin->tel = Input::get('tel');
        $admin->startYear = Input::get('startYear');
        $admin->company = Input::get('company');
        if(Input::get('password')!=''){
        $admin->password = Hash::make(Input::get('password'));
        }
        $admin->save();
        if(Auth::check()&& Auth::user()->level == 2) {
            return Redirect::route('admin')
                ->with('message', 'Ditt konto är nu uppdaterat!');
        }
        else{
            return Redirect::route('start')
                ->with('message', 'Ditt konto är nu uppdaterat!');
        }
    }
    public function destroy(){
        $id = Input::get('id');
        $admin = admin::find($id);
        $events = event::where('createdBy', '=', $id)->get();
        //Tar bort event kopplat till användaren
        foreach($events as $event){
            if($event->pictureUrl != "") {
                File::delete($event->pictureUrl);
            }
            $extraFormControl = extraFormControl::where('eventId', '=',$id)->get();
            $registrations = registration::where('eventId','=',$id)->get();
            $name = $event->name;
            //Viktigt! Ta även bort ExtraData
            foreach($extraFormControl as $ex) {
                $extraData = extraData::where('extraFromControlId', '=', $ex->id)->get();
                foreach($extraData as $exD) {
                    $exD->delete();
                }
                $ex->delete();
            }
            foreach($registrations as $reg){
                $reg->delete();
            }
            $event->delete();
        }
        $admin->delete();
        return Redirect::route('admin')
            ->with('message', 'The admin '.htmlentities($admin->username).' was deleted successfully');
    }
}
