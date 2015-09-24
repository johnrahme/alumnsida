<?php

class MenuController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $menus = Menu::orderBy('order')->get();
        return View::make('menu.index')
            ->with('title', 'Menu start!')
            ->with('active', 'menu')
            ->with('menus', $menus);
    }
    public function dynUrl($page){
        $pageDB = Menu::where('url', '=', $page)->first();
        if(is_null($pageDB)){
            App::abort(404);
        }
        return View::make('menu.dyn')
            ->with('title', 'Menu start!')
            ->with('page', $pageDB)
            ->with('active',$pageDB->url);
    }
    public function arrange(){
        $order = Input::get('order');
        $orderArr = json_decode($order);
        foreach($orderArr as $key => $menu){
            $currMenu = Menu::where('url', '=',$menu)->first();
            $currMenu->order = $key;
            $currMenu->save();
        }
        return Redirect::route('menu.index')
            ->with('message', 'Meny uppdaterad!');
    }
	public function create()
	{
        return View::make('menu.new')
            ->with('title', 'Menu create!');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $allMenus = Menu::all();
        $menu = new Menu;
        $menu->name = Input::get('name');
        $menu->url = Input::get('url');
        $menu->content = Input::get('content');
        $menu->order = count($allMenus);

        $menu->save();
        return Redirect::route('menu.index')
            ->with('message', 'Ny sida tillagd!');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
        $menu = Menu::find($id);
        $menu->delete();
        return Redirect::route('menu.index')
            ->with('message', 'Sida borttagen');
	}


}
