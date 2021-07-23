<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAuthController extends Controller
{
    public function index()
    {
        return view('teacher.home');
    }

    public function login()
    {
        return view('teacher.login');
    }

    public function handleLogin(Request $req)
    {
        if(Auth::guard('webteacher')->attempt($req->only(['email', 'password']))) 
        {
            return redirect()->route('teacher.home');
        }

        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('webteacher')->logout();

        return redirect()->route('teacher.login');
    }
}
