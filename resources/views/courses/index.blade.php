@extends('layouts.app')

@section('title', 'Courses List')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">All Courses</h1>

    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add New Course</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->duration }} weeks</td>
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if($courses->isEmpty())
        <div class="alert alert-info text-center mt-3">
            No courses found. Add some!
        </div>
    @endif
</div>
@endsection