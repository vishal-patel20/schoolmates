@extends('layouts.app')

@section('title', 'Edit Course')
@section('page_title', 'Edit Course')
@section('breadcrumb', 'Home / Courses / Edit')

@section('content')
<div class="page-header">
    <div>
        <h1>Edit Course</h1>
        <p>Update details for {{ $course->name }}</p>
    </div>
    <a href="{{ route('courses.index') }}" class="btn btn-outline">← Back to Courses</a>
</div>

<div class="card">
    <div class="card-header"><h2>Course Information</h2></div>
    <div class="card-body">
        <form method="POST" action="{{ route('courses.update', $course) }}">
            @csrf @method('PUT')
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Course Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $course->name) }}" required>
                    @error('name')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="code">Course Code *</label>
                    <input type="text" id="code" name="code" value="{{ old('code', $course->code) }}" required>
                    @error('code')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="credits">Credits *</label>
                    <input type="number" id="credits" name="credits" value="{{ old('credits', $course->credits) }}" min="1" max="10" required>
                    @error('credits')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="teacher_id">Assigned Teacher</label>
                    <select id="teacher_id" name="teacher_id">
                        <option value="">— No Teacher Assigned —</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ old('teacher_id', $course->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->name }} ({{ $teacher->subject }})
                            </option>
                        @endforeach
                    </select>
                    @error('teacher_id')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group full-width">
                    <label for="description">Description</label>
                    <textarea id="description" name="description">{{ old('description', $course->description) }}</textarea>
                    @error('description')<span class="form-error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Course</button>
                <a href="{{ route('courses.show', $course) }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
