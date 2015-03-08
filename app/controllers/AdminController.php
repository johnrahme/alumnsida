<?php


class AdminController extends BaseController
{
    public $restful = true;

    public function index()
    {
        $admin = Admin::all();


        return View::make('admin.index')
            ->with('title', 'Admin')
            ->with('admins', $admin);
    }
    public function newadmin()
    {
        if(Auth::check()) {
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
        $admin = new admin;
        $admin->username = Input::get('username');
        $admin->email = Input::get('email');
        $admin->password = Hash::make(Input::get('password'));
        $admin->level = Input::get('level');
        $admin->save();

        return Redirect::to('login')
            ->with('message', 'Du är nu registrerad och kan logga in!');
    }

    public function view($id){

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
        if(Input::get('password')!=''){
        $admin->password = Hash::make(Input::get('password'));
        }
        $admin->save();
        if(Auth::check()&& Auth::user()->level == 2) {
            return Redirect::route('admin')
                ->with('message', 'The admin was created successfully. Alright!');
        }
        else{
            return Redirect::route('start')
                ->with('message', 'Ditt konto är nu uppdaterat!');
        }
    }
    public function destroy(){
        $id = Input::get('id');
        $admin = admin::find($id);
        $admin->delete();
        return Redirect::route('admin')
            ->with('message', 'The admin '.htmlentities($admin->username).' was deleted successfully');
    }
}
