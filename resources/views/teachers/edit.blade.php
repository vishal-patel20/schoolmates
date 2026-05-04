@extends('layouts.app')

@section('title', 'Edit Teacher')
@section('page_title', 'Edit Teacher')
@section('breadcrumb', 'Home / Teachers / Edit')

@section('content')
<div class="page-header">
    <div>
        <h1>Edit Teacher</h1>
        <p>Update details for {{ $teacher->name }}</p>
    </div>
    <a href="{{ route('teachers.index') }}" class="btn btn-outline">← Back to Teachers</a>
</div>

<div class="card">
    <div class="card-header"><h2>Teacher Information</h2></div>
    <div class="card-body">
        <form method="POST" action="{{ route('teachers.update', $teacher) }}">
            @csrf @method('PUT')
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $teacher->name) }}" required>
                    @error('name')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $teacher->email) }}" required>
                    @error('email')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $teacher->phone) }}">
                    @error('phone')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="subject">Subject *</label>
                    <input type="text" id="subject" name="subject" value="{{ old('subject', $teacher->subject) }}" required>
                    @error('subject')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="qualification">Qualification</label>
                    <input type="text" id="qualification" name="qualification" value="{{ old('qualification', $teacher->qualification) }}">
                    @error('qualification')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="joining_date">Joining Date</label>
                    <input type="date" id="joining_date" name="joining_date" value="{{ old('joining_date', $teacher->joining_date?->format('Y-m-d')) }}">
                    @error('joining_date')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="salary">Monthly Salary (₹)</label>
                    <input type="number" id="salary" name="salary" value="{{ old('salary', $teacher->salary) }}" min="0" step="0.01">
                    @error('salary')<span class="form-error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Teacher</button>
                <a href="{{ route('teachers.show', $teacher) }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
