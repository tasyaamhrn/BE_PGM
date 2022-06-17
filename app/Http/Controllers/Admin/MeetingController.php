<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Meeting;
use App\Models\Employee;

class MeetingController extends Controller
{
    public function index()
    {
        $meeting = Meeting::with('employee')->get();
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
        return view('admin.meeting', compact('meeting','employee','department', 'name'));

    }
}
