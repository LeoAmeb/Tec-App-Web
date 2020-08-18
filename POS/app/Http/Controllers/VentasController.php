<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;

class VentasController extends Controller
{
    public function get(Request $request, $id){
      return Ventas::findOrFail($id);
    }
    
    public function list(Request $request){
      return Ventas::get();
    }
    
    public function create(Request $request){
        
      $validatedData = $request->validate([
        'folio' => 'required |max:255 ',
        'cantidadTotal' => 'required |max:11 ',
        'total' => 'required ',
      ],[
        'folio.required' => 'folio is a required field.',
        'folio.max' => 'folio can only be 255 characters.',
        'cantidadTotal.required' => 'cantidadTotal is a required field.',
        'cantidadTotal.max' => 'cantidadTotal can only be 11 characters.',
        'total.required' => 'total is a required field.',
      ]);

        $ventas = Ventas::create($request->all());    
        return $ventas;
    }
    
    public function update(Request $request, $id){
      
      $validatedData = $request->validate([
        'folio' => 'required |max:255 ',
        'cantidadTotal' => 'required |max:11 ',
        'total' => 'required ',
      ],[
        'folio.required' => 'folio is a required field.',
        'folio.max' => 'folio can only be 255 characters.',
        'cantidadTotal.required' => 'cantidadTotal is a required field.',
        'cantidadTotal.max' => 'cantidadTotal can only be 11 characters.',
        'total.required' => 'total is a required field.',
      ]);

        $ventas = Ventas::findOrFail($id);
        $input = $request->all();
        $ventas->fill($input)->save();
        return $ventas;
    }
    
    public function delete(Request $request, $id){
        $ventas = Ventas::findOrFail($id);
        $ventas->delete();
    }
}
 ?>