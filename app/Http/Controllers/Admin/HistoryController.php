<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\history_memo;
use App\Models\Employee;
use App\Models\Memo;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
public function index(){
    $employee = Employee::get();
        $department = Department::all();
        $memo = Memo::all();
        $history = history_memo::all();
        $logged_in = Auth::id();
        if (Auth::user()->role_id == 1) {
            $roles = Auth::user()->roles->name;
            $name = $roles;
        }else {
            $employee_name = Employee::where('user_id', $logged_in)->select('name')->get();
            $name = $employee_name[0]->name;
        }
        return view('admin.history', compact('history','memo','department', 'name'));

}
}
