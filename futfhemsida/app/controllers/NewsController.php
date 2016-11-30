<?php

class NewsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $news = News::all();
        return View::make('news.index')
            ->with('title', 'News')
            ->with('news', $news)
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
        $news->order = Input::get('order');
        $news->abstract = Input::get('abstract');
        if (Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                $imgName = Input::file('image')->getClientOriginalName();
                $imgExtension = Input::file('image')->getClientOriginalExtension();
                $saveName = microtime() . '_' . $imgName;
                Input::file('image')->move('owncloud/styrelsen/files/images/news/', $saveName);
                $URL = 'owncloud/styrelsen/files/images/news/' . $saveName;
                $news->url = $URL;
            }
            else{
                $news->url = "empty";
            }
        }
        else{
            $news->url = "empty";
        }


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
        $news = News::find($id);



        return View::make('news.show')
            ->with('title', 'Show News')
            ->with('news', $news)
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
            ->with('news', News::find($id))
            ->with('active', 'events');
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
        $validation = News::validate(Input::all());

        if ($validation->fails()) {
            return Redirect::route('news.edit', $id)->withErrors($validation)->withInput();
        }
        $news = News::find($id);
        $news->name = Input::get('name');
        $news->content = Input::get('content');
        $news->author = Input::get('author');
        $news->order = Input::get('order');
        $news->abstract = Input::get('abstract');
        //Remove the old image if there is one
        //Remove the old image if there is one
        if (Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                $imgName = Input::file('image')->getClientOriginalName();
                $imgExtension = Input::file('image')->getClientOriginalExtension();
                $saveName = microtime() . '_' . $imgName;
                Input::file('image')->move('owncloud/styrelsen/files/images/news/', $saveName);
                $URL = 'owncloud/styrelsen/files/images/news/' . $saveName;
                $news->url = $URL;
            }
        }




        $news->save();

        return Redirect::to('news')
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
        $news = News::find($id);
        $news->delete();

        return Redirect::route('news')
            ->with('message', 'The news was deleted successfully');
	}


}
