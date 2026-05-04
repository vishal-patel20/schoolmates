@extends('layouts.app')

@section('title', 'Students')
@section('page_title', 'Students')
@section('breadcrumb', 'Home / Students')

@section('content')
    <div class="page-header">
        <div>
            <h1>Students</h1>
            <p>Manage all enrolled students.</p>
        </div>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    </div>

    <div class="card">
        <div class="table-wrapper">
            @if($students->isEmpty())
                <div class="empty-state">
                    <span class="empty-icon"></span>
                    <p>No students found. Add your first student to get started.</p>
                    <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">Add Student</a>
                </div>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Class</th>
                            <th>Gender</th>
                            <th>Enrolled</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td class="td-muted">{{ $student->id }}</td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:10px;">
                                        <div class="avatar">{{ strtoupper(substr($student->name, 0, 1)) }}</div>
                                        <span class="td-name">{{ $student->name }}</span>
                                    </div>
                                </td>
                                <td class="td-muted">{{ $student->email }}</td>
                                <td class="td-muted">{{ $student->phone ?? '—' }}</td>
                                <td><span class="badge badge-primary">{{ $student->class ?? '—' }}</span></td>
                                <td>
                                    @if($student->gender === 'Male')
                                        <span class="badge badge-info">Male</span>
                                    @elseif($student->gender === 'Female')
                                        <span class="badge badge-warning">Female</span>
                                    @else
                                        <span class="badge badge-gray">Other</span>
                                    @endif
                                </td>
                                <td class="td-muted">{{ $student->enrollment_date?->format('M d, Y') ?? '—' }}</td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('students.show', $student) }}"
                                            class="btn btn-outline btn-sm btn-icon-only" title="View">View</a>
                                        <a href="{{ route('students.edit', $student) }}"
                                            class="btn btn-primary btn-sm btn-icon-only" title="Edit">Edit</a>
                                        <form method="POST" action="{{ route('students.destroy', $student) }}"
                                            onsubmit="return confirm('Delete this student?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-icon-only"
                                                title="Delete">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        @if($students->hasPages())
            <div class="pagination-wrapper">{{ $students->links() }}</div>
        @endif
    </div>
@endsection