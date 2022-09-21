<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show Login Form
    public function login()
    {
        if(auth()->user()) {
            return redirect('/admin/category');
        }
        return view('auth.login');
    }

    // Logged User In
    public function authenticate(Request $request)
    {
        $credential = $request->only('email', 'password');
        
        if(Auth::attempt($credential)) {
            if(auth()->user()->is_admin == 'yes') {
                return redirect('/admin/category')->with('message', 'You are now logged in');
            }
            return redirect()->back()->with('message', 'Wrong credential');
        }

        return redirect()->back()->with('message', 'Wrong credential');
    }

    // Logged User Out
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login')->with('message', 'You are now logged out');
    }
}
