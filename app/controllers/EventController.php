<?php


class EventController extends BaseController{
    //public $layout = 'layouts.default';
    public $restful = true;
    public function index() { //Default name for starting function
        $events = event::orderBy('dateTimeFrom')->get();
        return View::make('events.index')
            ->with('title', 'Event')
            ->with('events', $events);

    }

    public function view($id){
        return View::make('events.view')
            ->with('title', 'Event View Page')
            ->with('event', event::find($id));

    }
    public function newevent(){
        return View::make('events.new')
            ->with('title', 'New Event');
    }

    public function createEvent(){
        $validation = event::validate(Input::all());
        if($validation->fails()){
            return Redirect::route('new_event')->withErrors($validation)->withInput();
        }

        $event = new event;

        $event->name = Input::get('name');
        $event->dateTimeFrom = Input::get('dateTimeFrom');
        $event->dateTimeTo = Input::get('dateTimeTo');
        $event->description = Input::get('description');
        $event->place = Input::get('place');
        if(Input::has('publish')) {
            $event->publish = 1;
        }
        else{
            $event->publish = 0;
        }

        if(Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                $imgName = Input::file('image')->getClientOriginalName();
                $imgExtension = Input::file('image')->getClientOriginalExtension();
                Input::file('image')->move('img/events', $imgName.'.'.$imgExtension);
            }
        }

        $event->save();


        return Redirect::to('events')
            ->with('message', 'The event was created successfully. Alright!');

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