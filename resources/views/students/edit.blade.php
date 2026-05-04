@extends('layouts.app')

@section('title', 'Edit Student')
@section('page_title', 'Edit Student')
@section('breadcrumb', 'Home / Students / Edit')

@section('content')
<div class="page-header">
    <div>
        <h1>Edit Student</h1>
        <p>Update details for {{ $student->name }}</p>
    </div>
    <a href="{{ route('students.index') }}" class="btn btn-outline">← Back to Students</a>
</div>

<div class="card">
    <div class="card-header"><h2>Student Information</h2></div>
    <div class="card-body">
        <form method="POST" action="{{ route('students.update', $student) }}">
            @csrf @method('PUT')
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}" required>
                    @error('name')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                    @error('email')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $student->phone) }}">
                    @error('phone')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="gender">Gender *</label>
                    <select id="gender" name="gender" required>
                        <option value="Male"   {{ old('gender', $student->gender) === 'Male'   ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $student->gender) === 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other"  {{ old('gender', $student->gender) === 'Other'  ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth?->format('Y-m-d')) }}">
                    @error('date_of_birth')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="class">Class / Grade</label>
                    <input type="text" id="class" name="class" value="{{ old('class', $student->class) }}">
                    @error('class')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="enrollment_date">Enrollment Date</label>
                    <input type="date" id="enrollment_date" name="enrollment_date" value="{{ old('enrollment_date', $student->enrollment_date?->format('Y-m-d')) }}">
                    @error('enrollment_date')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group full-width">
                    <label for="address">Address</label>
                    <textarea id="address" name="address">{{ old('address', $student->address) }}</textarea>
                    @error('address')<span class="form-error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Student</button>
                <a href="{{ route('students.show', $student) }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
