
@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h1>Student List</h1>

        <div class="mb-3">
            <a href="{{ route('students.create') }}" class="btn btn-primary">Create New</a>
        </div>

        <!-- Search Form -->
        <form action="{{ route('students.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name" value="{{ request()->input('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <!-- Student List -->
        @if ($students->isEmpty())
            <div class="alert alert-info">No students found.</div>
        @else
            <table class="table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Class</th>
                    <th>Roll Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1; 
                @endphp
                @foreach ($students as $student)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>
                        @if ($student->image)
                            <img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->name }}" style="max-width: 100px; max-height: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->roll_number }}</td>
                    <td>
                        <a href="{{ route('students.subjects', $student->id) }}" class="btn btn-primary">View Subjects & Teachers</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            <!-- Pagination Links -->
            {{ $students->links() }}
        @endif
        
    </div>
@endsection
