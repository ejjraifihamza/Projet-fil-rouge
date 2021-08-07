<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherCours;
use Illuminate\Support\Facades\Auth;

class StudentCoursController extends Controller
{
    public function index() {
        $cours = TeacherCours::all()->where('class_name_id', '=', Auth::user()->class_name_id)
                                    ->sortByDesc('created_at');
        return view('user.cours.home', [
            'cours' => $cours
        ]);
    }

    public function view($id) {
        $cours = TeacherCours::find($id);
        return view('user.cours.viewcours', [
            'cours' => $cours
        ]);
    }

    public function download($file) {
        return response()->download(public_path('coursassets/'.$file));
    }

    public function arabic() {
        $courses = TeacherCours::all()->where('subject', '=', 'arab')
                                    ->where('class_name_id', '=', Auth::user()->class_name_id)
                                    ->sortByDesc('created_at');
        // dd($courses);
        return view('user.cours.arabic', [
            'courses' => $courses
        ]);
    }

    public function francais() {
        $courses = TeacherCours::all()->where('subject', '=', 'francais')
                                    ->where('class_name_id', '=', Auth::user()->class_name_id)
                                    ->sortByDesc('created_at');
        return view('user.cours.francais', [
            'courses' => $courses
        ]);
    }

    public function anglais() {
        $courses = TeacherCours::all()->where('subject', '=', 'anglais')
                                    ->where('class_name_id', '=', Auth::user()->class_name_id)
                                    ->sortByDesc('created_at');
        return view('user.cours.anglais', [
            'courses' => $courses
        ]);
    }

    public function math() {
        $courses = TeacherCours::all()->where('subject', '=', 'math')
                                    ->where('class_name_id', '=', Auth::user()->class_name_id)
                                    ->sortByDesc('created_at');
        return view('user.cours.math', [
            'courses' => $courses
        ]);
    }
}
