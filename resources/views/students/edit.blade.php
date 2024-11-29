@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Student</h1>

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <!-- Name Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $student->name }}" required>
                    </div>
                </div>

                <!-- Email Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $student->email }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Date of Birth Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ $student->date_of_birth }}" required>
                    </div>
                </div>

                <!-- Phone Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $student->phone }}" required>
                    </div>
                </div>
            </div>

            <!-- Address Field -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" class="form-control" id="address" rows="4" required>{{ $student->address }}</textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary ms-3">Cancel</a>
        </form>
    </div>
@endsection
