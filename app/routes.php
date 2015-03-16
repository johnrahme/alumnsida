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

Route::get('users', array('as'=>'users', 'uses'=>'UserController@index'))->before('auth');

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

Route::get('event/{id}/map', array('as'=>'map','uses'=>'EventController@map'));

//registrations
Route::get('event/{id}/registrations', array('as'=>'registrations', 'uses'=>'RegistrationController@index'));

Route::get('event/{id}/registrations/new', array('as'=>'new_registration', 'uses'=>'RegistrationController@newRegistration'));

Route::post('events/registrations/create', array('uses' =>'RegistrationController@createRegistration'));

Route::delete('registrations/delete', array('uses'=>'RegistrationController@destroy'));

Route::post('registrations/download', array('as'=>'registrations.download', 'uses'=>'RegistrationController@download'));


//contactPage

Route::get('contact', array('as' => 'contact', 'uses' => 'ContactController@index'));

Route::post('contact/send', array('as' => 'send', 'uses' => 'ContactController@send'));

Route::get('contact/sent', array('as' => 'sent', 'uses' => 'ContactController@sent'));

//admin

Route::get('admin', array('as' => 'admin', 'uses' => 'AdminController@index'));

Route::get('admin/new', array('as' => 'new_admin', 'uses' => 'AdminController@newadmin'));

Route::post('admin/create', array('uses' => 'AdminController@createAdmin'));
//Skapar konto för ny användare
Route::post('admin/create/reg', array('uses' => 'AdminController@createAdminReg'));

Route::get('admin/{id}', array('as'=> 'user_id', 'uses'=> 'AdminController@view'));

Route::get('admin/{id}/edit', array('as'=>'edit_admin', 'uses'=>'AdminController@edit'));

Route::get('admin/{id}/view', array('as'=>'view_admin', 'uses'=>'AdminController@view'));


Route::put('admin/update', array('uses'=>'AdminController@update'));

Route::delete('admin/delete', array('uses'=>'AdminController@destroy'));

//sessions

Route::get('login', array('as' =>'login', 'uses' => 'SessionsController@create'));

Route::get('logout', array('as' => 'logout', 'uses' => 'SessionsController@destroy'));

Route::get('forgot', array('as' =>'forgot', 'uses' => 'SessionsController@forgot'));

Route::put('recover', array('as' =>'recover', 'uses' => 'SessionsController@recover'));

Route::resource('sessions', 'SessionsController', ['only' => ['store', 'index', 'create', 'destroy']]);


