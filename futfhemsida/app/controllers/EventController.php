<?php


class EventController extends BaseController
{
    //public $layout = 'layouts.default';
    public $restful = true;

    public function index()
    { //Default name for starting function

        //Kollar vilken level av inlogg
        if (Auth::check() && Auth::user()->level == 2) {
            $events = Event::orderBy('dateTimeFrom')->get();
        } elseif (Auth::check() && Auth::user()->level == 1) {
            $events = Event::where('publish', '=', 1)
                ->orWhere(function ($query) {
                    $query->where('publish', '=', 0)
                        ->where('createdBy', '=', Auth::user()->id);
                })
                ->orderBy('dateTimeFrom')->get();
        } else {
            $events = Event::where('publish', '=', 1)->orderBy('dateTimeFrom')->get();
        }
        return View::make('events.index')
            ->with('title', 'Event')
            ->with('events', $events)
            ->with('active', 'events');

    }

    public function view($id)
    {

        $event = Event::find($id);

        $now = time();
        $regFrom = strtotime($event->regFrom);
        $regTo = strtotime($event->regTo);
        if ($now < $regFrom) {
            $regOngoing = false;
            $regEnded = false;
        } elseif ($now > $regFrom && $now < $regTo) {
            $regOngoing = true;
            $regEnded = false;
        } else {
            $regOngoing = false;
            $regEnded = true;
        }
        $regCount = Registration::where('eventId', '=', $id)->count();
        $onlineEvents = Event::where('publish', '=', 1)->orderBy('dateTimeFrom')->get();

        return View::make('events.view')
            ->with('title', 'Event View Page')
            ->with('currEvent', $event)
            ->with('events', $onlineEvents)
            ->with('regOngoing', $regOngoing)
            ->with('regEnded', $regEnded)
            ->with('regCount', $regCount)
            ->with('active', 'events');

    }

    public function newevent()
    {
        return View::make('events.new')
            ->with('title', 'New Event')
            ->with('active', 'events');
    }

    public function createEvent()
    {

        if (Input::has('reg')) {
            $validation = Event::validateReg(Input::all());
        } else {
            $validation = Event::validate(Input::all());
        }
        if ($validation->fails()) {
            return Redirect::route('new_event')->withErrors($validation)->withInput();
        }

        $event = new Event;

        $event->name = Input::get('name');
        $event->dateTimeFrom = Input::get('dateTimeFrom');
        $event->dateTimeTo = Input::get('dateTimeTo');
        $event->description = Input::get('description');
        $event->place = Input::get('place');
        $event->createdBy = Auth::user()->id;

        if (Input::has('publish')) {
            $event->publish = 1;
        } else {
            $event->publish = 0;
        }
        if (Input::has('reg')) {
            $event->reg = 1;
            $event->regnr = Input::get('regnr');
            if (Input::has('reserv')) {
                $event->reserv = 1;
            } else {
                $event->reserv = 0;
            }
            $event->regFrom = Input::get('regFrom');
            $event->regTo = Input::get('regTo');

        } else {
            $event->reg = 0;
        }

        if (Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                $imgName = Input::file('image')->getClientOriginalName();
                $imgExtension = Input::file('image')->getClientOriginalExtension();
                $saveName = microtime() . '_' . $imgName;
                Input::file('image')->move('img/events', $saveName);
                $URL = 'img/events/' . $saveName;
                $event->pictureUrl = $URL;
            }
        }
        $event->save();
        $message = "";
        if (Input::has('extras')) {
            $required = Input::get('required');
            foreach (Input::get('extras') as $key => $text) {
                // Lägg till data för required fält I databasen
                $message = $message.$required[$key];
                $extraFormControl = new Extraformcontrol;
                $extraFormControl->eventId = $event->id;
                if($required[$key] == 'true'){
                    $extraFormControl->required = 1;
                }
                else{
                    $extraFormControl->required = 0;
                }

                $extraFormControl->title = $text;
                $extraFormControl->save();
            }
        }


