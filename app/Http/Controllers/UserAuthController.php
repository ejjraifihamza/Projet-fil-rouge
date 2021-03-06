<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    // public function index()
    // {
    //     return view('user.home');
    // }

    public function login()
    {
        return view('user.login');
    }

    public function handleLogin(Request $req)
    {
        if(Auth::attempt($req->only(['email', 'password']))) 
        {
            return redirect()->route('user.home')->with('success', 'Welcome dear student');
        }

        return redirect()->back()->with('error', 'Invalid Credentials, please try again');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.login');
    }
}
