@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Course</h1>

        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Course Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $course->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control" required>{{ $course->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration (weeks):</label>
                <input type="number" name="duration" id="duration" class="form-control" value="{{ $course->duration }}" required>
            </div>

            <button type="submit" class="btn btn-warning">Update Course</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary ms-3">Cancel</a>

        </form>
    </div>
@endsection
