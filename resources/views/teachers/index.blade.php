@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row d-flex mb-2">
            <div class="col-md-6">
                <h1>Teachers List</h1>
            </div>
            <div class="col-md-6 text-md-end d-flex mb-2 justify-content-end">
                <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Back</a>
            </div>
        </div>
       

        <div class="mb-3">
            <a href="{{ route('teachers.create') }}" class="btn btn-primary">Add Teacher</a>
        </div>

        @if ($teachers->isEmpty())
            <div class="alert alert-info">No teachers found.</div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Age</th>
                        <th>Sex</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->name }}</td>
                            <td>
                                @if ($teacher->image)
                                    <img src="{{ asset('storage/' . $teacher->image) }}" alt="{{ $teacher->name }}" width="50">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $teacher->age }}</td>
                            <td>{{ $teacher->sex }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
