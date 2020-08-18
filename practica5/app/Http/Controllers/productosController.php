<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productos;

class productosController extends Controller{
    //Se obtienen los datos de los productos
    public function index(){
        $data = productos::all();
        return $data;
    }

    public function create()
    {
        
    }

    //Se envian datos a la base de datos
    public function store(Request $request)
    {
        $producto = new productos();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->estado = "activo";
        $producto->save();
           
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
