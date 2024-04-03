@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h1>Create Student</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('students.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" name="age" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" class="form-control">
            </div>
             <div class="form-group">
                <label for="class">Class:</label>
                <select name="class" class="form-control" required>
                    <option value="">Select Class</option>
                    @php
                    $cls =  [
                        '1st', '2nd', '3rd', '4th', '5th',
                        '6th', '7th', '8th', '9th', '10th',
                    ];
                    @endphp
                    @foreach ($cls as $className)
                        <option value="{{ $className }}">{{ $className }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="subjects" class="form-label">Subjects</label>
                <select multiple class="form-control" id="subjects" name="subjects[]">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="roll_number">Roll Number:</label>
                <input type="text" name="roll_number" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
