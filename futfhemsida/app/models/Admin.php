<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Admin extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'f_admins';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public static $rules = array(
        'email' => 'required|email|unique:f_admins',
        'password' => 'required',
        'username' => 'required',
        'agreement' => 'required'
    );


    public static function validate ($data){
        return Validator::make($data, static::$rules);
    }

}
