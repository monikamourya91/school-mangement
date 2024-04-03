@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row d-flex mb-2 ">
            <div class="col-md-6">
               <h1>Student List</h1>
            </div>
            <div class="col-md-6 text-md-end d-flex mb-2 justify-content-end">
                <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Back</a>
            </div>
        </div>

        <!-- Search Form -->
        <form action="{{ route('students.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name" value="{{ $search }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- Students List by Class -->
        @forelse ($studentsByClass as $class => $students)
            <h3>{{ $class }}</h3>
            <ul class="list-group mb-4">
                @foreach ($students as $student)
                    <li class="list-group-item">{{ $student->name }}</li>
                @endforeach
            </ul>
        @empty
            <div class="alert alert-info">No students found.</div>
        @endforelse
    </div>
@endsection