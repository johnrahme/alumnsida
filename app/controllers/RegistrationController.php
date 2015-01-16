<?php


class RegistrationController extends BaseController
{
    //public $layout = 'layouts.default';
    public $restful = true;

    public function index($id)
    { //Default name for starting function
        $registrations = registration::where('eventId','=',$id)->get();
        return View::make('registrations.index')
            ->with('title', 'Registrations')
            ->with('registrations', $registrations);

    }

    public function newRegistration($id){
        $extraFields = extraFormControl::where('eventId','=',$id)->get();
        $event = event::find($id);
        return View::make('registrations.new')
            ->with('title', 'New Registration')
            ->with('extraFields', $extraFields)
            ->with('event', $event);
    }

    public function createRegistration(){
        $validation = registration::validate(Input::all());
        if($validation->fails()){
            return Redirect::route('new_registration')->withErrors($validation)->withInput();
        }

        $registration = new registration;

        $registration->name = Input::get('name');
        $registration->surname = Input::get('surname');
        $registration->email = Input::get('email');
        $registration->tel = Input::get('tel');
        $registration->eventId = Input::get('eventId');
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