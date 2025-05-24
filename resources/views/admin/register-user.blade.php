@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="card p-4 mx-auto" style="max-width: 500px;">
        <h3 class="text-center mb-3">Register New User</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.register-user.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <select name="role" class="form-control" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="vendor">Vendor</option>
                    <option value="delivery">Delivery</option>
                    <option value="customer">Customer</option>
                </select>
            </div>

            <div class="mb-3">
                <input type="text" name="address" class="form-control" placeholder="Address" value="{{ old('address') }}" required>
            </div>

            <div class="mb-3">
                <input type="text" name="contact_number" class="form-control" placeholder="Contact Number" value="{{ old('contact_number') }}" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Register User</button>
        </form>
    </div>
</div>
@endsection
