@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Add Subject</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
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
                <label for="languages" class="form-label">Languages</label>
                 <select multiple class="form-control" id="languages" name="languages[]">
                    <option value="English">English</option>
                    <option value="Spanish">Spanish</option>
                    <option value="French">French</option>
                    <option value="French">Hindi</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
