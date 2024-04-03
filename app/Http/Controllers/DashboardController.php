<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;


class DashboardController extends Controller
{
   public function index()
    {
        $studentCount = Student::count();
        $teacherCount = Teacher::count();
        $subjectCount = Subject::count();

        return view('dashboard', compact('studentCount', 'teacherCount', 'subjectCount'));
    }
}
