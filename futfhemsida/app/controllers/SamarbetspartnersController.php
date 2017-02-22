<?php

class SamarbetspartnersController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sp = Samarbetspartners::orderBy('created_at', 'desc')->get();
        return View::make('samarbetspartners.index')
            ->with('title', 'Samarbetspartners')
            ->with('sp', $sp)
            ->with('active', 'sp');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return View::make('samarbetspartners.create')
            ->with('title', 'Add business partner')
            ->with('active', 'sp');
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
        $sp = new Samarbetspartners;
        $sp->name = Input::get('name');
        $sp->content = Input::get('content');
        $sp->order = Input::get('order');
        $sp->abstract = Input::get('abstract');
        if (Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                $imgName = Input::file('image')->getClientOriginalName();
                $imgExtension = Input::file('image')->getClientOriginalExtension();
                $saveName = microtime() . '_' . $imgName;
                Input::file('image')->move('owncloud/styrelsen/files/images/samarbetspartners/', $saveName);
                $URL = 'owncloud/styrelsen/files/images/samarbetspartners/' . $saveName;
                $sp->url = $URL;
            }
            else{
                $sp->url = "empty";
            }
        }
        else{
            $sp->url = "empty";
        }


        $sp->save();

        return Redirect::to('sp')
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
        $sp = Samarbetspartners::find($id);

        return View::make('samarbetspartners.show')
            ->with('title', 'Visa samarbetspartners')
            ->with('sp', $sp)
            ->with('active', 'sp');
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
            ->with('title', 'Edit business relation')
            ->with('sp', Samarbetspartners::find($id))
            ->with('active', 'sp');
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
        $sp = Samarbetspartners::find($id);
        $sp->name = Input::get('name');
        $sp->content = Input::get('content');
        $sp->order = Input::get('order');
        $sp->abstract = Input::get('abstract');
        //Remove the old image if there is one
        //Remove the old image if there is one
        if (Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                $imgName = Input::file('image')->getClientOriginalName();
                $imgExtension = Input::file('image')->getClientOriginalExtension();
                $saveName = microtime() . '_' . $imgName;
                Input::file('image')->move('owncloud/styrelsen/files/images/samarbetspartners/', $saveName);
                $URL = 'owncloud/styrelsen/files/images/samarbetspartners/' . $saveName;
                $sp->url = $URL;
            }
        }




        $sp->save();

        return Redirect::to('sp')
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
        $sp = Samarbetspartners::find($id);
        $sp->delete();

        return Redirect::route('sp')
            ->with('message', 'Business partner removed');
    }


}
