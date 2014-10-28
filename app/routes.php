<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//startsida
Route::get('/', array('as'=>'start', 'uses'=>'HomeController@index'));

//Users

Route::get('users', array('as'=>'users', 'uses'=>'UserController@index'));

Route::get('users/new', array('as'=> 'new_user', 'uses'=> 'UserController@newuser'));

Route::get('users/{id}', array('as'=> 'user', 'uses'=> 'UserController@view'));

Route::post('users/create', array('uses' =>'UserController@createUser'));

Route::get('users/{id}/edit', array('as'=>'edit_user', 'uses'=>'UserController@edit'));


Route::put('users/update', array('uses'=>'UserController@update'));

Route::delete('users/delete', array('uses'=>'UserController@destroy'));

//events

Route::get('events', array('as'=>'events', 'uses'=>'EventController@index'));

Route::get('events/new', array('as'=> 'new_event', 'uses'=> 'EventController@newevent'));

Route::get('event/{id}', array('as'=> 'event', 'uses'=> 'EventController@view'));

Route::post('events/create', array('uses' =>'EventController@createEvent'));

Route::get('events/{id}/edit', array('as'=>'edit_event', 'uses'=>'EventController@edit'));


Route::put('events/update', array('uses'=>'EventController@update'));

Route::delete('events/delete', array('uses'=>'EventController@destroy'));

