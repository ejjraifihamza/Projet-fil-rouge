<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guardian;
use App\Models\Teacher;
use App\Models\Manager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class ManagerController extends Controller
{
    public function index() {
        return view('manager.home');
    }

    public function addStudent() {
        return view('manager.addstudent');
    }

    public function addGuardian() {
        $students = User::all();
        return view('manager.addguardian', [
            'students' => $students
        ]);
    }

    public function addTeacher() {
        return view('manager.addteacher');
    }

    public function addManager() {
        return view('manager.addmanager');
    }

    public function uploadStudent(Request $request) {
        // dd($request);
        $student = User::create([
            'class_name_id' => $request->input('class_name_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->route('manager.home');
    }

    public function uploadGuardian(Request $request) {
        // dd($request);
        $guardian = Guardian::create([
            'user_id' => $request->input('user_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        return redirect()->route('manager.home');
    }

    public function uploadTeacher(Request $request) {
        // dd($request);
        $teacher = Teacher::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'class_name_id' => $request->input('class_name_id'),
            'subject' => $request->input('subject'),
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

    public function profile() {
        $managers = Manager::all()->where('id', '=', Auth::user()->id);
        return view('manager.profile', [
            'managers' => $managers
        ]);
    }
}
