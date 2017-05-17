<?php

class MenuController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $menus = Menu::orderBy('order')->get();
        $submenus = Submenu::orderBy('order')->get();
        $subsubmenus = Subsubmenu::orderBy('order')->get();
        return View::make('menu.index')
            ->with('title', 'Menu start!')
            ->with('active', 'menu')
            ->with('menus', $menus)
            ->with('submenus', $submenus)
            ->with('subsubmenus', $subsubmenus);
    }

    public function dynUrl($page)
    {
        $pageString = $page;
        $pageDB = Menu::where('url', '=', $pageString)->first();
        $subPageDB = Submenu::where('url', '=', $pageString)->first();
        $subSubPageDB = Subsubmenu::where('url', '=', $pageString)->first();
        $menuActive = "";
        $subActive = "";
        $subSubActive = "";
        if (is_null($pageDB) && is_null($subPageDB) && is_null($subSubPageDB)) {

            App::abort(404);

        }
        if (!is_null($pageDB)) {
            $returnPage = $pageDB;
            $menuActive = $returnPage;
        }
        if (!is_null($subPageDB)) {
            $returnPage = $subPageDB;
            $subActive = $subPageDB->url;
            $menuActive = Menu::find($returnPage->menuId);
        }
        if (!is_null($subSubPageDB)) {
            $returnPage = $subSubPageDB;
            $subSubActive = $subSubPageDB->url;
            $test = $returnPage->subMenuId;
            $subActiveObj = Submenu::find($returnPage->subMenuId);
            $subActive = $subActiveObj->url;
            $menuActive = Menu::find($subActiveObj->menuId);
        }
        return View::make('menu.dyn')
            ->with('title', $returnPage->name)
            ->with('page', $returnPage)
            ->with('active', $menuActive->url)
            ->with('subactive', $subActive)
            ->with('subsubactive', $subSubActive);
    }

    public function dynUrl2($page, $page2)
    {
        $pageString = $page . '/' . $page2;
        $pageDB = Menu::where('url', '=', $pageString)->first();
        $subPageDB = Submenu::where('url', '=', $pageString)->first();
        $subSubPageDB = Subsubmenu::where('url', '=', $pageString)->first();
        $menuActive = "";
        $subActive = "";
        $subSubActive = "";
        if (is_null($pageDB) && is_null($subPageDB) && is_null($subSubPageDB)) {

            App::abort(404);

        }
        if (!is_null($pageDB)) {
            $returnPage = $pageDB;
            $menuActive = $returnPage;
        }
        if (!is_null($subPageDB)) {
            $returnPage = $subPageDB;
            $subActive = $subPageDB->url;
            $menuActive = Menu::find($returnPage->menuId);
        }
        if (!is_null($subSubPageDB)) {
            $returnPage = $subSubPageDB;
            $subSubActive = $subSubPageDB->url;
            $test = $returnPage->subMenuId;
            $subActiveObj = Submenu::find($returnPage->subMenuId);
            $subActive = $subActiveObj->url;
            $menuActive = Menu::find($subActiveObj->menuId);
        }
        return View::make('menu.dyn')
            ->with('title', $returnPage->name)
            ->with('page', $returnPage)
            ->with('active', $menuActive->url)
            ->with('subactive', $subActive)
            ->with('subsubactive', $subSubActive);
    }

    public function dynUrl3($page, $page2, $page3)
    {
        $pageString = $page . '/' . $page2 . '/' . $page3;
        $pageDB = Menu::where('url', '=', $pageString)->first();
        $subPageDB = Submenu::where('url', '=', $pageString)->first();
        $subSubPageDB = Subsubmenu::where('url', '=', $pageString)->first();
        $menuActive = "";
        $subActive = "";
        $subSubActive = "";
        if (is_null($pageDB) && is_null($subPageDB) && is_null($subSubPageDB)) {

            App::abort(404);

        }
        if (!is_null($pageDB)) {
            $returnPage = $pageDB;
            $menuActive = $returnPage;
        }
        if (!is_null($subPageDB)) {
            $returnPage = $subPageDB;
            $subActive = $subPageDB->url;
            $menuActive = Menu::find($returnPage->menuId);
        }
        if (!is_null($subSubPageDB)) {
            $returnPage = $subSubPageDB;
            $subSubActive = $subSubPageDB->url;
            $test = $returnPage->subMenuId;
            $subActiveObj = Submenu::find($returnPage->subMenuId);
            $subActive = $subActiveObj->url;
            $menuActive = Menu::find($subActiveObj->menuId);
        }
        return View::make('menu.dyn')
            ->with('title', $returnPage->name)
            ->with('page', $returnPage)
            ->with('active', $menuActive->url)
            ->with('subactive', $subActive)
            ->with('subsubactive', $subSubActive);
    }

    public function arrange()
    {
        $order = Input::get('order');
        $subId = Input::get('subId');
        $subSubId = Input::get('subSubId');
        $orderArr = json_decode($order);
        $menuId = "";

        if (strpos($subId, 'submenu')!==false) {
            $menuId = str_replace("submenu", "", $subId);

            foreach ($orderArr as $key => $menu) {
                $currMenu = Subsubmenu::find($menu);
                $currMenu->order = $key;
                $currMenu->save();
            }

        } else if (strpos($subId, 'menu') !== false) {
            $menuId = str_replace("menu", "", $subId);

            foreach ($orderArr as $key => $menu) {
                $currMenu = Submenu::find($menu);
                $currMenu->order = $key;
                $currMenu->save();
            }
        } else if ($subId == "") {
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
        $submenus = Submenu::all();
        return View::make('menu.new')
            ->with('title', 'Menu create!')
            ->with('active', 'menu')
            ->with('menus', $menus)
            ->with('submenus', $submenus);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validation = Menu::validate(Input::all());

        if ($validation->fails()) {
            return Redirect::route('menu.create')->withErrors($validation)->withInput();
        }
        $menuId = Input::get('parent');
        $subMenuId = Input::get('grandparent');
        if ($menuId == "") {
            $allMenus = Menu::all();
            $menu = new Menu;
            $menu->name = Input::get('name');
            $menu->url = Input::get('url');
            $menu->content = Input::get('content');
            $menu->online = Input::get('online');
            $menu->order = count($allMenus);
            $menu->save();
        } else if($subMenuId == ""){
            $allSubMenus = Submenu::where('menuId', '=', $menuId)->get();
            $submenu = new Submenu;
            $submenu->menuId = $menuId;
            $submenu->name = Input::get('name');
            $submenu->url = Input::get('url');
            $submenu->content = Input::get('content');
            $submenu->online = Input::get('online');
            $submenu->order = count($allSubMenus);
            $submenu->save();
        }
        else{
            $allSubSubMenus = Subsubmenu::where('subMenuId', '=', $subMenuId)->get();
            $subsubmenu = new Subsubmenu;
            $subsubmenu->subMenuId = $subMenuId;
            $subsubmenu->name = Input::get('name');
            $subsubmenu->url = Input::get('url');
            $subsubmenu->content = Input::get('content');
            $subsubmenu->online = Input::get('online');
            $subsubmenu->order = count($allSubSubMenus);
            $subsubmenu->save();
        }

        if($menuId == "") {
            return Redirect::route('menu.index')
                ->with('message', 'Menyn ' . htmlentities($menu->name) . ' skapad!');
        }
        else if($subMenuId == "") {
            return Redirect::route('menu.index')
                ->with('message', 'Menyn ' . htmlentities($submenu->name) . ' skapad!');
        }
        else {
            return Redirect::route('menu.index')
                ->with('message', 'Menyn ' . htmlentities($subsubmenu->name) . ' skapad!');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id,$type)
    {
        $menus = Menu::all();
        $submenus = Submenu::all();
        return View::make('menu.edit')
            ->with('title', 'Edit menu!')
            ->with('active', 'menu')
            ->with('menus', $menus)
            ->with('submenus', $submenus);

    }

    public function change($type,$id)
    {
        $currMenu = "";
        $firstName = "";
        $secondName = "";
        $bottom = false;
        if($type == 0){
            $currMenu = Menu::find($id);
            $emptyCheck = Submenu::where('menuId','=',$id)->get();

            if($emptyCheck->isEmpty()){
                $bottom = true;
            }
        }
        else if ($type == 1){
            $currMenu = Submenu::find($id);
            $first = Menu::find($currMenu->menuId);
            $firstName = $first->name;

            $emptyCheck = Subsubmenu::where('subMenuId','=',$id)->get();
            if($emptyCheck->isEmpty()){
                $bottom = true;
            }
        }
        else if($type == 2){
            $currMenu = Subsubmenu::find($id);
            $second = Submenu::find($currMenu->subMenuId);
            $first = Menu::find($second->menuId);
            $firstName = $first->name;
            $secondName = $second->name;
            $bottom = true;
        }
        $menus = Menu::all();
        $submenus = Submenu::all();
        return View::make('menu.edit')
            ->with('title', 'Edit menu!')
            ->with('active', 'menu')
            ->with('currMenu', $currMenu)
            ->with('menus', $menus)
            ->with('submenus', $submenus)
            ->with('firstName', $firstName)
            ->with('secondName', $secondName)
            ->with('type', $type)
            ->with('bottom', $bottom);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update()
    {
        $id = Input::get('id');
        $validation = Menu::validate(Input::all());

        if ($validation->fails()) {
            return Redirect::route('menu.edit', $id)->withErrors($validation)->withInput();
        }
        $type = Input::get('type');
        $menuId = Input::get('parent');
        $subMenuId = Input::get('grandparent');
        if ($menuId == "") {
            $allMenus = Menu::all();
            $menu =  new Menu;
            if($type == 0){
                $menu = Menu::find($id);
            }
            else if($type == 1){
                $del = Submenu::find($id);
                $del->delete();
                $menu = new Menu;
            }
            else if($type == 2){
                $del = Subsubmenu::find($id);
                $del->delete();
                $menu = new Menu;
            }

            $menu->name = Input::get('name');
            $menu->url = Input::get('url');
            $menu->content = Input::get('content');
            $menu->online = Input::get('online');
            $menu->order = count($allMenus);
            $menu->save();
        } else if($subMenuId == ""){
            $allSubMenus = Submenu::where('menuId', '=', $menuId)->get();
            $submenu = "";
            if($type == 0){
                $del = Menu::find($id);
                $del->delete();
                $submenu = new Submenu;
            }
            else if($type == 1){
                $submenu = Submenu::find($id);
            }
            else if($type == 2){
                $del = Subsubmenu::find($id);
                $del->delete();
                $submenu = new Submenu;
            }
            $submenu->menuId = $menuId;
            $submenu->name = Input::get('name');
            $submenu->url = Input::get('url');
            $submenu->content = Input::get('content');
            $submenu->online = Input::get('online');
            $submenu->order = count($allSubMenus);
            $submenu->save();
        }
        else{
            $allSubSubMenus = Subsubmenu::where('subMenuId', '=', $subMenuId)->get();
            $subsubmenu = "";
            if($type == 0){
                $del = Menu::find($id);
                $del->delete();
                $subsubmenu = new Subsubmenu;
            }
            else if($type == 1){
                $del = Submenu::find($id);
                $del->delete();
                $subsubmenu = new Subsubmenu;
            }
            else if($type == 2){
                $subsubmenu = Subsubmenu::find($id);

            }

            $subsubmenu->subMenuId = $subMenuId;
            $subsubmenu->name = Input::get('name');
            $subsubmenu->url = Input::get('url');
            $subsubmenu->content = Input::get('content');
            $subsubmenu->online = Input::get('online');
            $subsubmenu->order = count($allSubSubMenus);
            $subsubmenu->save();
        }

        if($menuId == "") {
            return Redirect::route('menu.index')
                ->with('message', 'Menyn ' . htmlentities($menu->name) . ' uppdaterad!');
        }
        else if($subMenuId == "") {
            return Redirect::route('menu.index')
                ->with('message', 'Menyn ' . htmlentities($submenu->name) . ' uppdaterad!');
        }
        else {
            return Redirect::route('menu.index')
                ->with('message', 'Menyn ' . htmlentities($subsubmenu->name) . ' uppdaterad!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return Redirect::route('menu.index')
            ->with('message', 'Sida ' . htmlentities($menu->name) . ' borttagen');
    }

    public function destroySub($id)
    {
        $submenu = Submenu::find($id);
        $submenu->delete();
        return Redirect::route('menu.index')
            ->with('message', 'Sida ' . htmlentities($submenu->name) . ' borttagen');
    }
    public function destroySubSub($id){
        $subsubmenu = Subsubmenu::find($id);
        $subsubmenu->delete();
        return Redirect::route('menu.index')
            ->with('message', 'Sida ' . htmlentities($subsubmenu->name) . ' borttagen');
    }


}
