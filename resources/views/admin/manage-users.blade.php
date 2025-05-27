@extends('layouts.layout')

@section('title', 'Manage Users')

@section('content')
<div class="container py-4">
    <h2 class="text-danger mb-4">Manage Users</h2>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>{{ $user->created_at ? $user->created_at->toFormattedDateString() : 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
