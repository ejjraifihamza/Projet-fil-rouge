<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\TeacherCours;
use Illuminate\Support\Facades\Auth;

class TeacherCoursController extends Controller
{
    public function index() {
        $cours = TeacherCours::all()->where('subject', '=', Auth::user()->subject)
                                    ->where('teacher_id', '=', Auth::user()->id)
                                    ->sortByDesc('created_at');
        return view('teacher.cours.home', [
            'cours' => $cours
        ]);
    }

    public function uploadpage() {
        return view('teacher.cours.uploadpage');
    }

    public function store(Request $request) {
        $input = $request->all();

        if ($image = $request->file('file_path')) {
            $destinationPath = 'coursassets/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file_path'] = $profileImage;
        }

        TeacherCours::create([
            'teacher_id' => $input['teacher_id'],
            'class_name_id' => $input['class_name_id'],
            'subject' => $input['subject'],
            'name' => $input['name'],
            'description' => $input['description'],
            'file_path' => $input['file_path']
        ]);

        return redirect()->route('teacher.cours')->with('success', 'Cours added successfully');

    }

    public function edit($id) {
        $cours = TeacherCours::find($id);
        return view('teacher.cours.edit', [
            'cours' => $cours
        ]);
    }

    public function update(Request $request, TeacherCours $teacherCours) {
        $input = $request->all();
        // dd($input);
        $image = $request->file('file_path');
        $destinationPath = 'coursassets/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        if($image->move($destinationPath, $profileImage)){
            $input['file_path'] = "$profileImage";
        }else{
            unset($input['file_path']);
            // dd("sqdsqf");
        }
        $teacherCours::where('id', $request->input('id'))->update([
            // 'teacher_id' => $input['teacher_id'],
            'name' => $input['name'],
            'description' => $input['description'],
            'file_path' => $input['file_path']
        ]);
        if($teacherCours)
        return redirect()->route('teacher.cours')->with('success', 'Cours updated successfully');
    }

    public function destroy($id) {
        $teacherCours = TeacherCours::find($id);
        $teacherCours->delete();
        return redirect()->route('teacher.cours');
    }
}
