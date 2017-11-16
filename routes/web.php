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
Route::get('/','CarsController@index')->name('car.index');
Route::get('/byId','CarsController@sortById')->name('car.sort_by_id');
Route::get('/byBrand','CarsController@sortByBrand')->name('car.sort_by_brand');
Route::get('/byModel','CarsController@sortByModel')->name('car.sort_by_model');
Route::get('/byPrice','CarsController@sortByPrice')->name('car.sort_by_price');
Route::get('/byCat','CarsController@sortByCategory')->name('car.sort_by_cat');
Route::get('/filter','CarsController@filter')->name('car.filter');
Route::get('/create', function () {
    return view('create');
});
Route::post('/create', 'CarsController@store')->name('car.create');