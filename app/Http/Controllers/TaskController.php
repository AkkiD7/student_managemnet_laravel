<?php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('status') && in_array($request->status, ['Pending', 'Completed'])) {
            $query->where('status', $request->status);
        }

        $tasks = $query->with(['student', 'teacher'])->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        return view('tasks.create', compact('students', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'teacher_id' => 'required|exists:teachers,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date|after:today',
            'status' => 'required|in:Pending,Completed',
        ]);

        Task::create([
            'student_id' => $request->student_id,
            'teacher_id' => $request->teacher_id,
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function edit(Task $task)
    {
        $students = Student::all();
        $teachers = Teacher::all();
        return view('tasks.edit', compact('task', 'students', 'teachers'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'teacher_id' => 'required|exists:teachers,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date|after:today',
            'status' => 'required|in:Pending,Completed',
        ]);

        $task->update([
            'student_id' => $request->student_id,
            'teacher_id' => $request->teacher_id,
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    public function toggleCompletion(Task $task)
    {
        $task->status = ($task->status === 'Completed') ? 'Pending' : 'Completed';
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully!');
    }
}
