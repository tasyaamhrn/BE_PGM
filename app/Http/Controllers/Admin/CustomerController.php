<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        // $user = User::where('role_id', '2');

        $customer = Customer::get();
        $department = Department::all();
        $logged_in = Auth::id();
        if (Auth::user()->role_id == 1) {
            $roles = Auth::user()->roles->name;
            $name = $roles;
        }else {
            $employee_name = Employee::where('user_id', $logged_in)->select('name')->get();
            $name = $employee_name[0]->name;
        }
        return view('admin.customer', compact('customer', 'department', 'name'));

    }
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'nik' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],

        ];
        $avatar = null;

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $register = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 3
        ]);
        if ($request->avatar){
            $file =$request->file('avatar');
            $ext=$file->getClientOriginalExtension();
            $name='avatar/'.date('dmYhis').".".$ext;
            $file->move('avatar/',$name);
            $customer = Customer::create([
                'nik' => $request->nik,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'dept_id' => $request->dept_id,
                'user_id' => $register->id,
                'avatar' => $name,

            ]);
            // $employee->avatar=$name;
        }
        else{$customer = Customer::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'dept_id' => $request->dept_id,
            'user_id' => $register->id,
            // 'avatar' => $avatar,
        ]);}
        return redirect('/customer');
    }
}
