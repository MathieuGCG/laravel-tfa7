@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="card shadow-sm p-4">
    <h2 class="mb-3">Edit User Account</h2>

    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')

        <div class="mb-3 d-flex align-items-center gap-3">
            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/avatar-placeholder.svg') }}"
                 alt="{{ $user->full_name }}"
                 width="72" height="72"
                 class="rounded-circle object-fit-cover border">
            <div>
                <label for="avatar" class="form-label mb-1">Profile Picture (Image, max 2MB)</label>
                <input type="file" id="avatar" name="avatar" accept="image/*"
                       class="form-control @error('avatar') is-invalid @enderror">
                @error('avatar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
            <input type="text" id="username" name="username"
                   class="form-control @error('username') is-invalid @enderror"
                   value="{{ old('username', $user->username) }}">
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" id="full_name" name="full_name"
                   class="form-control @error('full_name') is-invalid @enderror"
                   value="{{ old('full_name', $user->full_name) }}">
            @error('full_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection