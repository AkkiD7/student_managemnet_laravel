<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalStudents' => Student::count(),
            'totalCourses' => Course::count(),
            'totalTasks' => Task::count(),
            'pendingTasks' => Task::where('status', 'Pending')->count(),
            'completedTasks' => Task::where('status', 'Completed')->count(),
            'recentStudents' => Student::latest()->take(5)->get(),
            'recentTasks' => Task::latest()->take(5)->get(),
        ];
        return view('dashboard', $data);
    }
}
