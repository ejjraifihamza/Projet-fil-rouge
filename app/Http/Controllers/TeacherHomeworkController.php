<?php

namespace App\Http\Controllers;

use App\Models\StudentHomework;
use Illuminate\Http\Request;
use App\Models\TeacherHomework;
use App\Models\Teacher;
use App\Models\TeacherCorrect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeacherHomeworkController extends Controller
{
    public function index()
    {
        $data = TeacherHomework::all()->where('subject', '=', Auth::user()->subject)
                                        ->where('teacher_id', '=', Auth::user()->id);
        return view('teacher.home', [
            'data' => $data
        ]);
    }

    public function profile($id) {
        // dd($id);
        $teacher = Teacher::find($id);
        return view('teacher.profile', [
            'teacher' => $teacher
        ]);
    }

    public function studentspage() {
        $students = User::all()->where('class_name_id', '=', Auth::user()->class_name_id);
        return view('teacher.allstudent', [
            'students' => $students
        ]);
    }
    
    public function uploadpage() {
        return view('teacher.uploadpage');
    }

    public function store(Request $request) {
        $input = $request->all();
        // dd($input);
        if ($image = $request->file('file_path')) {
            $destinationPath = 'assets/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file_path'] = "$profileImage";
        }
        TeacherHomework::create([
            'class_name_id' => $input['class_name_id'],
            'teacher_id' => $input['teacher_id'],
            'subject' => $input['subject'],
            'name' => $input['name'],
            'description' => $input['description'],
            'deadline' => $input['deadline'],
            'file_path' => $input["file_path"]
        ]);
        return redirect('/teacher')->with('success','Homework Added successfully');

    }

    public function edit($id)
    {
        $data = TeacherHomework::find($id);
        
        return view('/teacher/edit')->with('cours', $data);
    }

    public function update(Request $request, TeacherHomework $teacherHomework)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'detail' => 'required'
        // ]);
  
        $input = $request->all();
  
        $image = $request->file()['path_file'];
        $destinationPath = 'assets/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        if($image->move($destinationPath, $profileImage)){
            $input['file_path'] = "$profileImage";
        }else{
            unset($input['file_path']);
            // dd("sqdsqf");
        }
        //dd($request);
        $teacherHomework::where('id',$request->input('id'))->update([
            // 'teacher_id' => Auth::user()->id,
            'name' => $input['name'],
            'description' => $input['description'],
            'deadline' => $input['deadline'],
            'file_path' => $input["file_path"]
        ]);
        if($teacherHomework)
            return redirect()->route('teacher.home')->with('success','Homework updated successfully');
        // return false;
    }

}
