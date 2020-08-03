<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('price')->get();
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu;
        $menu->title = $request->title;
        $menu->price = $request->price;
        $menu->weight = $request->weight;
        if ($request->meat > $request->weight) {
            return redirect()->route('menu.index')->with('info_message', 'Neteisingai nurodytas mėsos kiekis.');
        }
        $menu->meat = $request->meat;
        $menu->about = $request->about;
        $menu->image = 'Fine-Dining.jpg';
        $menu->alt = 'fine-dining';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $request->file('image')->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $menu->image = $name;
            $menu->alt = $request->alt;
        }
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Sėkmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->title = $request->title;
        $menu->price = $request->price;
        $menu->weight = $request->weight;
        if ($request->meat > $request->weight) {
            return redirect()->route('menu.index')->with('info_message', 'Neteisingai nurodytas mėsos kiekis.');
        }
        $menu->meat = $request->meat;
        $menu->about = $request->about;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $request->file('image')->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $menu->image = $name;
            $menu->alt = $request->alt;
        }
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if ($menu->getRestaurants->count()){
            return redirect()->route('menu.index')->with('info_message', 'Trinti negalima, nes yra restoranuose.');
        }
 
        $menu->delete();
        return redirect()->route('menu.index')->with('info_message', 'Sėkmingai ištrintas.');
    }
}
