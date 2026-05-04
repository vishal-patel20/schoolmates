@extends('layouts.app')

@section('title', $student->name)
@section('page_title', 'Student Details')
@section('breadcrumb', 'Home / Students / ' . $student->name)

@section('content')
<div class="page-header">
    <div>
        <h1>Student Profile</h1>
        <p>Viewing details for {{ $student->name }}</p>
    </div>
    <div style="display:flex;gap:10px;">
        <a href="{{ route('students.edit', $student) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('students.index') }}" class="btn btn-outline">← Back</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div style="display:flex;align-items:center;gap:14px;">
            <div class="avatar" style="width:48px;height:48px;font-size:1.2rem;">{{ strtoupper(substr($student->name,0,1)) }}</div>
            <div>
                <h2>{{ $student->name }}</h2>
                <span class="td-muted">{{ $student->email }}</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="detail-grid">
            <div class="detail-item">
                <span class="detail-label">Phone</span>
                <span class="detail-value">{{ $student->phone ?? '—' }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Gender</span>
                <span class="detail-value">{{ $student->gender }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Date of Birth</span>
                <span class="detail-value">{{ $student->date_of_birth?->format('M d, Y') ?? '—' }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Class / Grade</span>
                <span class="detail-value">{{ $student->class ?? '—' }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Enrollment Date</span>
                <span class="detail-value">{{ $student->enrollment_date?->format('M d, Y') ?? '—' }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Registered At</span>
                <span class="detail-value">{{ $student->created_at->format('M d, Y H:i') }}</span>
            </div>
            <div class="detail-item full-width" style="grid-column:1/-1">
                <span class="detail-label">Address</span>
                <span class="detail-value">{{ $student->address ?? '—' }}</span>
            </div>
        </div>

        <div class="form-actions">
            <form method="POST" action="{{ route('students.destroy', $student) }}" onsubmit="return confirm('Are you sure you want to delete this student?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Student</button>
            </form>
        </div>
    </div>
</div>
@endsection
