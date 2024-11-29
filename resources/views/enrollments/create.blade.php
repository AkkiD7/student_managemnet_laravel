@extends('layouts.app')

@section('title', 'Create Enrollment')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Create New Enrollment</h1>
    
    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="student_id">Student:</label>
            <select name="student_id" id="student_id" class="form-control" required>
                <option value="">Select Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="course_id">Course:</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="enrollment_date">Enrollment Date:</label>
            <input type="date" name="enrollment_date" id="enrollment_date" class="form-control" value="{{ old('enrollment_date') }}" required>
        </div>

        <div class="form-group text-center mt-4">
            <button type="submit" class="btn btn-primary">Enroll</button>
        </div>
    </form>
</div>
@endsection
