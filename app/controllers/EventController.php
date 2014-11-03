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
        if(Input::has('reg')){
            $event->reg = 1;
            $event->regnr = Input::get('regnr');
            if(Input::has('reserv')){
                $event->reserv = 1;
            }
            else{
                $event->reserv = 0;
            }

        }
        else{
            $event->reg = 0;
        }

        if(Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                $imgName = Input::file('image')->getClientOriginalName();
                $imgExtension = Input::file('image')->getClientOriginalExtension();
                Input::file('image')->move('img/events', $imgName.'.'.$imgExtension);
            }
        }
        $event->save();
        if(Input::has('extras')){
            foreach(Input::get('extras') as $key => $text){
                $extraFormControl = new extraFormControl;
                $extraFormControl->eventId = $event->id;
                $extraFormControl->title = $text;
                $extraFormControl->save();
            }
        }



        return Redirect::to('events')
            ->with('message', 'The event was created successfully. Alright!');

    }
    public function edit ($id){
        return View::make('events.edit')
            ->with('title', 'Edit event')
            ->with('event',event::find($id))
            ->with('extra', extraFormControl::where('eventId', '=',$id)->get());
    }

    public function update(){
        $id = Input::get('id');

        $validation = event::validate(Input::all());

        if($validation->fails()){
            return Redirect::route('edit_event', $id)->withErrors($validation);
        }
        else{

            $event = event::find($id);

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

            if(Input::has('reg')){
                $event->reg = 1;
                $event->regnr = Input::get('regnr');
                if(Input::has('reserv')){
                    $event->reserv = 1;
                }
                else{
                    $event->reserv = 0;
                }

            }
            else{
                $event->reg = 0;
            }

            if(Input::hasFile('image')) {
                if (Input::file('image')->isValid()) {
                    $imgName = Input::file('image')->getClientOriginalName();
                    $imgExtension = Input::file('image')->getClientOriginalExtension();
                    Input::file('image')->move('img/events', $imgName.'.'.$imgExtension);
                }
            }

            $event->save();
            $oldExtra = extraFormControl::where('eventId', '=',$id)->get();
            foreach($oldExtra as $ex){
                //Viktigt! Kolla om det finns anmälda innan detta utförs!
                $ex->delete();
            }
            if(Input::has('extras')){

                foreach(Input::get('extras') as $key => $text){
                    $extraFormControl = new extraFormControl;
                    $extraFormControl->eventId = $event->id;
                    $extraFormControl->title = $text;
                    $extraFormControl->save();
                }
            }

            return Redirect::route('event', $id)
                ->with('message', 'Event updated successfully');
        }

    }
    public function destroy(){
        $id = Input::get('id');
        $event = event::find($id);
        $extraFormControl = extraFormControl::where('eventId', '=',$id)->get();
        $name = $event->name;
        //Viktigt! Ta även bort ExtraData
        foreach($extraFormControl as $ex) {
            $ex->delete();
        }
        $event->delete();

        return Redirect::route('events')
            ->with('message', 'The event '.htmlentities($name).' was deleted successfully');


    }
}

?>