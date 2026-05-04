@extends('layouts.app')

@section('title', 'Add Teacher')
@section('page_title', 'Add Teacher')
@section('breadcrumb', 'Home / Teachers / Add')

@section('content')
<div class="page-header">
    <div>
        <h1>Add New Teacher</h1>
        <p>Fill in the details to add a new teacher.</p>
    </div>
    <a href="{{ route('teachers.index') }}" class="btn btn-outline">← Back to Teachers</a>
</div>

<div class="card">
    <div class="card-header"><h2>Teacher Information</h2></div>
    <div class="card-body">
        <form method="POST" action="{{ route('teachers.store') }}">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Dr. Sarah Khan" required>
                    @error('name')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="e.g. sarah@school.com" required>
                    @error('email')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="e.g. +91 98000 00000">
                    @error('phone')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="subject">Subject *</label>
                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="e.g. Mathematics" required>
                    @error('subject')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="qualification">Qualification</label>
                    <input type="text" id="qualification" name="qualification" value="{{ old('qualification') }}" placeholder="e.g. M.Sc, B.Ed">
                    @error('qualification')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="joining_date">Joining Date</label>
                    <input type="date" id="joining_date" name="joining_date" value="{{ old('joining_date', date('Y-m-d')) }}">
                    @error('joining_date')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="salary">Monthly Salary (₹)</label>
                    <input type="number" id="salary" name="salary" value="{{ old('salary') }}" placeholder="e.g. 45000" min="0" step="0.01">
                    @error('salary')<span class="form-error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save Teacher</button>
                <a href="{{ route('teachers.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
