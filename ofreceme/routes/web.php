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

Route::get('/newOferta/{id}', 'OfertasController@show');
Route::post('/newOferta', 'OfertasController@store');
Route::get('/editOferta/{id}', 'OfertasController@edit');
Route::post('/editOferta/{id}', 'OfertasController@update');

Route::get('/misdeseos','productsController@misDeseos');
Route::get('/misofertas','OfertasController@misOfertas');

Route::get('/search','searchController@search');

Route::get('/misOfertasRecibidas/{id}','OfertasController@showOfertas');
Route::get('/detallesOfertasDeMiDeseo/{id}','OfertasController@showOfertas');

Route::post('/miCarrito/{id}', 'OfertasController@addToCart');
Route::post('/removeFromCart', 'ProductsController@removeFromCart');

Route::get("/checkout", 'OfertasController@checkout');

Route::post("/checkout", 'ProductsController@finish');
