<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Support\Facades\Input;

class Registration extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static $rules = array(
       /* 'name' => 'required',
        'surname' => 'required',
        'email' => 'required|email',*/

    );

    public static function getExtraRules(){
        $rules2 = [ /*'name' => 'required',
                    'surname' => 'required',
                     'email' => 'required|email',*/];


        foreach (Input::get('extras') as $key => $value){
            $extraFieldFromDb = Extraformcontrol::find(Input::get('extrasId.'.$key));
            if(1){ // $extraFieldFromDb->required == true
                $rules2['extras.'.$key] = 'required';
            }

        }

    return $rules2;
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'f_registrations';

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
    }

    public static function validateExtras($data)
    {
        return Validator::make($data, static::getExtraRules());
    }

}
