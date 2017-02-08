<?php


class RegistrationController extends BaseController
{
    //public $layout = 'layouts.default';
    public $restful = true;

    public function index($id)
    { //Default name for starting function
        $event = Event::find($id);
        $registrations = Registration::where('eventId', '=', $id)->get();
        return View::make('registrations.index')
            ->with('title', 'Registrations')
            ->with('registrations', $registrations)
            ->with('event', $event)
            ->with('active', 'events');

    }

    public function newRegistration($id)
    {
        $extraFields = Extraformcontrol::where('eventId', '=', $id)->get();
        $event = Event::find($id);
        $regCount = Registration::where('eventId', '=', $id)->count();
        return View::make('registrations.new')
            ->with('title', 'New Registration')
            ->with('extraFields', $extraFields)
            ->with('event', $event)
            ->with('regCount', $regCount)
            ->with('active', 'events');
    }

    public function createRegistration()
    {
        $validation = Registration::validate(Input::all());
        $validationExtras = Registration::validateExtras(Input::all());
        if (Input::has('extras')) {
            if ($validation->fails() || $validationExtras->fails()) {
               return Redirect::route('new_registration', array(Input::get('eventId')))->withErrors($validationExtras)->withInput();
            }
        } else {
            if ($validation->fails()) {
                return Redirect::route('new_registration', array(Input::get('eventId')))->withErrors($validation)->withInput();
            }
        }

        $eventId = Input::get('eventId');
        $event = Event::find($eventId);
        $regCount = Registration::where('eventId', '=', $eventId)->count();

        $registration = new Registration;
        $registration->name = Input::get('name');
        $registration->surname = Input::get('surname');
        $registration->email = Input::get('email');
        $registration->tel = $event->name;
        $registration->eventId = $eventId;
        if ($regCount < $event->regnr) {
            $registration->res = 0;
        } else {
            $registration->res = 1;
        }
        $registration->save();

        if (Input::has('extras')) {
            $extras = Input::get('extras');
            $extrasId = Input::get('extrasId');
            /*
            for($i = 0; $i < count($extras); $i++){

            }*/
            foreach ($extras as $key => $text) {
                $extraData = new Extradata;
                $extraData->registrationsId = $registration->id;
                $extraData->extraFromControlId = $extrasId[$key];
                $extraData->data = $text;
                $extraData->save();
            }

        }


        return Redirect::route('event', array(Input::get('eventId')))
            ->with('message', 'Du är nu registrerad på eventet!');

    }

    public function download()
    {
        $event = Event::find(Input::get('eventId'));
        $eventId = $event->id;

        $typ = Input::get('format');
        $filename = $event->name . "-" . date("Y-m-d");

        $data = Registration::where('eventId', '=', $eventId)->get();
        $data2 = Extraformcontrol::where('eventId', '=', $eventId)->get();


        $file = Excel::create($filename, function ($excel) use ($data, $data2) {

            $excel->sheet('Sheet 1', function ($sheet) use ($data, $data2) {
                $label = array(
                    'ID', 'event Id', 'Förnamn', 'Efternamn', 'Email', 'Telefon', 'Reserv', 'Skapad', 'Uppdaterad'
                );
                foreach ($data2 as $exLabel) {
                    $labelValue = $exLabel->title;
                    array_push($label, $labelValue);
                }
                $sheet->cells('A1:N1', function ($cells) {
                    $cells->setFontWeight('bold');
                });

                $sheet->row(1, $label);
                foreach ($data as $key => $element) {
                    $ex1 = Extradata::select('data')->where('registrationsId', '=', $element->id)->get();
                    $array1 = $element->toArray();
                    foreach ($ex1 as $extra) {
                        $exValue = $extra->data;
                        array_push($array1, $exValue);
                    }
                    $sheet->row($key + 2, $array1);
                };
            });

        });

        if ($typ == 'xls') {
            $file->download('xlsx');
        } else {
            $file->download('csv');
        }
    }

    public function destroy()
    {
        $id = Input::get('id');
        $registration = Registration::find($id);
        $eventId = $registration->eventId;
        $name = $registration->name;
        $extraData = Extradata::where('registrationsId', '=', $id)->get();
        //Viktigt! Ta även bort ExtraData
        foreach ($extraData as $ex) {
            $ex->delete();
        }

        $registration->delete();

        return Redirect::route('registrations', $eventId)
            ->with('message', 'The registration ' . htmlentities($name) . ' was deleted successfully');


    }
}


?>