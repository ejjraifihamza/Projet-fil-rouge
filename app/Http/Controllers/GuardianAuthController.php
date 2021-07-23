<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuardianAuthController extends Controller
{
    public function index()
    {
        return view('guardian.home');
    }

    public function login()
    {
        return view('guardian.login');
    }

    public function handleLogin(Request $req)
    {
        if(Auth::guard('webguardian')->attempt($req->only(['email', 'password']))) 
        {
            return redirect()->route('guardian.home');
        }

        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('webguardian')->logout();

        return redirect()->route('guardian.login');
    }
}
