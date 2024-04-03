<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('teachers.create',compact( 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'max:2048',
            'age' => 'required|integer|min:18|max:99',
            'sex' => 'required|in:male,female',
            'subjects' => 'required|array',
        ]);

        $teacher = new Teacher();
        $teacher->name = $request->input('name');
        $teacher->age = $request->input('age');
        $teacher->sex = $request->input('sex');
        $teacher->subject_ids = json_encode($request->subjects);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName(); 
            $image->move(storage_path('app/public/teachers'), $filename);
            $teacher->image = 'teachers/' . $filename;
        }

        $teacher->save(); 
        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
    }
}
