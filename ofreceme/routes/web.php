<?php

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

Route::get('/productos/{id}','productsController@Products')->name('Products');
Route::get('/newproduct', 'productsController@show');
Route::post('/newproduct', 'productsController@store');
Route::get('/editproduct/{id}', 'productsController@edit');
Route::post('/editproduct/{id}', 'productsController@update');

Route::get('/misdeseos','productsController@misDeseos');
Route::get('/misofertas','productsController@misOfertas');
