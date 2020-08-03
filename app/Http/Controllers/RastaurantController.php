<?php

namespace App\Http\Controllers;

use App\Rastaurant;
use App\Menu;
use Illuminate\Http\Request;

class RastaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $restaurants = Rastaurant::orderBy('title')->get();
        $menus = Menu::all();
        $selectId = 0;
        if ($request->menu_id) {
            $restaurants = Rastaurant::where('menu_id', $request->menu_id)->orderBy('title')->get();
            $selectId = $request->menu_id;
        } else {            
            $restaurants = Rastaurant::orderBy('title')->get();            
        }
        return view('restaurant.index', compact('restaurants', 'menus', 'selectId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::orderBy('title')->get();
        return view('restaurant.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Rastaurant;
        $restaurant->title = $request->title;
        $restaurant->customers = $request->customers;
        $restaurant->employees = $request->employees;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Sėkmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rastaurant  $rastaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Rastaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rastaurant  $rastaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Rastaurant $restaurant)
    {
        $menus = Menu::all();
        return view('restaurant.edit', compact('restaurant', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rastaurant  $rastaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rastaurant $restaurant)
    {
        $restaurant->title = $request->title;
        $restaurant->customers = $request->customers;
        $restaurant->employees = $request->employees;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rastaurant  $rastaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rastaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurant.index')->with('success_message', 'Sėkmingai ištrintas.');
    }
}
