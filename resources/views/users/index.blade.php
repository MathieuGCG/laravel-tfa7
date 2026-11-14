@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')
<div class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">User Accounts</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary">+ Add User</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th style="width: 75px;">Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th style="width: 110px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td class="text-center">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/avatar-placeholder.svg') }}"
                            alt="{{ $user->full_name }}"
                            width="48" height="48"
                            class="rounded-circle object-fit-cover border">
                    </td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection