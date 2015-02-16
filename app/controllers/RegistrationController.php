<?php


class RegistrationController extends BaseController
{
    //public $layout = 'layouts.default';
    public $restful = true;

    public function index($id)
    { //Default name for starting function
        $event = event::find($id);
        $registrations = registration::where('eventId','=',$id)->get();
        return View::make('registrations.index')
            ->with('title', 'Registrations')
            ->with('registrations', $registrations)
            ->with('event', $event);

    }

    public function newRegistration($id){
        $extraFields = extraFormControl::where('eventId','=',$id)->get();
        $event = event::find($id);
        $regCount = registration::where('eventId', '=', $id)->count();
        return View::make('registrations.new')
            ->with('title', 'New Registration')
            ->with('extraFields', $extraFields)
            ->with('event', $event)
            ->with('regCount', $regCount);
    }

    public function createRegistration(){
        $validation = registration::validate(Input::all());
        if($validation->fails()){
            return Redirect::route('new_registration')->withErrors($validation)->withInput();
        }
        $eventId = Input::get('eventId');
        $event = event::find($eventId);
        $regCount = registration::where('eventId', '=', $eventId)->count();

        $registration = new registration;
        $registration->name = Input::get('name');
        $registration->surname = Input::get('surname');
        $registration->email = Input::get('email');
        $registration->tel = $event->name;
        $registration->eventId = $eventId;
        if($regCount<$event->regnr){
            $registration->res = 0;
        }
        else{
            $registration->res = 1;
        }
        $registration->save();

        if(Input::has('extras')){
            $extras = Input::get('extras');
            $extrasId = Input::get('extrasId');
            /*
            for($i = 0; $i < count($extras); $i++){

            }*/
            foreach($extras as $key => $text){
                $extraData = new extraData;
                $extraData->registrationsId = $registration->id;
                $extraData->extraFromControlId = $extrasId[$key];
                $extraData->data = $text;
                $extraData->save();
            }

        }



        return Redirect::route('event', array(Input::get('eventId')))
            ->with('message', 'Du är nu registrerad på eventet!. Alright!');

    }
    public function download(){
        $event = event::find(Input::get('eventId'));
        $eventId = $event->id;

        $typ = Input::get('format');
        $filename = $event->name . "-". date("Y-m-d");

        $data = registration::where('eventId', '=', $eventId)->get();
        $data2 = extraformcontrol::where('eventId', '=', $eventId)->get();




        $file = Excel::create($filename, function($excel) use($data,$data2) {

            $excel->sheet('Sheet 1', function($sheet) use($data, $data2) {
                $label = array(
                    'ID', 'event Id', 'Förnamn', 'Efternamn','Email', 'Telefon','Reserv' ,'Skapad', 'Uppdaterad'
                );
                foreach($data2 as $exLabel){
                    $labelValue = $exLabel->title;
                    array_push($label, $labelValue);
                }
                $sheet->cells('A1:N1', function($cells){
                   $cells->setFontWeight('bold');
                });

                $sheet->row(1, $label);
                foreach($data as $key=>$element){
                    $ex1 = extradata::select('data')->where('registrationsId','=', $element->id)->get();
                    $array1 = $element->toArray();
                    foreach($ex1 as $extra){
                        $exValue = $extra->data;
                        array_push($array1, $exValue);
                    }
                    $sheet->row($key+2, $array1);
                };
            });

        });

        if($typ == 'xls'){
            $file->download('xlsx');
        }
        else {
            $file->download('csv');
        }
    }
    public function destroy(){
        $id = Input::get('id');
        $registration = registration::find($id);
        $eventId = $registration->eventId;
        $name = $registration->name;
        $extraData = extraData::where('registrationsId','=', $id)->get();
        //Viktigt! Ta även bort ExtraData
        foreach($extraData as $ex) {
            $ex->delete();
        }

        $registration->delete();

        return Redirect::route('registrations', $eventId)
            ->with('message', 'The registration '.htmlentities($name).' was deleted successfully');


    }
}


?>