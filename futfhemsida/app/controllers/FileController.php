<?php

class FileController extends BaseController
{


    public function index()
    {
        $onlineEvents = Event::where('publish', '=', 1)->orderBy('dateTimeFrom')->get();
        $eventsWithPictures = Event::where('publish', '=', 1)->where('pictureUrl', '!=', '')->orderBy('dateTimeFrom')->get();
        return View::make('fileuploader.index')
            ->with('title', 'FUTF')
            ->with('events', $onlineEvents)
            ->with('eventsWithPictures', $eventsWithPictures)
            ->with('active', 'fileuploader');
    }

    public function adminIndex()
    {
        $onlineEvents = Event::where('publish', '=', 1)->orderBy('dateTimeFrom')->get();
        $eventsWithPictures = Event::where('publish', '=', 1)->where('pictureUrl', '!=', '')->orderBy('dateTimeFrom')->get();
        return View::make('fileuploader.index')
            ->with('title', 'FUTF')
            ->with('events', $onlineEvents)
            ->with('eventsWithPictures', $eventsWithPictures)
            ->with('showLogin', '1')
            ->with('active', 'fileuploader');
    }

   /* public function upload()
    {
        $file = Input::file('file');
        if ($file) {
            $destinationPath = public_path() . '/uploads/';
            $filename = $file->getClientOriginalName();
            return Input::file('file')->move($destinationPath, $filename);
        }
    }*/

}
