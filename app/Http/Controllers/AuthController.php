<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        if (Auth::user() && Auth::user()->is_admin == 1) {
            return redirect()->route('admin.dashboard');
        } else if (Auth::user() && Auth::user()->is_admin == 0) {
            return redirect()->route('student.dashboard');
        }
        
        return view('layouts.register');
    }

    public function registerSubmit(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|min:3',
            'email' => 'required|email|min:5|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Your Registration Successfull');
    }

    public function login()
    {
        if (Auth::user() && Auth::user()->is_admin == 1) {
            return redirect()->route('admin.dashboard');
        } else if (Auth::user() && Auth::user()->is_admin == 0) {
            return redirect()->route('student.dashboard');
        }

        return view('layouts.login');
    }

    public function loginSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|min:5',
            'password' => 'required|min:6',
        ]);


        $credentials = array(
            'email' => $request->input('email'),
            'password'  => $request->input('password'),
        );

        if (Auth::guard('web')->attempt($credentials)) {

            if (Auth::user()->is_admin == 1) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('student.dashboard');
            }
        } else {
            return back()->with('error', 'Invalid Credentials');
        }

        // $user = User::where('email',$request->email)->where('password', $request->password)->first();
        //     if($user){
        //         Auth::login($user);
        //         if(Auth::user()->is_admin == 1){
        //             return redirect()->route('admin.dashboard');
        //         }else{
        //             return redirect()->route('student.dashboard');
        //         }               
        //     }
        //     else{
        //         return back()->with('error', 'Invalid Credentials');
        //     }

    }

    public function adminDashboard()
    {

        if (Auth::user() && Auth::user()->is_admin == 0) {
            return redirect()->route('student.dashboard');
        }

        return view('admin.dashboard');
    }

    public function studentDashboard()
    {
        if (Auth::user() && Auth::user()->is_admin == 1) {
            return redirect()->route('admin.dashboard');
        }
        
        $data = Exam::with('subject')->orderBy('date')->get();
        return view('student.dashboard', compact('data'));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login')->with('seccess', 'Logout Successfully');
    }
}
