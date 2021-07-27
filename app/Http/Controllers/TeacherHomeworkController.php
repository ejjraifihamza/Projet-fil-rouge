<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherHomework;

class TeacherHomeworkController extends Controller
{
    public function index()
    {
        $data = TeacherHomework::latest()->paginate(3);
        return view('teacher.home', [
            'data' => $data
        ]);
    }
    
    public function uploadpage() {
        return view('teacher.uploadpage');
    }

    public function store(Request $request) {
        $input = $request->all();

        if ($image = $request->file('file_path')) {
            $destinationPath = 'assets/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file_path'] = "$profileImage";
        }
        TeacherHomework::create([
            'name' => $input['name'],
            'description' => $input['description'],
            'deadline' => $input['deadline'],
            'file_path' => $input["file_path"]
        ]);
        return redirect('/teacher')->with('success','Product updated successfully');

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
            return redirect()->route('teacher.home')->with('success','Product updated successfully');
        // return false;
    }

    public function destroy($id)
    {
        $teacherHomework = TeacherHomework::find($id);

        $teacherHomework->delete();

        return redirect('/teacher');
    }
}
