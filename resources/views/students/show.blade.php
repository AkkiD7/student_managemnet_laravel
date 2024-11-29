@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
<h1>Student Details</h1>

<div class="card mb-4">

    <div class="card-body">
        <p><strong>Name:</strong>{{ $student->name }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Date of Birth:</strong> {{ $student->date_of_birth }}</p>
        <p><strong>Phone:</strong> {{ $student->phone }}</p>
        <p><strong>Address:</strong> {{ $student->address }}</p>
    </div>
</div>

<!-- Courses Section -->
<h3>Enrolled Courses</h3>
@if($student->courses->isEmpty())
    <p>No courses enrolled.</p>
@else
    <ul>
        @foreach($student->courses as $course)
            <li>{{ $course->name }} - {{ $course->duration }} weeks</li>
        @endforeach
    </ul>
@endif

<!-- Tasks Section -->
<h3>Assigned Tasks</h3>
@if($student->tasks->isEmpty())
    <p>No tasks assigned.</p>
@else
    <ul>
        @foreach($student->tasks as $task)
            <li>{{ $task->title }} (Due: {{ $task->due_date }}) - Status: {{ $task->status }}</li>
        @endforeach
    </ul>
@endif
@endsection