@extends('layouts.app')

@section('title', 'Create User')

@section('content')
<div class="card shadow-sm p-4">
    <h2 class="mb-3">Create User Account</h2>

    <form action="{{ route('users.store') }}" method="POST" novalidate>
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
            <input type="text" id="username" name="username"
                   class="form-control @error('username') is-invalid @enderror"
                   value="{{ old('username') }}">
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" id="full_name" name="full_name"
                   class="form-control @error('full_name') is-invalid @enderror"
                   value="{{ old('full_name') }}">
            @error('full_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save User</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection