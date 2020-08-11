<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function get(Request $request, $id){
      return Users::select('users.id','users.name','users.email','users.password','roles.name AS role')
      ->where('users.id','=',$id)
      ->join('role_user','users.id','=','role_user.user_id')
      ->join('roles','role_user.role_id','=','roles.id')
      ->firstOrFail();

      //return Users::findOrFail($id);
    }

    public function getUserShops(Request $request){
      return Users::select('users.id','users.name')
      ->join('role_user','users.id','=','role_user.user_id')
      ->join('roles','role_user.role_id','=','roles.id')
      ->join('shops','users.id','=','shops.user_id','left outer')
      ->where('roles.name','=','user')
      ->whereNull('shops.user_id')
      ->get();
    }
    
    public function list(Request $request){
      return Users::select('users.id','users.name','users.email','users.password','roles.description AS role')
      ->where('users.id','<>',1)
      ->join('role_user','users.id','=','role_user.user_id')
      ->join('roles','role_user.role_id','=','roles.id')
      ->get();
    }
    
    public function create(Request $request){
        
      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
        'email' => 'required |max:255 ',
        'password' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
        'email.required' => 'email is a required field.',
        'email.max' => 'email can only be 255 characters.',
        'password.required' => 'password is a required field.',
        'password.max' => 'password can only be 255 characters.',
      ]);

      $user = User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
      ]);
      $user->roles()->attach(Role::where('name',$request['role'])->first());
      
      return $user;
    }
    
    public function update(Request $request, $id){
      
      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
        'email' => 'required |max:255 ',
        'password' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
        'email.required' => 'email is a required field.',
        'email.max' => 'email can only be 255 characters.',
        'password.required' => 'password is a required field.',
        'password.max' => 'password can only be 255 characters.',
      ]);

      $users = Users::findOrFail($id);
      $input = $request->all();
      //$users->fill($input)->save();
      $users->name = $request->name;
      $users->email  = $request->email;
      $users->save();
      return $users;
    }
    
    public function delete(Request $request, $id){
        $users = Users::findOrFail($id);
        $users->delete();
    }
}
 ?>