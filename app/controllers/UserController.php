<?php


class UserController extends BaseController{
	//public $layout = 'layouts.default';
	public $restful = true;
	public function index() { //Default name for starting function
		$users = User::orderBy('name')->get();
		return View::make('users.index')
			->with('title', 'Användare')
			->with('users', $users);

	}
	
	public function view($id){
		return View::make('users.view')
			->with('title', 'User View Page')
			->with('user', User::find($id));
		
	}
	public function newuser(){
		return View::make('users.new')
		->with('title', 'New User');
	}
	
	public function createUser(){
		$validation = User::validate(Input::all());
		
		if($validation->fails()){
			return Redirect::route('new_user')->withErrors($validation)->withInput();
		}

		$user = new User;
		
		$user->name = Input::get('name');
        $user->surname = Input::get('surname');
        $user->email = Input::get('email');
        $user->tel = Input::get('tel');
        $user->startYear = Input::get('startYear');
        $user->company = Input::get('company');

		
		$user->save();
		
	
		return Redirect::to('users')
			->with('message', 'The user was created successfully. Alright!');

	}
    public function edit ($id){
        return View::make('users.edit')
            ->with('title', 'Edit user')
            ->with('user',User::find($id));
    }

    public function update(){
        $id = Input::get('id');

        $validation = User::validate(Input::all());

        if($validation->fails()){
            return Redirect::route('edit_user', $id)->withErrors($validation);
        }
        else{
            $user  = User::find($id);
            $user->name = Input::get('name');
            $user->surname = Input::get('surname');
            $user->email = Input::get('email');
            $user->tel = Input::get('tel');
            $user->startYear = Input::get('startYear');
            $user->company = Input::get('company');

            $user->save();

            return Redirect::route('user', $id)
                ->with('message', 'User update successfully');
        }

    }
    public function destroy(){
       $id = Input::get('id');
       $user = User::find($id);
       $name = $user->name;
       $user->delete();

       return Redirect::route('users')
           ->with('message', htmlentities($name).'User was deleted successfully');


    }
}

?>