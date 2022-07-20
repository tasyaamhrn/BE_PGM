<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Memo;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // $user = User::where('role_id', '2');

        $employee = Employee::get();
        $department = Department::all();
        $category = Category::all();
        $customer = Customer::all();
        $product = Product::all();
        $complaints = Complaint::all();
        $logged_in = Auth::id();
        if (Auth::user()->role_id == 1) {
            $roles = Auth::user()->roles->name;
            $name = $roles;
            $memo = Memo::all();
            $employee = Employee::all();
            $employee_name = Employee::all();

        }else {
            $employee_name = Employee::where('user_id', $logged_in)->select('name')->get();
            $name = $employee_name[0]->name;
            $employee = Employee::where('user_id',auth()->user()->id)->first();
            $memo = Memo::where('employee_id_penerima', $employee->id)->get();
            $employee_name = Employee::all();
            $department = Department::find($employee->dept_id);
            // ngambil kategorinya, mumpung sama2 pake depart_id. Asumsi 1 departemen banyak kategori
            $category = Category::where('dept_id',$employee->dept_id)->get();
            // ngambil komplain berdasarkan id nya categories
            $complaints = Complaint::whereIn('category_id',$category->modelKeys())->get();
        }
        return view('admin.dashboard', compact('product','employee', 'memo','complaints','department', 'name'));

    }
    // public function getMemo(){
    //     $logged_in = Auth::user();

    //     if (Auth::user()->role_id == 1) {
    //         $roles = Auth::user()->roles->name;
    //         $name = $roles;
    //         $memo = Memo::all();
    //         $employee = Employee::all();
    //         $employee_name = Employee::all();

    //     }else {
    //         $employee_name = Employee::where('user_id', $logged_in->id)->select('name','dept_id')->get();
    //         $name = $employee_name[0]->name;
    //         // dd($name);
    //         $employee = Employee::where('user_id',auth()->user()->id)->first();
    //         $memo = Memo::where('employee_id_penerima', $employee->id)->count();
    //         $employee_name = Employee::all();

    //     }
    //     return view('admin.dashboard', compact('employee', ,'memo','department', 'name'));


    // }
}
