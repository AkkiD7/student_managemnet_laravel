<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            display: flex;
            flex-direction: column;
        }

        .sidebar a {
            color: white;
            padding: 15px;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .sidebar .active {
            background-color: #007bff;
            color: white;
        }

        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .role-info {
            margin-top: auto;
            padding: 10px;
            background-color: #495057;
            text-align: center;
            color: white;
        }

        .role-info p {
            margin: 0;
        }

        .logout-btn {
            background: none;
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            text-decoration: underline;
        }

        .logout-btn:hover {
            background-color: #6c757d;
        }
    </style>
</head>

<body>
    
    <div class="sidebar">
        <h5 class="text-center mt-3">Student Management System</h5>
        <a href="{{ url('/dashboard') }}" class="{{ Request::is('/dashboard') ? 'active' : '' }}">Home</a>
        <a href="{{ route('students.index') }}" class="{{ Request::is('students*') ? 'active' : '' }}">Students</a>
        <a href="{{ route('courses.index') }}" class="{{ Request::is('courses*') ? 'active' : '' }}">Courses</a>
        @if(Auth::check() && Auth::user()->role == 'teacher')
            <a href="{{ route('tasks.index') }}" class="{{ Request::is('tasks*') ? 'active' : '' }}">Tasks</a>
        @endif
        <a href="{{ route('enrollments.index') }}" class="{{ Request::is('enrollments*') ? 'active' : '' }}">Enrollments</a>

        <!-- Role and Logout Section -->
        <div class="role-info">
            @if(Auth::check())
                <p><strong>{{ ucfirst(Auth::user()->role) }}</strong></p>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            @endif
        </div>
    </div>

    <div class="content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
