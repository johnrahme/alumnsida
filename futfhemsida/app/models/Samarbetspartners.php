<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Samarbetspartners extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static $rules = array(
        'name' => 'required|min:2|max:50',
        'content' => 'required|min:20',
        'abstract' => 'required|min:10|max:440'

    );
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'f_samarbetspartner';

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
    }


}
