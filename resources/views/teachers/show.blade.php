@extends('layouts.app')

@section('title', $teacher->name)
@section('page_title', 'Teacher Details')
@section('breadcrumb', 'Home / Teachers / ' . $teacher->name)

@section('content')
<div class="page-header">
    <div>
        <h1>Teacher Profile</h1>
        <p>Viewing details for {{ $teacher->name }}</p>
    </div>
    <div style="display:flex;gap:10px;">
        <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('teachers.index') }}" class="btn btn-outline">← Back</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div style="display:flex;align-items:center;gap:14px;">
            <div class="avatar" style="width:48px;height:48px;font-size:1.2rem;">{{ strtoupper(substr($teacher->name,0,1)) }}</div>
            <div>
                <h2>{{ $teacher->name }}</h2>
                <span class="td-muted">{{ $teacher->email }}</span>
            </div>
        </div>
        <span class="badge badge-info">{{ $teacher->subject }}</span>
    </div>
    <div class="card-body">
        <div class="detail-grid">
            <div class="detail-item">
                <span class="detail-label">Phone</span>
                <span class="detail-value">{{ $teacher->phone ?? '—' }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Qualification</span>
                <span class="detail-value">{{ $teacher->qualification ?? '—' }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Joining Date</span>
                <span class="detail-value">{{ $teacher->joining_date?->format('M d, Y') ?? '—' }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Monthly Salary</span>
                <span class="detail-value">{{ $teacher->salary ? '₹ ' . number_format($teacher->salary, 2) : '—' }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Courses Assigned</span>
                <span class="detail-value">{{ $teacher->courses->count() }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Registered At</span>
                <span class="detail-value">{{ $teacher->created_at->format('M d, Y H:i') }}</span>
            </div>
        </div>

        <div class="form-actions">
            <form method="POST" action="{{ route('teachers.destroy', $teacher) }}" onsubmit="return confirm('Are you sure you want to delete this teacher?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Teacher</button>
            </form>
        </div>
    </div>
</div>
@endsection
