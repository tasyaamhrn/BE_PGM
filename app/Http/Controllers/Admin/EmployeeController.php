<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function register(Request $request){

        $request->validate([
           'email' => 'required|email|max:191|unique:users,email',
           'password' => 'required|string',
           'name' => 'required|string',
           'address' => 'required|string',
           'phone' => 'required|string',
           'dept_id' => 'required|integer',
       ]);
       if($request->avatar){
           $avatar=$request->file('avatar');
           $avatarName=$avatar->getClientOriginalName();
           $getExt=$avatar->getClientOriginalExtension();
           $fileName="AVA".date('YdmYdmYhis').".".$getExt;
           $avatar->move('avatar/',$fileName);
           $file="avatar/".$fileName;
       }else{
           $file=null;
       }

       $user = User::create([
           'email' =>$request['email'],
           'password' => Hash::make($request['password']),
           'role' => "EMPLOYEE",

       ]);
       $select_user = User::where('email',$request['email'])->first();

       $employee = Employee::create([
           'name' => $request['name'],
           'avatar'=>$file,
           'address' => $request['address'],
           'phone' => $request['phone'],
           'dept_id' => $request['dept_id'],
           'user_id' => $select_user->id
       ]);
       if($employee){
           return response()->json(['success'=>1,'message'=>'Register Berhasil']);
       }
   }
}
