<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    public function get(Request $request, $id){
      return Products::findOrFail($id);
    }
    
    public function list(Request $request){
      return Products::get();
    }
    
    public function create(Request $request){
        
      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
        'price' => 'required |max:8 ',
        'stock' => 'required |max:11 ',
        'shop_id' => 'required |max:20 ',
        'category_id' => 'required |max:20 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
        'price.required' => 'price is a required field.',
        'price.max' => 'price can only be 8 characters.',
        'stock.required' => 'stock is a required field.',
        'stock.max' => 'stock can only be 11 characters.',
        'shop_id.required' => 'shop_id is a required field.',
        'shop_id.max' => 'shop_id can only be 20 characters.',
        'category_id.required' => 'category_id is a required field.',
        'category_id.max' => 'category_id can only be 20 characters.',
      ]);

        $products = Products::create($request->all());    
        return $products;
    }
    
    public function update(Request $request, $id){
      
      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
        'price' => 'required |max:8 ',
        'stock' => 'required |max:11 ',
        'shop_id' => 'required |max:20 ',
        'category_id' => 'required |max:20 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
        'price.required' => 'price is a required field.',
        'price.max' => 'price can only be 8 characters.',
        'stock.required' => 'stock is a required field.',
        'stock.max' => 'stock can only be 11 characters.',
        'shop_id.required' => 'shop_id is a required field.',
        'shop_id.max' => 'shop_id can only be 20 characters.',
        'category_id.required' => 'category_id is a required field.',
        'category_id.max' => 'category_id can only be 20 characters.',
      ]);

        $products = Products::findOrFail($id);
        $input = $request->all();
        $products->fill($input)->save();
        return $products;
    }
    
    public function delete(Request $request, $id){
        $products = Products::findOrFail($id);
        $products->delete();
    }
}
 ?>