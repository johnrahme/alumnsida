<?php

class NewsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('news.index')
            ->with('title', 'News')
            ->with('active', 'events');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        return View::make('news.create')
            ->with('title', 'Create News')
            ->with('active', 'events');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validation = News::validate(Input::all());

        if ($validation->fails()) {
            return Redirect::route('news.create')->withErrors($validation)->withInput();
        }
        $news = new News;
        $news->name = Input::get('name');
        $news->content = Input::get('content');
        $news->author = Input::get('author');
        $news->save();

        return Redirect::to('news')
            ->with('message', 'Nyheten har nu skapats!');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('news.show')
            ->with('title', 'Show News')
            ->with('active', 'events');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('news.edit')
            ->with('title', 'Edit News')
            ->with('active', 'events');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
