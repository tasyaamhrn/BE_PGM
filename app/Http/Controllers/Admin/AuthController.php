<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    public function index()
    {

        return view('admin.form-login');

    }
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Alert::success('Congrats', 'Login Successfully');
            return redirect('/employee')->withSuccess('Login Success');
        }else {
            Alert::error('Error', 'Failed Login,Check your email and password');
            return redirect('/');
            // ->withFail('Login Gagal');

            // alert()->error('Title','Lorem Lorem Lorem');
            // Alert::error('Error Title', 'Error Message');
            // return back()->with('error', 'The error message here!');

            // return redirect("/")->withFail('Error message');
            // return redirect('/')->withError('The error message here!');


        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');

    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required', 'string', 'email', 'max:255',
            'password' => 'required',
        ]);
        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/');
    }

}
