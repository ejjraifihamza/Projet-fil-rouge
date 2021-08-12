<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherCorrect;
use App\Models\StudentHomework;
use Illuminate\Support\Facades\Auth;


class TeacherCorrectController extends Controller
{
    public function studenthomework() {
        $studenthomeworks = StudentHomework::all()->where('class_name_id', '=', Auth::user()->class_name_id)
                                                    ->where('subject', '=', Auth::user()->subject);
        return view('teacher.studenthomework', [
            'studenthomeworks' => $studenthomeworks
        ]);
    }

    
    public function viewstudenthomework($id) {
        $studenthomeworks = StudentHomework::find($id);
        return view('teacher.viewstudenthomework', [
            'studenthomeworks' => $studenthomeworks
        ]);
    }
    
    public function downloadstudenthomework($file) {
        return response()->download(public_path('studentassets/'.$file));
    }
    
    public function correctuploadepage($id, $user_id) {
        $studenthomeworks = StudentHomework::find($id);
        $check = TeacherCorrect::all()->where('student_homework_id', '=', $id)
                                        ->where('user_id', '=', $user_id);
        if (($check)->isEmpty()) {
            return view('teacher.correctpage', [
                'studenthomeworks' => $studenthomeworks
            ]);
        }else {
            return view('teacher.error');
        }
    }


    public function uploadteachercorrect(Request $request) {
        TeacherCorrect::create([
            'teacher_id' => $request->input('teacher_id'),
            'user_id' => $request->input('user_id'),
            'student_homework_id' => $request->input('student_homework_id'),
            'note' => $request->input('note'),
            'notice' => $request->input('notice')
        ]);
        return redirect()->route('teacher.student.homework')->with('success', 'Your correct added successfully');
    }

    public function viewassignmenthomeworkcorrect($id) {
        $studenthomeworks = StudentHomework::all()->where('teacher_homework_id', '=', $id);
        return view('teacher.viewallstudenthomework', [
            'studenthomeworks' => $studenthomeworks
        ]);
    }
}
