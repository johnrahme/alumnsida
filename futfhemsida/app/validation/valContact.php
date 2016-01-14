<?php

class valContact
{

    public static $rules = array(
        'image' => 'image'
    );


    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
    }
}

