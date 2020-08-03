<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'menus'], function(){
    Route::get('', 'MenuController@index')->name('menu.index');
    Route::get('create', 'MenuController@create')->name('menu.create');
    Route::post('store', 'MenuController@store')->name('menu.store');
    Route::get('edit/{menu}', 'MenuController@edit')->name('menu.edit');
    Route::post('update/{menu}', 'MenuController@update')->name('menu.update');
    Route::post('delete/{menu}', 'MenuController@destroy')->name('menu.destroy');
    Route::get('show/{menu}', 'MenuController@show')->name('menu.show');
});
 

Route::group(['prefix' => 'restaurants'], function(){
    Route::get('', 'RastaurantController@index')->name('restaurant.index');
    Route::get('create', 'RastaurantController@create')->name('restaurant.create');
    Route::post('store', 'RastaurantController@store')->name('restaurant.store');
    Route::get('edit/{restaurant}', 'RastaurantController@edit')->name('restaurant.edit');
    Route::post('update/{restaurant}', 'RastaurantController@update')->name('restaurant.update');
    Route::post('delete/{restaurant}', 'RastaurantController@destroy')->name('restaurant.destroy');
    Route::get('show/{restaurant}', 'RastaurantController@show')->name('restaurant.show');
});
 