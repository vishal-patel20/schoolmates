@extends('layouts.app')

@section('title', 'Add Student')
@section('page_title', 'Add Student')
@section('breadcrumb', 'Home / Students / Add')

@section('content')
<div class="page-header">
    <div>
        <h1>Add New Student</h1>
        <p>Fill in the details to enroll a new student.</p>
    </div>
    <a href="{{ route('students.index') }}" class="btn btn-outline">← Back to Students</a>
</div>

<div class="card">
    <div class="card-header"><h2>Student Information</h2></div>
    <div class="card-body">
        <form method="POST" action="{{ route('students.store') }}">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. John Doe" required>
                    @error('name')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="e.g. john@email.com" required>
                    @error('email')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="e.g. +91 99999 00000">
                    @error('phone')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="gender">Gender *</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male"   {{ old('gender') === 'Male'   ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other"  {{ old('gender') === 'Other'  ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                    @error('date_of_birth')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="class">Class / Grade</label>
                    <input type="text" id="class" name="class" value="{{ old('class') }}" placeholder="e.g. Class 10-A">
                    @error('class')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="enrollment_date">Enrollment Date</label>
                    <input type="date" id="enrollment_date" name="enrollment_date" value="{{ old('enrollment_date', date('Y-m-d')) }}">
                    @error('enrollment_date')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group full-width">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" placeholder="Full residential address...">{{ old('address') }}</textarea>
                    @error('address')<span class="form-error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save Student</button>
                <a href="{{ route('students.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
