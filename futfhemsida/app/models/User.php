<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    public static $rules = array(
        'name' => 'required|min:2',
        'email' => 'required|min:10'
    );
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'f_users';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
    }

}
