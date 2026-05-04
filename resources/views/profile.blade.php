@extends('layouts.app')

@section('title', 'Profile Settings')

@section('content')
<div class="page-header">
    <h1 class="page-title">Profile Settings</h1>
    <p class="page-subtitle">Manage your account information and preferences</p>
</div>

<div class="card" style="max-width: 600px;">
    <form action="#" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="name">Full Name</label>
            <input type="text" id="name" name="name" class="form-control" value="Admin User" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email Address</label>
            <input type="email" id="email" name="email" class="form-control" value="admin@schoolfund.com" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="password">New Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Leave blank to keep current">
        </div>

        <div class="form-group" style="margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>
@endsection
