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
        return View::make('admin.new')
            ->with('title', 'New Admin');
    }
    public function createAdmin()
    {
        $admin = new admin;
        $admin->username = Input::get('username');
        $admin->email = Input::get('email');
        $admin->password = Hash::make(Input::get('password'));
        $admin->save();

        return Redirect::to('admin')
            ->with('message', 'The admin was created successfully. Alright!');
    }

    public function view($id){

    }
    public function edit($id){
        $admin = admin::find($id);
        return View::make('admin.edit')
            ->with('title', 'Ändra admin')
            ->with('admin', $admin);
    }
    public function update(){
        $id = Input::get('id');
        $admin = admin::find($id);
        $admin->username = Input::get('username');
        $admin->email = Input::get('email');
        if(Input::get('password')!=''){
        $admin->password = Hash::make(Input::get('password'));
        }
        $admin->save();

        return Redirect::route('admin')
            ->with('message', 'The admin was created successfully. Alright!');
    }
    public function destroy(){
        $id = Input::get('id');
        $admin = admin::find($id);
        $admin->delete();
        return Redirect::route('admin')
            ->with('message', 'The admin '.htmlentities($admin->username).' was deleted successfully');
    }
}
