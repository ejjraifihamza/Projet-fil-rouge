<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherHomework;

class TeacherAuthController extends Controller
{
    // public function index()
    // {
    //     $data = TeacherHomework::latest()->paginate(3);
    //     return view('teacher.home', [
    //         'data' => $data
    //     ]);
    // }

    public function login()
    {
        return view('teacher.login');
    }

    public function handleLogin(Request $req)
    {
        if(Auth::guard('webteacher')->attempt($req->only(['email', 'password']))) 
        {
            return redirect()->route('teacher.home')->with('success', 'Welcome dear teacher');
        }

        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('webteacher')->logout();

        return redirect()->route('teacher.login');
    }
}
