@extends('layouts.app')

@section('title', 'Courses')
@section('page_title', 'Courses')
@section('breadcrumb', 'Home / Courses')

@section('content')
<div class="page-header">
    <div>
        <h1>Courses</h1>
        <p>Manage all school courses.</p>
    </div>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
</div>

<div class="card">
    <div class="table-wrapper">
        @if($courses->isEmpty())
            <div class="empty-state">
                <span class="empty-icon"></span>
                <p>No courses added yet. Create your first course to get started.</p>
                <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm">Add Course</a>
            </div>
        @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Code</th>
                    <th>Credits</th>
                    <th>Teacher</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td class="td-muted">{{ $course->id }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div class="avatar" style="background:#fef3c7;color:#92400e;">C</div>
                            <span class="td-name">{{ $course->name }}</span>
                        </div>
                    </td>
                    <td><span class="badge badge-gray">{{ $course->code }}</span></td>
                    <td><span class="badge badge-success">{{ $course->credits }} cr</span></td>
                    <td>
                        @if($course->teacher)
                            <div style="display:flex;align-items:center;gap:8px;">
                                <div class="avatar" style="width:26px;height:26px;font-size:.7rem;">{{ strtoupper(substr($course->teacher->name,0,1)) }}</div>
                                <span class="td-muted">{{ $course->teacher->name }}</span>
                            </div>
                        @else
                            <span class="td-muted">—</span>
                        @endif
                    </td>
                    <td class="td-muted">{{ $course->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('courses.show', $course) }}" class="btn btn-outline btn-sm btn-icon-only" title="View">View</a>
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary btn-sm btn-icon-only" title="Edit">Edit</a>
                            <form method="POST" action="{{ route('courses.destroy', $course) }}" onsubmit="return confirm('Delete this course?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-icon-only" title="Delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    @if($courses->hasPages())
    <div class="pagination-wrapper">{{ $courses->links() }}</div>
    @endif
</div>
@endsection
