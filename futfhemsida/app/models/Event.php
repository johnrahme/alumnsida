<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Event extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'f_events';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static $rules = array(
        'name' => 'required|min:2',
        'description' => 'required|min:10',
        'image' => 'image',
        'dateTimeFrom' => 'required',
        'dateTimeTo' => 'required',
        'place' => 'required'

    );
    public static $rules2 = array(
        'name' => 'required|min:2',
        'description' => 'required|min:10',
        'image' => 'image',
        'dateTimeFrom' => 'required',
        'dateTimeTo' => 'required',
        'place' => 'required',
        'regnr' => 'required|min:1',
        'regFrom' => 'required',
        'regTo' => 'required'
    );


    public static function validate ($data){
        return Validator::make($data, static::$rules);
    }
    public static function validateReg($data){
        return Validator::make($data, static::$rules2);
    }

}
