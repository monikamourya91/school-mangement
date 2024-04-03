<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $students = Student::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('students.index', compact('students', 'search'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('students.create',compact( 'subjects'));
    }

    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'image' => 'max:2048',
            'class' => 'required|string|max:255',
            'roll_number' => 'required|string|max:255|unique:students',
            'subjects' => 'required|array',
        ]);

        $student = new Student();
        $student->name = $request->input('name');
        $student->age = $request->input('age');
        $student->class = $request->input('class');
        $student->roll_number = $request->input('roll_number');
        $student->subject_ids = json_encode($request->subjects);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName(); 
            $image->move(storage_path('app/public/images'), $filename);
            $student->image = 'images/' . $filename;
        }
        $student->save();
        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }
    public function wise(Request $request){
        $search = $request->query('search');
        $studentsByClass = Student::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->orderBy('class')->get()->groupBy('class');
        return view('students.classwise', compact('studentsByClass', 'search'));
    }

    public function showSubjects(Student $request, $id)
    {   
        $student = Student::find($id);
        
        if($student->subject_ids){
            $subjectIds = json_decode($student->subject_ids);
            $subjects = Subject::whereIn('id', $subjectIds)->get();

        }   
        return view('students.subjects', compact('student','subjects'));
    }
}
