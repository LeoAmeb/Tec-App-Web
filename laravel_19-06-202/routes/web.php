<?php

use Illuminate\Support\Facades\Route;

//Vista para el controlador de empleado
Route::resource('empleados','empleadosController');
Route::resource('departamentos','DepartamentosController');

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

Route::get('/empleadosform', function () {
    return view('formularioemp');
});

Route::get('/productos', function(){
    return ('Listado de productos (get)');
});

Route::post('/productos', function(){
    return ('Almacenando productos (post)');
});

Route::put('/productos/{id}', function($id){
    return ('Actualizando productos: ' . $id);
});

//Parametro
Route::get('saludo/{nombre}/{apodo?}', function ($nombre, $apodo=null){
    //Poner la primera letra en mayuscula
    $nombre = ucfirst($nombre);
    //validar si tiene un apodo
    if($apodo){
        return "Bienvenido {$nombre}, tu apodo es {$apodo}";
    }else{
        return "Bienvenido {$nombre}";
    }
});

//Metodos para obtencion, guardado y eliminacion de datos:
//get, post(guardar), put, delete

//COMANDOS
/*
1. Crear migracion:
php artisan make:migration Nombre

2. Crear modelo
php artisan make:model Nombre

3. 
*/

