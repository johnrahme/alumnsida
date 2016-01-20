<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class News extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static $rules = array(
        'name' => 'required|min:2',
        'content' => 'required|min:10',
        'author' => 'required|min:2'

    );
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'f_news';

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
    }


}
