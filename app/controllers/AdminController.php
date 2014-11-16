<?php


class AdminController extends BaseController
{
    public $restful = true;

    public function index()
    {
        return View::make('admin.index')
            ->with('title', 'Admin');
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
}
