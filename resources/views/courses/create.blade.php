@extends('layouts.app')

@section('title', 'Create New Course')

@section('content')
    <div class="container">
        <h1 class="mb-4">Create New Course</h1>

        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Course Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration (weeks):</label>
                <input type="number" name="duration" id="duration" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Course</button>
        </form>
    </div>
@endsection
