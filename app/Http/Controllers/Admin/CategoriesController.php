<?php

namespace App\Http\Controllers\Admin;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Category;
use App\Models\Employee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $employee = Employee::get();
        $department = Department::all();
        $logged_in = Auth::id();
        if (Auth::user()->role_id == 1) {
            $roles = Auth::user()->roles->name;
            $name = $roles;
        }else {
            $employee_name = Employee::where('user_id', $logged_in)->select('name')->get();
            $name = $employee_name[0]->name;
        }
        return view('admin.category.index', compact('category','employee','department', 'name'));

    }
}
