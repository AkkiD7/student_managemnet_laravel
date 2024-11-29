@extends('layouts.app')

@section('title', 'Course Details')

@section('content')
    <h1>{{ $course->name }}</h1>
    <p><strong>Description:</strong> {{ $course->description }}</p>
    <p><strong>Duration:</strong> {{ $course->duration }} weeks</p>
    <a href="{{ route('courses.edit', $course->id) }}">Edit Course</a>
    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Course</button>
    </form>
@endsection
