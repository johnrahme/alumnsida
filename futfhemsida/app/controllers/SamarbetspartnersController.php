<?php

class SamarbetspartnersController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $samarbetspartners = Samarbetspartners::orderBy('created_at', 'desc')->get();
        return View::make('samarbetspartners.index')
            ->with('title', 'Samarbetspartners')
            ->with('samarbetspartners', $samarbetspartners)
            ->with('active', 'samarbetspartners');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return View::make('samarbetspartners.create')
            ->with('title', 'Add cooperation partner')
            ->with('active', 'samarbetspartners');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validation = Samarbetspartners::validate(Input::all());

        if ($validation->fails()) {
            return Redirect::route('samarbetspartners.create')->withErrors($validation)->withInput();
        }
        $samarbetspartners = new Samarbetspartners;
        $samarbetspartners->name = Input::get('name');
        $samarbetspartners->content = Input::get('content');
        $samarbetspartners->order = Input::get('order');
        $samarbetspartners->abstract = Input::get('abstract');
        if (Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                $imgName = Input::file('image')->getClientOriginalName();
                $imgExtension = Input::file('image')->getClientOriginalExtension();
                $saveName = microtime() . '_' . $imgName;
                Input::file('image')->move('filesOwncloud/styrelsen/files/images/samarbetspartners/', $saveName);
                $URL = 'filesOwncloud/styrelsen/files/images/samarbetspartners/' . $saveName;
                $samarbetspartners->url = $URL;
            }
            else{
                $samarbetspartners->url = "empty";
            }
        }
        else{
            $samarbetspartners->url = "empty";
        }


        $samarbetspartners->save();

        return Redirect::to('samarbetspartners')
            ->with('message', 'Samarbetspartnern har lagts till');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $samarbetspartners = Samarbetspartners::find($id);

        return View::make('samarbetspartners.show')
            ->with('title', 'Visa samarbetspartners')
            ->with('samarbetspartners', $samarbetspartners)
            ->with('active', 'samarbetspartners');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return View::make('samarbetspartners.edit')
            ->with('title', 'Edit cooperation partner')
            ->with('samarbetspartners', Samarbetspartners::find($id))
            ->with('active', 'samarbetspartners');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update()
    {
        $id = Input::get('id');
        $validation = Samarbetspartners::validate(Input::all());

        if ($validation->fails()) {
            return Redirect::route('news.edit', $id)->withErrors($validation)->withInput();
        }
        $samarbetspartners = Samarbetspartners::find($id);
        $samarbetspartners->name = Input::get('name');
        $samarbetspartners->content = Input::get('content');
        $samarbetspartners->order = Input::get('order');
        $samarbetspartners->abstract = Input::get('abstract');
        //Remove the old image if there is one
        if (Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                $imgName = Input::file('image')->getClientOriginalName();
                $imgExtension = Input::file('image')->getClientOriginalExtension();
                $saveName = microtime() . '_' . $imgName;
                Input::file('image')->move('filesOwncloud/styrelsen/files/images/samarbetspartners/', $saveName);
                $URL = 'filesOwncloud/styrelsen/files/images/samarbetspartners/' . $saveName;
                $samarbetspartners->url = $URL;
            }
        }




        $samarbetspartners->save();

        return Redirect::to('samarbetspartners')
            ->with('message', Input::hasFile('image'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        $id = Input::get('id');
        $samarbetspartners = Samarbetspartners::find($id);
        $samarbetspartners->delete();

        return Redirect::route('samarbetspartners')
            ->with('message', 'Cooperation partner removed');
    }


}
