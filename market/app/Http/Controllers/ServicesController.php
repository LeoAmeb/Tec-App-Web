<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;

class ServicesController extends Controller
{
    public function get(Request $request, $id){
      return Services::findOrFail($id);
    }
    
    public function list(Request $request){
      return Services::get();
    }
    
    public function create(Request $request){
        
      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
        'price' => 'required |max:8 ',
        'active' => 'required |max:1 ',
        'shop_id' => 'required |max:20 ',
        'category_id' => 'required |max:20 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
        'price.required' => 'price is a required field.',
        'price.max' => 'price can only be 8 characters.',
        'active.required' => 'active is a required field.',
        'active.max' => 'active can only be 1 characters.',
        'shop_id.required' => 'shop_id is a required field.',
        'shop_id.max' => 'shop_id can only be 20 characters.',
        'category_id.required' => 'category_id is a required field.',
        'category_id.max' => 'category_id can only be 20 characters.',
      ]);

        $services = Services::create($request->all());    
        return $services;
    }
    
    public function update(Request $request, $id){
      
      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
        'price' => 'required |max:8 ',
        'active' => 'required |max:1 ',
        'shop_id' => 'required |max:20 ',
        'category_id' => 'required |max:20 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
        'price.required' => 'price is a required field.',
        'price.max' => 'price can only be 8 characters.',
        'active.required' => 'active is a required field.',
        'active.max' => 'active can only be 1 characters.',
        'shop_id.required' => 'shop_id is a required field.',
        'shop_id.max' => 'shop_id can only be 20 characters.',
        'category_id.required' => 'category_id is a required field.',
        'category_id.max' => 'category_id can only be 20 characters.',
      ]);

        $services = Services::findOrFail($id);
        $input = $request->all();
        $services->fill($input)->save();
        return $services;
    }
    
    public function delete(Request $request, $id){
        $services = Services::findOrFail($id);
        $services->delete();
    }
}
 ?>