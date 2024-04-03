<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">School Management</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Students</h5>
                        <p class="card-text">{{ $studentCount }} Students</p>
                        <a href="{{ route('students.index') }}" class="btn btn-primary">View Students</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Student Class wise</h5>
                        <p class="card-text">{{ $studentCount }} Students</p>
                        <a href="{{ route('students.wise') }}" class="btn btn-primary">View Students</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Teachers</h5>
                        <p class="card-text">{{ $teacherCount }} Teachers</p>
                        <a href="{{ route('teachers.index') }}" class="btn btn-primary">View Teachers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Subjects</h5>
                        <p class="card-text">{{ $subjectCount }} Subjects</p>
                        <a href="{{ route('subjects.index') }}" class="btn btn-primary">View Subjects</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
