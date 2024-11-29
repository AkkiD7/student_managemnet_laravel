@extends('layouts.app')

@section('title', 'Enrollments List')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">All Enrollments</h1>

    <a href="{{ route('enrollments.create') }}" class="btn btn-primary mb-3">Add New Enrollment</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Student Name</th>
                <th>Course Name</th>
                <th>Enrollment Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->student->name }}</td>
                    <td>{{ $enrollment->course->name }}</td>
                    <td>{{ $enrollment->enrollment_date }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($enrollments->isEmpty())
        <div class="alert alert-info text-center mt-3">
            No enrollments found. Add some!
        </div>
    @endif
</div>
@endsection