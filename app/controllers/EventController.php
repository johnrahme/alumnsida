<?php


class EventController extends BaseController{
    //public $layout = 'layouts.default';
    public $restful = true;
    public function index() { //Default name for starting function
        $events = event::orderBy('dateTimeFrom')->get();
        return View::make('events.index')
            ->with('title', 'Event')
            ->with('events', $events)
            ->with('currEvent', event::find(5));

    }

    public function view($id){

        $event = event::find($id);

        $now = time();
        $regFrom = strtotime($event->regFrom);
        $regTo = strtotime($event->regTo);
        if($now<$regFrom){
            $regOngoing = false;
            $regEnded = false;
        }
        elseif($now>$regFrom&&$now<$regTo){
            $regOngoing = true;
            $regEnded = false;
        }
        else{
            $regOngoing = false;
            $regEnded = true;
        }

        $regCount = registration::where('eventId', '=', $id)->count();

        return View::make('events.view')
            ->with('title', 'Event View Page')
            ->with('currEvent', $event)
            ->with('events',event::orderBy('dateTimeFrom')->get())
            ->with('regOngoing', $regOngoing)
            ->with('regEnded', $regEnded)
            ->with('regCount', $regCount);

    }
    public function newevent(){
        return View::make('events.new')
            ->with('title', 'New Event');
    }

    public function createEvent(){

        if(Input::has('reg')){
            $validation = event::validateReg(Input::all());
        }
        else {
            $validation = event::validate(Input::all());
        }
        if($validation->fails()){
            return Redirect::route('new_event')->withErrors($validation)->withInput();
        }

        $event = new event;

        $event->name = Input::get('name');
        $event->dateTimeFrom = Input::get('dateTimeFrom');
        $event->dateTimeTo = Input::get('dateTimeTo');
        $event->description = Input::get('description');
        $event->place = Input::get('place');
        $event->createdBy = Auth::user()->email;

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
            $event->regFrom = Input::get('regFrom');
            $event->regTo = Input::get('regTo');

        }
        else{
            $event->reg = 0;
        }

        if(Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                $imgName = Input::file('image')->getClientOriginalName();
                $imgExtension = Input::file('image')->getClientOriginalExtension();
                $saveName =microtime().'_'.$imgName;
                Input::file('image')->move('img/events', $saveName);
                $URL = 'img/events/'.$saveName;
                $event->pictureUrl = $URL;
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
        if(count(registration::where('EventId','=',$id)->get())<1){
            $editExtra = true;
        }
        else{
            $editExtra = false;
        }
        return View::make('events.edit')
            ->with('title', 'Edit event')
            ->with('event',event::find($id))
            ->with('extra', extraFormControl::where('eventId', '=',$id)->get())
            ->with('editExtra', $editExtra);
    }

    public function update(){
        $id = Input::get('id');

        if(Input::has('reg')){
            $validation = event::validateReg(Input::all());
        }
        else {
            $validation = event::validate(Input::all());
        }

        if($validation->fails()){
            return Redirect::route('edit_event', $id)->withErrors($validation)->withInput();
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
                $event->regFrom = Input::get('regFrom');
                $event->regTo = Input::get('regTo');
            }
            else{
                $event->reg = 0;
                echo "<script>alert('händer')</script>";
            }


            //Jobbar med bilden:

            if(Input::hasFile('image')) {
                if (Input::file('image')->isValid()) {
                    if($event->pictureUrl != ""){
                        File::delete($event->pictureUrl);
                    }
                    $imgName = Input::file('image')->getClientOriginalName();
                    $imgExtension = Input::file('image')->getClientOriginalExtension();
                    $saveName =microtime().'_'.$imgName;
                    Input::file('image')->move('img/events', $saveName);
                    $URL = 'img/events/'.$saveName;
                    $event->pictureUrl = $URL;
                }
            }
            else{
                if(Input::get('pictureChanged') == 1){
                    File::delete($event->pictureUrl);
                    $event->pictureUrl = "";
                }


            }

            $event->save();
            if(count(registration::where('eventId', '=', $id)->get())<1) {

                $oldExtra = extraFormControl::where('eventId', '=', $id)->get();
                foreach ($oldExtra as $ex) {
                    $ex->delete();
                }
                if (Input::has('extras')) {

                    foreach (Input::get('extras') as $key => $text) {
                        $extraFormControl = new extraFormControl;
                        $extraFormControl->eventId = $event->id;
                        $extraFormControl->title = $text;
                        $extraFormControl->save();
                    }
                }
            }

            return Redirect::route('event', $id)
                ->with('message', 'Event updated successfully');
        }

    }
    public function map($id){
        $event = event::find($id);
        return View::make('events.map')
            ->with('event', $event);
    }
    public function destroy(){
        $id = Input::get('id');
        $event = event::find($id);
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

        return Redirect::route('events')
            ->with('message', 'The event '.htmlentities($name).' was deleted successfully');


    }
}

?>