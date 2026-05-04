@extends('layouts.app')

@section('title', $course->name)
@section('page_title', 'Course Details')
@section('breadcrumb', 'Home / Courses / ' . $course->name)

@section('content')
<div class="page-header">
    <div>
        <h1>Course Details</h1>
        <p>Viewing details for {{ $course->name }}</p>
    </div>
    <div style="display:flex;gap:10px;">
        <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('courses.index') }}" class="btn btn-outline">← Back</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div style="display:flex;align-items:center;gap:14px;">
            <div class="avatar" style="width:48px;height:48px;font-size:1.4rem;background:#fef3c7;color:#92400e;">C</div>
            <div>
                <h2>{{ $course->name }}</h2>
                <span class="td-muted">Code: {{ $course->code }}</span>
            </div>
        </div>
        <span class="badge badge-success">{{ $course->credits }} Credits</span>
    </div>
    <div class="card-body">
        <div class="detail-grid">
            <div class="detail-item">
                <span class="detail-label">Course Code</span>
                <span class="detail-value">{{ $course->code }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Credits</span>
                <span class="detail-value">{{ $course->credits }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Assigned Teacher</span>
                <span class="detail-value">
                    @if($course->teacher)
                        <a href="{{ route('teachers.show', $course->teacher) }}" style="color:var(--primary);font-weight:600;">
                            {{ $course->teacher->name }}
                        </a>
                        <span class="td-muted">({{ $course->teacher->subject }})</span>
                    @else
                        —
                    @endif
                </span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Created At</span>
                <span class="detail-value">{{ $course->created_at->format('M d, Y H:i') }}</span>
            </div>
            <div class="detail-item" style="grid-column:1/-1">
                <span class="detail-label">Description</span>
                <span class="detail-value">{{ $course->description ?? '—' }}</span>
            </div>
        </div>

        <div class="form-actions">
            <form method="POST" action="{{ route('courses.destroy', $course) }}" onsubmit="return confirm('Are you sure you want to delete this course?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Course</button>
            </form>
        </div>
    </div>
</div>
@endsection
