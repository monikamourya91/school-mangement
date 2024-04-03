
@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 d-flex mb-2">
               <h1>Subject List</h1>
            </div>
            <div class="col-md-6 text-md-end d-flex mb-2 justify-content-end">
                <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Back</a>
            </div>
        </div>
        <div class="mb-3">
            <a href="{{ route('subjects.create') }}" class="btn btn-primary">Add Subject</a>
        </div>

        @if ($subjects->isEmpty())
            <div class="alert alert-info">No subjects found.</div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Class</th>
                        <th>languages</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->class }}</td>
                            <td>
                                @foreach (json_decode($subject->language) as $lang)
                                    {{ $lang }}<br>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
