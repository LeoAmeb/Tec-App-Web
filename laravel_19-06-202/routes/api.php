<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Empleado;

Route::get('empleados',function(){
	$empleados =Empleado::get();
	return $empleados;
});

Route::post('empleados',function(Request $request){
	//Verificamos que los datos enviados se reciban bien para guardar
	//en la b, utilizamos request
/*
retornamos un solo parametro
return $request ->input('estado_civil');
*/

/*
retorna todos los datos del array del form elaborado en postman
return $request ->all();
*/
//Se hace la validación de los datos obtenidos por el request
$request->validate([
'nombres' =>'required|max:50',
'apellidos' =>'required|max:50',
'cedula' =>'required|max:20',
'email' =>'required|max:50',
'lugar_nacimiento' =>'required|max:50|unique:empleados',
'estado_civil' =>'required|max:50',
'telefono' =>'required|numeric',
]);
/*
Llenar los parametros usando Request y guardalos en la tabla
de la base de datos
*/
$empleado = new Empleado;
$empleado->nombres = $request->input('nombres');
$empleado->apellidos = $request->input('apellidos');
$empleado->cedula = $request->input('cedula');
$empleado->email = $request->input('email');
$empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
$empleado->nacimiento = $request->input('nacimiento');
$empleado->sexo = $request->input('sexo');
$empleado->estado_civil = $request->input('estado_civil');
$empleado->telefono = $request->input('telefono');
$empleado->save();
	return "Usuario Creado";
	//return 'empleado guardado';
});