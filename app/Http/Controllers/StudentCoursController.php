<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherCours;

class StudentCoursController extends Controller
{
    public function index() {
        $cours = TeacherCours::all();
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
}
