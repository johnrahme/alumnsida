<?php


class ContactController extends BaseController
{
    public $restful = true;

    public function index()
    {
        return View::make('contact.index')
            ->with('title', 'Kontakt')
            ->with('active', 'contactA');
    }

    public function send()
    {
//        $validation = Contact::validate(Input::all());
//
//        if ($validation->fails()) {
//            return Redirect::route('contact')->withErrors($validation)->withInput();
//        }
        $data = array('name' => Input::get('contact-name'), 'email' => Input::get('contact-email'), 'text' => Input::get('contact-text'));
        Mail::send('emails.contact.contact', $data, function ($message) {
            $message->from(Input::get('contact-email'), Input::get('contact-name'));

            $message->to('it@futf.se')->subject('Kontaktformulär hemsida');

        });
        return Redirect::to('contact/sent')
            ->with('name', Input::get('contact-name'));
    }

    public function sent()
    {

        return View::make('contact.sent')
            ->with('title', 'Skickat')
            ->with('active', 'contactA');
    }
}
