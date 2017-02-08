<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Extradata extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static $rules = array(
        'data' => 'required'
    );

    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'f_extradatas';

    public static function validateExtras($data)
    {
        return Validator::make(Input::all(), static::$rules);
    }

}
