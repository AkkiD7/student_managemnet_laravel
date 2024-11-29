@extends('layouts.app')

@section('title', 'Edit Enrollment')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Edit Enrollment</h1>

    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="student_id">Student:</label>
            <select name="student_id" id="student_id" class="form-control" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $student->id == $enrollment->student_id ? 'selected' : '' }}>{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="course_id">Course:</label>
            <select name="course_id" id="course_id" class="form-control" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $enrollment->course_id ? 'selected' : '' }}>{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-warning">Update Enrollment</button>
            <a href="{{ route('enrollments.index') }}" class="btn btn-secondary ms-3">Cancel</a>
        </div>
    </form>
</div>
@endsection
