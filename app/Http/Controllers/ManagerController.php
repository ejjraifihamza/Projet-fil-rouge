<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guardian;
use App\Models\Teacher;
use App\Models\Manager;
use Illuminate\Support\Facades\Hash;
class ManagerController extends Controller
{
    public function index() {
        return view('manager.home');
    }

    public function addStudent() {
        return view('manager.addstudent');
    }

    public function addGuardian() {
        return view('manager.addguardian');
    }

    public function addTeacher() {
        return view('manager.addteacher');
    }

    public function addManager() {
        return view('manager.addmanager');
    }

    public function uploadStudent(Request $request) {
        $student = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        return redirect()->route('manager.home');
    }

    public function uploadGuardian(Request $request) {
        $guardian = Guardian::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        return redirect()->route('manager.home');
    }

    public function uploadTeacher(Request $request) {
        $teacher = Teacher::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        
        return redirect()->route('manager.home');
    }

    public function uploadManager(Request $request) {
        $manager = Manager::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect()->route('manager.home');
    }
}
