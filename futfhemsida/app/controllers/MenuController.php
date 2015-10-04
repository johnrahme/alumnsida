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
        $submenus = Submenu::orderBy('order')->get();
        return View::make('menu.index')
            ->with('title', 'Menu start!')
            ->with('active', 'menu')
            ->with('menus', $menus)
            ->with('submenus', $submenus);
    }
    public function dynUrl($page){
        $pageDB = Menu::where('url', '=', $page)->first();
        $subPageDB = Submenu::where('url', '=', $page)->first();
        $returnPage = "";
        $menuActive = "";
        $subActive = "";
        if(is_null($pageDB)&&is_null($subPageDB)){
            App::abort(404);
        }
        if(!is_null($pageDB)){
            $returnPage = $pageDB;
            $menuActive = $pageDB;
        }
        if(!is_null($subPageDB)){
            $returnPage = $subPageDB;
            $subActive = $subPageDB->url;
            $menuActive = Menu::find($subPageDB->menuId);
        }
        return View::make('menu.dyn')
            ->with('title', $returnPage->name)
            ->with('page', $returnPage)
            ->with('active',$menuActive->url)
            ->with('subactive', $subActive);
    }
    public function dynUrl2($page,$page2){
        $pageString = $page.'/'.$page2;
        $pageDB = Menu::where('url', '=', $pageString)->first();
        $subPageDB = Submenu::where('url', '=', $pageString)->first();
        $menuActive = "";
        $subActive = "";
        if(is_null($pageDB)&&is_null($subPageDB)){
            App::abort(404);
        }
        if(!is_null($pageDB)){
            $returnPage = $pageDB;
            $menuActive = $returnPage;
        }
        if(!is_null($subPageDB)){
            $returnPage = $subPageDB;
            $subActive = $subPageDB->url;
            $menuActive = Menu::find($returnPage->menuId);
        }
        return View::make('menu.dyn')
            ->with('title', $returnPage->name)
            ->with('page', $returnPage)
            ->with('active',$menuActive->url)
            ->with('subactive', $subActive);
    }
    public function arrange(){
        $order = Input::get('order');
        $subId = Input::get('subId');
        $orderArr = json_decode($order);
        $menuId ="";
        if(strpos($subId, 'menu')&&strpos($subId, 'submenu')){

        }
        else if(strpos($subId, 'menu')!==false){
            $menuId = str_replace("menu","",$subId);

            foreach ($orderArr as $key => $menu) {
                $currMenu = Submenu::find($menu);
                $currMenu->order = $key;
                $currMenu->save();
            }
        }
        else if ($subId == "") {
            foreach ($orderArr as $key => $menu) {
                $currMenu = Menu::find($menu);
                $currMenu->order = $key;
                $currMenu->save();
            }
        }
        return Redirect::route('menu.index')
            ->with('message', $menuId);
    }
	public function create()
	{
        $menus = Menu::all();
        return View::make('menu.new')
            ->with('title', 'Menu create!')
            ->with('active', 'menu')
            ->with('menus', $menus);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $menuId = Input::get('parent');
        if($menuId == ""){
            $allMenus = Menu::all();
            $menu = new Menu;
            $menu->name = Input::get('name');
            $menu->url = Input::get('url');
            $menu->content = Input::get('content');
            $menu->order = count($allMenus);
            $menu->save();
        }
        else{
            $allSubMenus = Submenu::where('menuId','=',$menuId)->get();
            $submenu = new Submenu;
            $submenu->menuId = $menuId;
            $submenu->name = Input::get('name');
            $submenu->url = Input::get('url');
            $submenu->content = Input::get('content');
            $submenu->order = count($allSubMenus);
            $submenu->save();
        }

        return Redirect::route('menu.index')
            ->with('message', $menuId);
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
    public function destroySub($id)
    {
        $submenu = Submenu::find($id);
        $submenu->delete();
        return Redirect::route('menu.index')
            ->with('message', 'Sida borttagen');
    }


}
