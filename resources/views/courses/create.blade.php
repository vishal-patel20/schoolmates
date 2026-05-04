@extends('layouts.app')

@section('title', 'Add Course')
@section('page_title', 'Add Course')
@section('breadcrumb', 'Home / Courses / Add')

@section('content')
<div class="page-header">
    <div>
        <h1>Add New Course</h1>
        <p>Fill in the details to create a new course.</p>
    </div>
    <a href="{{ route('courses.index') }}" class="btn btn-outline">← Back to Courses</a>
</div>

<div class="card">
    <div class="card-header"><h2>Course Information</h2></div>
    <div class="card-body">
        <form method="POST" action="{{ route('courses.store') }}">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Course Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Advanced Mathematics" required>
                    @error('name')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="code">Course Code *</label>
                    <input type="text" id="code" name="code" value="{{ old('code') }}" placeholder="e.g. MATH-401" required>
                    @error('code')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="credits">Credits *</label>
                    <input type="number" id="credits" name="credits" value="{{ old('credits', 3) }}" min="1" max="10" required>
                    @error('credits')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="teacher_id">Assigned Teacher</label>
                    <select id="teacher_id" name="teacher_id">
                        <option value="">— No Teacher Assigned —</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->name }} ({{ $teacher->subject }})
                            </option>
                        @endforeach
                    </select>
                    @error('teacher_id')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group full-width">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Short description of the course...">{{ old('description') }}</textarea>
                    @error('description')<span class="form-error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save Course</button>
                <a href="{{ route('courses.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
