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

Route::get('shops', 'ShopsController@list');
Route::get('shops/{id}', 'ShopsController@get');
Route::post('shops', 'ShopsController@create');
Route::put('shops/{id}', 'ShopsController@update');
Route::delete('shops/{id}', 'ShopsController@delete');

Route::get('users', 'UsersController@list');
Route::get('users/{id}', 'UsersController@get');
Route::post('users', 'UsersController@create');
Route::put('users/{id}', 'UsersController@update');
Route::delete('users/{id}', 'UsersController@delete');

Route::get('users_shop', 'UsersController@getUserShops');

Route::get('products', 'ProductsController@list');
Route::get('products/{id}', 'ProductsController@get');
Route::post('products', 'ProductsController@create');
Route::put('products/{id}', 'ProductsController@update');
Route::delete('products/{id}', 'ProductsController@delete');

Route::get('services', 'ServicesController@list');
Route::get('services/{id}', 'ServicesController@get');
Route::post('services', 'ServicesController@create');
Route::put('services/{id}', 'ServicesController@update');
Route::delete('services/{id}', 'ServicesController@delete');
