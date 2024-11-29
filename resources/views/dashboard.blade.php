@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4 text-center">Admin Dashboard</h1>

    <!-- Cards Section -->
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-primary">
                <div class="card-header bg-primary text-white">
                    <h5>Total Students</h5>
                </div>
                <div class="card-body">
                    <h2 class="display-4 text-primary">{{ $totalStudents }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-success">
                <div class="card-header bg-success text-white">
                    <h5>Total Courses</h5>
                </div>
                <div class="card-body">
                    <h2 class="display-4 text-success">{{ $totalCourses }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-warning">
                <div class="card-header bg-warning text-white">
                    <h5>Total Tasks(Pending/Completed)</h5>
                </div>
                <div class="card-body">
                    <h2 class="display-4 text-warning">{{ $pendingTasks }}/{{ $completedTasks }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
<div class="card shadow-sm mt-5">
    <div class="card-header bg-dark text-white">
        <h5>Recent Activity</h5>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Most Recent Student:</strong>
                @if ($recentStudents->isNotEmpty())
                    <span class="text-secondary">{{ $recentStudents->first()->name }}</span>
                @else
                    <span class="text-secondary">None</span>
                @endif
            </li>
            <li class="list-group-item">
                <strong>Most Recent Task:</strong>
                @if ($recentTasks->isNotEmpty())
                    <span class="text-secondary">{{ $recentTasks->first()->title }}</span>
                @else
                    <span class="text-secondary">None</span>
                @endif
            </li>
        </ul>
    </div>
</div>
@endsection