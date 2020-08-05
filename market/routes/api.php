<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas categoria
Route::get('categories','CategoryController@list');
Route::post('categories','CategoryController@store');
Route::delete('categories/{id}','CategoryController@destroy');

//Rutas Micrositio
Route::get('microsites','MicrositeController@list');
Route::post('microsites','MicrositeController@store');
Route::delete('microsites/{id}','MicrositeController@destroy');

//Rutas Productos
Route::get('products','ProductsController@list');
Route::post('products','ProductsController@store');
Route::delete('products/{id}','ProductsController@destroy');

//Rutas Servicios
Route::get('products','ProductsController@list');
Route::post('products','ProductsController@store');
Route::delete('products/{id}','ProductsController@destroy');

//Rutas Clientes
Route::get('products','ProductsController@list');
Route::post('products','ProductsController@store');
Route::delete('products/{id}','ProductsController@destroy');
