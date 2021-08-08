<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerAuthController extends Controller
{
    public function login()
    {
        return view('manager.login');
    }

    public function handleLogin(Request $req)
    {
        // dd($req);
        if(Auth::guard('webmanager')->attempt($req->only(['email', 'password']))) 
        {
            return redirect()->route('manager.home')->with('success', 'Welcome dear manager');
        }

        return redirect()->back()->with('error', 'Invalid Credentials, please try again');
    }

    public function logout()
    {
        Auth::guard('webmanager')->logout();

        return redirect()->route('manager.login');
    }
}
