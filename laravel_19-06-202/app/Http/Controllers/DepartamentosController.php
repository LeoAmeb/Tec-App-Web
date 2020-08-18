<?php

namespace App\Http\Controllers;

use App\Departamentos;
use Illuminate\Http\Request;
use DB;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //Obtener todos los departamentos de la tabla de la bd
        $departamentos=Departamentos::all();
        //Mostrar vista de la consulta de departamentos
        return view('departamentos.admin_departamentos', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('departamentos.alta_departamentos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //retirar los datos del request
        $datosDepartamento = request()->except('departamento');

        //Insertar en la tabla departamentos los datos para la creacion de un nuevo registro
        $id = DB::table('departamentos')->insertGetId($datosDepartamento);

        //Alert::success('Datos guardados con exito');
        return redirect('departamentos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function show(Departamentos $departamentos)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //Editar departamento y mandar a la vista la informacion
        $departamentos = Departamentos::findOrFail($id);

        //Mostrar la vista
        return view('departamentos.editar_departamentos',compact('departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $departamento = Departamentos::findOrFail($id);
        //Guardando los nuevos valores del departamento
        $departamento->nombre = $request->input('nombre');
        
        $departamento->save();

        return redirect('/departamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $departamento = Departamentos::findOrFail($id);
        $departamento->delete();
       // Alert::success('Datos eliminados de la base de datos');
        return redirect('departamentos');
    }
}
