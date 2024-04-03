@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h1>Subjects of {{ $student->name }}</h1>
        @foreach ($subjects as $subject)
            <div class="card-body">
                <p class="card-title">{{ $subject->name }}</p>
            </div>
        @endforeach
    </div>
@endsection
