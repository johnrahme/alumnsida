<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Submenu extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'f_submenus';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static $rules = array(
        'name'=>'required'
    );


    public static function validate ($data){
        return Validator::make($data, static::$rules);
    }

}
