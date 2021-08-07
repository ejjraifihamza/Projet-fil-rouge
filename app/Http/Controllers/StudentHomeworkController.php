<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherHomework;
use App\Models\StudentHomework;
use App\Models\TeacherCorrect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentHomeworkController extends Controller
{
    public function index()
    {
        $data = TeacherHomework::all()->where('class_name_id', '=', Auth::user()->class_name_id)
                                    ->sortByDesc('created_at');
        $homeworks = StudentHomework::all()->where('user_id', '=', Auth::user()->id);
        return view('user.home',[
            'data' => $data,
            'homeworks' => $homeworks
        ]);
    }

    public function profile($id) {
        // dd($id);
        $students = User::find($id);
        // dd($students);
        return view('user.profile', [
            'students' => $students
        ]);
    }

    public function view($id) {
        $data = TeacherHomework::find($id);

        return view('user.viewhomework', compact('data'));
    }

    public function download($file) {

        return response()->download(public_path('assets/'.$file));
    }

    public function viewmyhomework($id) {
        // dd($id);
        $studenthomeworks = StudentHomework::all()->where('teacher_homework_id', '=', $id);
        return view('user.viewmyhomework', [
            'studenthomeworks' => $studenthomeworks
        ]);
    }

    public function viewmyhomeworkcorrect($id) {
        $teachercorrects = TeacherCorrect::all()->where('student_homework_id', '=', $id);
        return view('user.viewmyhomeworkcorrect', [
            'teachercorrects' => $teachercorrects
        ]);
    }

    public function uploadpage($id) {
        $homeworks = TeacherHomework::find($id);
        // dd($homeworks);
        $studenthomeworks = StudentHomework::all();
        return view('user.uploadpage', [
            'homeworks' => $homeworks,
            'studenthomeworks' => $studenthomeworks
        ]);
    }

    public function store(Request $request) {
        $input = $request->all();
        // dd($input);
        if ($image = $request->file('file_path')) {
            $destinationPath = 'studentassets/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file_path'] = "$profileImage";
        }
        // $f = StudentHomework::all();
        // $std = StudentHomework::all()->where(Auth::user()->id, '=', $request->student_id)
        //         ->where($request->teacher_homework_id, '=', $f);
        // dd($std);
        // if ($request->student_id == $std->user_id && 
        //     $request->teacher_homework_id == $std->teacher_homework_id);
        StudentHomework::create([
            'user_id' => $input['student_id'],
            'teacher_homework_id' => $input['teacher_homework_id'],
            'class_name_id' => $input['class_name_id'],
            'subject' => $input['subject'],
            'name' => $input['name'],
            'file_path' => $input["file_path"]
        ]);
        return redirect('/student')->with('success','correct updated successfully');

    }

    public function correctupload() {

        $data = StudentHomework::latest()->paginate(3);

        return view('user.correctupload', [
            'data' => $data
        ]);
    }

    public function downloadCorrection($file) {

        return response()->download(public_path('studentassets/'.$file));
    }

    public function arabic() {
        $homeworks = TeacherHomework::all()->where('subject', '=', 'arab')
                                    ->where('class_name_id', '=', Auth::user()->class_name_id)
                                    ->sortByDesc('created_at');
        // dd($homeworks);
        return view('user.arabic', [
            'homeworks' => $homeworks
        ]);
    }

    public function francais() {
        $homeworks = TeacherHomework::all()->where('subject', '=', 'francais')
                                    ->where('class_name_id', '=', Auth::user()->class_name_id)
                                    ->sortByDesc('created_at');
        return view('user.francais', [
            'homeworks' => $homeworks
        ]);
    }

    public function anglais() {
        $homeworks = TeacherHomework::all()->where('subject', '=', 'anglais')
                                    ->where('class_name_id', '=', Auth::user()->class_name_id)
                                    ->sortByDesc('created_at');
        return view('user.anglais', [
            'homeworks' => $homeworks
        ]);
    }

    public function math() {
        $homeworks = TeacherHomework::all()->where('subject', '=', 'math')
                                    ->where('class_name_id', '=', Auth::user()->class_name_id)
                                    ->sortByDesc('created_at');
        return view('user.math', [
            'homeworks' => $homeworks
        ]);
    }
}
