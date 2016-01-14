<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Registration extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static $rules = array(
        'name' => 'required',
        'surname' => 'required',
        'email' => 'required|email'
    );
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

}
