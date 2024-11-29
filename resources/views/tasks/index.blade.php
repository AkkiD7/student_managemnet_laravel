@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">All Tasks</h1>

    <!-- Filter Section -->
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <!-- Create New Task Button -->
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>

        <!-- Filter Dropdown -->
        <form action="{{ route('tasks.index') }}" method="GET" class="d-flex">
            <div class="form-group">
                <!-- Bootstrap Form Control Class for Dropdown -->
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">All Tasks</option>
                    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
        </form>

    </div>

    <!-- Tasks Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Student</th>
                    <th>Teacher</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->student->name }}</td>
                        <td>{{ $task->teacher->name }}</td>
                        <td>
                            <span class="badge {{ $task->status == 'Completed' ? 'bg-success' : 'bg-warning' }}">
                                {{ $task->status }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</td>
                        <td>
                            <!-- Toggle Status Button -->
                            <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-info">
                                    Mark as {{ $task->status == 'Completed' ? 'Pending' : 'Completed' }}
                                </button>
                            </form>

                            <!-- Edit Button -->
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Delete Button -->
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($tasks->isEmpty())
            <div class="alert alert-info text-center mt-3">
                No tasks found. Add some!
            </div>
        @endif
    </div>
</div>
@endsection