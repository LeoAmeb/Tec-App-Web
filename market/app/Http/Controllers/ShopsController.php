<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shops;

class ShopsController extends Controller
{
    public function get(Request $request, $id){
      return Shops::select('shops.id','shops.name','shops.description','shops.address','shops.latitude','shops.longitude','shops.active','shops.user_id as user_id','users.name as user')
      ->where('shops.id','=',$id)
      ->join('users','users.id','=','shops.user_id')
      ->firstOrFail();
    }
    
    public function list(Request $request){
      //return Shops::get();
      return Shops::select('shops.id','shops.name','shops.description','shops.address','shops.latitude','shops.longitude','shops.active','shops.user_id','users.name as user')
      ->join('users','users.id','=','shops.user_id')
      ->get();
    }
    
    public function create(Request $request){
        
      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
        'active' => 'required |max:1 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
        'active.required' => 'active is a required field.',
        'active.max' => 'active can only be 1 characters.',
      ]);

        $shops = Shops::create($request->all());    
        return $shops;
    }
    
    public function update(Request $request, $id){
      
      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
        'active' => 'required |max:1 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
        'active.required' => 'active is a required field.',
        'active.max' => 'active can only be 1 characters.',
      ]);

        $shops = Shops::findOrFail($id);
        $input = $request->all();
        $shops->fill($input)->save();
        return $shops;
    }
    
    public function delete(Request $request, $id){
        $shops = Shops::findOrFail($id);
        $shops->delete();
    }
}
 ?>