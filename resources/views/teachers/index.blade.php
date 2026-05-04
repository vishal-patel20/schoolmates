@extends('layouts.app')

@section('title', 'Teachers')
@section('page_title', 'Teachers')
@section('breadcrumb', 'Home / Teachers')

@section('content')
<div class="page-header">
    <div>
        <h1>Teachers</h1>
        <p>Manage all teaching staff.</p>
    </div>
    <a href="{{ route('teachers.create') }}" class="btn btn-primary">Add Teacher</a>
</div>

<div class="card">
    <div class="table-wrapper">
        @if($teachers->isEmpty())
            <div class="empty-state">
                <span class="empty-icon"></span>
                <p>No teachers added yet. Add your first teacher to get started.</p>
                <a href="{{ route('teachers.create') }}" class="btn btn-primary btn-sm">Add Teacher</a>
            </div>
        @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Qualification</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td class="td-muted">{{ $teacher->id }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div class="avatar">{{ strtoupper(substr($teacher->name,0,1)) }}</div>
                            <span class="td-name">{{ $teacher->name }}</span>
                        </div>
                    </td>
                    <td class="td-muted">{{ $teacher->email }}</td>
                    <td class="td-muted">{{ $teacher->phone ?? '—' }}</td>
                    <td><span class="badge badge-info">{{ $teacher->subject }}</span></td>
                    <td class="td-muted">{{ $teacher->qualification ?? '—' }}</td>
                    <td class="td-muted">{{ $teacher->joining_date?->format('M d, Y') ?? '—' }}</td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('teachers.show', $teacher) }}" class="btn btn-outline btn-sm btn-icon-only" title="View">View</a>
                            <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-primary btn-sm btn-icon-only" title="Edit">Edit</a>
                            <form method="POST" action="{{ route('teachers.destroy', $teacher) }}" onsubmit="return confirm('Delete this teacher?')">
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
    @if($teachers->hasPages())
    <div class="pagination-wrapper">{{ $teachers->links() }}</div>
    @endif
</div>
@endsection
