<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Booking;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class BookingController extends Controller
{
    public function index()
    {

        $booking = Booking::get();
        $department = Department::all();
        $logged_in = Auth::id();
        if (Auth::user()->role_id == 1) {
            $roles = Auth::user()->roles->name;
            $name = $roles;
        }else {
            $employee_name = Employee::where('user_id', $logged_in)->select('name')->get();
            $name = $employee_name[0]->name;
        }
        return view('admin.booking', compact('booking','department', 'name'));

    }
}
