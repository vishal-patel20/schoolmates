@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard-header">
    <h1>Welcome back, Admin!</h1>
    <p>Tracking your impact and managing your creative journeys.</p>
</div>

{{-- Stats --}}
<div class="stats-grid">
    <div class="stat-card bg-teal">
        <div class="stat-icon-wrapper">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
        </div>
        <div class="stat-info">
            <div class="stat-label">TOTAL STUDENTS</div>
            <div class="stat-value">{{ $stats['students'] }}</div>
        </div>
    </div>
    
    <div class="stat-card bg-purple">
        <div class="stat-icon-wrapper">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
        </div>
        <div class="stat-info">
            <div class="stat-label">ACTIVE TEACHERS</div>
            <div class="stat-value">{{ $stats['teachers'] }}</div>
        </div>
    </div>

    <div class="stat-card bg-orange">
        <div class="stat-icon-wrapper">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
        </div>
        <div class="stat-info">
            <div class="stat-label">COURSES</div>
            <div class="stat-value">{{ $stats['courses'] }}</div>
        </div>
    </div>
</div>

{{-- Main section --}}
<div class="section-header">
    <h2 class="section-title">My Courses</h2>
    <a href="{{ route('courses.create') }}" class="btn btn-primary btn-campaign">+ Start a Course</a>
</div>

{{-- Recent Courses --}}
<div class="card">
    <div class="table-wrapper">
        @if($recentCourses ?? collect()->isEmpty())
            <div class="empty-state">
                <p>No courses added yet.</p>
                <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm">Add First Course</a>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Code</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentCourses as $course)
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px;">
                                <div class="avatar" style="background:#fef3c7;color:#92400e;">C</div>
                                <span class="td-name">{{ $course->name }}</span>
                            </div>
                        </td>
                        <td><span class="badge badge-gray">{{ $course->code }}</span></td>
                        <td class="td-muted">{{ $course->created_at?->format('M d, Y') ?? '—' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection
