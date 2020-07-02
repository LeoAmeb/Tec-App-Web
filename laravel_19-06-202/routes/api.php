<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Empleado;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/



//Listar empleados
Route::get('empleados', function(){
    $empleados['empleados'] = Empleado::get();
    return view('empleados',$empleados);
});

//Rutas para guardar nuevos empelados y recibir data (fase 1)
Route::post('empleados',function(Request $request){
    //Verificamos que los datos enviados se reciban bien para guardar en la bd, utilizamos request

    //retornar todos los valores del array del form elaborado en postman
    //return $request->all();

    //retorna solo un parametro
    //return $request->input('estado_civil');

    //Validar data de empleado:
    $request ->validate([
        'nombres' => 'required|max:50',
        'apellidos' => 'required|max:50',
        'cedula' => 'required|max:20',
        'email' => 'required|max:50|email|unique:empleados',
        'lugar_nacimiento' => 'required|max:50',
        'estado_civil' => 'required|max:50',
        'telefono' => 'required|numeric'
    ]);


    //Llenar los parametros usando request y guardarlos en la tabla de la base de datos:
    $empleado = new Empleado;
    $empleado->nombres=$request->input('nombres');
    $empleado->apellidos=$request->input('apellidos');
    $empleado->cedula=$request->input('cedula');
    $empleado->email=$request->input('email');
    $empleado->lugar_nacimiento=$request->input('lugar_nacimiento');
    $empleado->sexo=$request->input('sexo');
    $empleado->estado_civil=$request->input('estado_civil');
    $empleado->telefono=$request->input('telefono');
    $empleado->save();
    return "Usuario creado";
});

Route::put('empleados/{id}',function(Request $request, $id){
    //Validar data de empleado:
    $request ->validate([
        'nombres' => 'required|max:50',
        'apellidos' => 'required|max:50',
        'cedula' => 'required|max:20',
        'email' => 'required|max:50|email|unique:empleados,email,' . $id,
        'lugar_nacimiento' => 'required|max:50',
        'sexo' => 'required|max:50',
        'estado_civil' => 'required|max:50',
        'telefono' => 'required|numeric'
    ]);
    
    $empleado = Empleado::findOrFail($id);
    $empleado->nombres = $request->input('nombres');
    $empleado->apellidos = $request->input('apellidos');
    $empleado->cedula = $request->input('cedula');
    $empleado->email = $request->input('email');
    $empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
    $empleado->sexo = $request->input('sexo');
    $empleado->estado_civil = $request->input('estado_civil');
    $empleado->telefono = $request->input('telefono');

    $empleado->save();
    return "Empleado actualizado";



});

Route::delete('empleados/{id}', function($id){
    $empleado = Empleado::findOrFail($id);

    $empleado->delete();
    return "Empleado eliminado";
});

