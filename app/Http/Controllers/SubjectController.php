<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'languages' => 'nullable|array',
        ]);

        $subject = new Subject();
        $subject->name = $request->input('name');
        $subject->class = $request->input('class');
        $subject->language = json_encode($request->languages); 
        $subject->save();

        return redirect()->route('subjects.index')->with('success', 'Subject added successfully.');
    }

}
