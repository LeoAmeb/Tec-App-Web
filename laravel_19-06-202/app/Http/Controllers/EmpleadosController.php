<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Departamentos;
use DB;

class empleadosController extends Controller
{
    //
    public function index(){
        //Obtener todos los empleados de la tabla de la bd
        //$empleados=Empleado::all();
        //Consulta a la base de datos para que traiga los registros de empleados y el nombre del departamento del empleado
        $empleados = DB::table('empleados')->join('departamentos', 'empleados.dep_id', '=', 'departamentos.id')->select('empleados.*', 'departamentos.nombre')->get();
        
        //Mostrar vista de la consulta de empleados
        return view('empleados.admin_empleados', compact('empleados'));

    }

    //Controlador para crear nuevo empleado
    public function create(){
        $departamentos= Departamentos::all();
        //Mostrar el formulario para crear empleado
        return view('empleados.alta_empleado', compact('departamentos'));


    }

    //controlador para almacenar empleados
    public function store(Request $request){
        //retirar los datos del request
        $datosEmpleado = request()->except('empleado');

        //Insertar en la tabla empleado los datos para la creacion de un nuevo registro
        $id = DB::table('empleados')->insertGetId($datosEmpleado);

        //Alert::success('Datos guardados con exito');
        return redirect('empleados');
    }

    //Controlador para editar empleados
    public function edit($id){
        //Editar empleados y mandar a la vista la informacion
        $empleados = Empleado::findOrFail($id);
        $departamentos= Departamentos::all();
        //Mostrar la vista
        return view('empleados.editar_empleado',compact('empleados'), compact('departamentos'));
    }

    //Controldor para actualizar el usuario seleccionado.
    public function update(Request $request, $id){
        $empleado = Empleado::findOrFail($id);
        //Guardando los nuevos valores del empleado
        $empleado->nombres = $request->input('nombres');
        $empleado->apellidos = $request->input('apellidos');    
        $empleado->cedula = $request->input('cedula');
        $empleado->email = $request->input('email');
        $empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
        $empleado->sexo = $request->input('sexo');
        $empleado->estado_civil = $request->input('estado_civil');
        $empleado->telefono = $request->input('telefono');
        $empleado->save();

        return redirect('/empleados');
    }

    //Controlador para eliminar empleado
    public function destroy($id){
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
       // Alert::success('Datos eliminados de la base de datos');
        return redirect('empleados');
    }
    
}