        return Redirect::to('events')
            ->with('message', $message)
            ->with('message', 'Eventet ' . htmlentities($event->name) . ' har skapats!');

    }

    public function edit($id)
    {
        if (count(Registration::where('EventId', '=', $id)->get()) < 1) {
            $editExtra = true;
        } else {
            $editExtra = false;
        }
        return View::make('events.edit')
            ->with('title', 'Edit event')
            ->with('event', Event::find($id))
            ->with('extra', Extraformcontrol::where('eventId', '=', $id)->get())
            ->with('editExtra', $editExtra)
            ->with('active', 'events');
    }

    public function update()
    {
        $id = Input::get('id');

        if (Input::has('reg')) {
            $validation = Event::validateReg(Input::all());
        } else {
            $validation = Event::validate(Input::all());
        }

        if ($validation->fails()) {
            return Redirect::route('edit_event', $id)->withErrors($validation)->withInput();
        } else {

            $event = Event::find($id);

            $event->name = Input::get('name');
            $event->dateTimeFrom = Input::get('dateTimeFrom');
            $event->dateTimeTo = Input::get('dateTimeTo');
            $event->description = Input::get('description');
            $event->place = Input::get('place');
            if (Input::has('publish')) {
                $event->publish = 1;
            } else {
                $event->publish = 0;
            }

            if (Input::has('reg')) {
                $event->reg = 1;
                $event->regnr = Input::get('regnr');
                if (Input::has('reserv')) {
                    $event->reserv = 1;
                } else {
                    $event->reserv = 0;
                }
                $event->regFrom = Input::get('regFrom');
                $event->regTo = Input::get('regTo');
            } else {
                $event->reg = 0;
                echo "<script>alert('händer')</script>";
            }


            //Jobbar med bilden:

            if (Input::hasFile('image')) {
                if (Input::file('image')->isValid()) {
                    if ($event->pictureUrl != "") {
                        File::delete($event->pictureUrl);
                    }
                    $imgName = Input::file('image')->getClientOriginalName();
                    $imgExtension = Input::file('image')->getClientOriginalExtension();
                    $saveName = microtime() . '_' . $imgName;
                    Input::file('image')->move('img/events', $saveName);
                    $URL = 'img/events/' . $saveName;
                    $event->pictureUrl = $URL;
                }
            } else {
                if (Input::get('pictureChanged') == 1) {
                    File::delete($event->pictureUrl);
                    $event->pictureUrl = "";
                }


            }

            $event->save();
            if (count(Registration::where('eventId', '=', $id)->get()) < 1) {

                $oldExtra = Extraformcontrol::where('eventId', '=', $id)->get();
                foreach ($oldExtra as $ex) {
                    $ex->delete();
                }
                if (Input::has('extras')) {

                    foreach (Input::get('extras') as $key => $text) {
                        // Lägg till data för required fält I databasen
                        $extraFormControl = new Extraformcontrol;
                        $extraFormControl->eventId = $event->id;
                        $extraFormControl->title = $text;
                        $extraFormControl->save();
                    }
                }
            }

            return Redirect::route('event', $id)
                ->with('message', 'Eventet ' . htmlentities($event->name) . '  har uppdaterats!');
        }

    }

    public function map($id)
    {
        $event = Event::find($id);
        return View::make('events.map')
            ->with('event', $event);
    }

	public function imgstore(){

        $imgName = Input::file('image')->getClientOriginalName();
        //$imgExtension = Input::file('image')->getClientOriginalExtension();
        $saveName = microtime() . '_' . $imgName;
        $folder = Input::get('folder');
        Input::file('image')->move($folder, $saveName);
        $URL = URL::to('/')."/".$folder ."/" . $saveName;
		echo $URL;
	}
    public function destroy()
    {
        $id = Input::get('id');
        $event = Event::find($id);
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

        return Redirect::route('events')
            ->with('message', 'Eventet ' . htmlentities($name) . ' har raderats!');


    }
}

?>