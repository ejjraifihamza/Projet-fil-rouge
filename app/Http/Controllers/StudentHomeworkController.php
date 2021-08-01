<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherHomework;
use App\Models\StudentHomework;

class StudentHomeworkController extends Controller
{
    public function index()
    {
        $data = TeacherHomework::latest()->paginate(3);
        return view('user.home',[
            'data' => $data
        ]);
    }

    public function view($id) {
        $data = TeacherHomework::find($id);

        return view('user.viewhomework', compact('data'));
    }

    public function download($file) {

        return response()->download(public_path('assets/'.$file));
    }

    public function uploadpage() {
        return view('user.uploadpage');
    }

    public function store(Request $request) {
        $input = $request->all();

        if ($image = $request->file('file_path')) {
            $destinationPath = 'studentassets/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file_path'] = "$profileImage";
        }
        StudentHomework::create([
            'student_id' => $input['student_id'],
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
}
