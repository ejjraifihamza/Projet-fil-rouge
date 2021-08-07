<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherCorrect;
use App\Models\Guardian;
use Illuminate\Support\Facades\Auth;

class GuardianAuthController extends Controller
{
    public function index()
    {
        $teachercorrects = TeacherCorrect::all()->where('user_id', '=', Auth::user()->user_id);
        return view('guardian.home', [
            'teachercorrects' => $teachercorrects
        ]);
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

    public function profile() {
        $guardians = Guardian::all()->where('id', '=', Auth::user()->id);
        // dd($guardian);
        return view('guardian.profile', [
            'guardians' => $guardians
        ]);
    }
}
