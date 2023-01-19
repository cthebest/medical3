<?php

namespace Modules\MenuItem\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MenuItem\Entities\MenuItem;
use Modules\MenuItem\Http\Requests\StoreMenuItemRequest;
use Modules\MenuItem\Http\Requests\UpdateMenuItemRequest;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        abort_if_cannot('view_menus');
        return view('menuitem::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        abort_if_cannot('add_menus');
        return view('menuitem::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreMenuItemRequest $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('menuitem::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(MenuItem $menuitem)
    {
        abort_if_cannot('edit_menus');
        $menuItem = $menuitem;
        return view('menuitem::edit', compact('menuItem'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateMenuItemRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
