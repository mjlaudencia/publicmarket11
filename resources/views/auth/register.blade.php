@extends('layouts.layout')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 15px;">

        {{-- Logo --}}
        <div class="text-center mb-4">
            <img src="{{ asset('storage/app/public/images/logo.png') }}" alt="Logo" style="max-width: 150px; height: auto;">
        </div>

        <h2 class="text-center mb-4 fw-bold" style="color: #d32f2f;">Register</h2>

        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <input 
                    type="text" 
                    name="name" 
                    class="form-control form-control-lg rounded-pill @error('name') is-invalid @enderror" 
                    placeholder="Name" 
                    required 
                    autofocus
                    value="{{ old('name') }}"
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input 
                    type="email" 
                    name="email" 
                    class="form-control form-control-lg rounded-pill @error('email') is-invalid @enderror" 
                    placeholder="Email" 
                    required
                    value="{{ old('email') }}"
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input 
                    type="text" 
                    name="address" 
                    class="form-control form-control-lg rounded-pill @error('address') is-invalid @enderror" 
                    placeholder="Address" 
                    required
                    value="{{ old('address') }}"
                >
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input 
                    type="text" 
                    name="contact_number" 
                    class="form-control form-control-lg rounded-pill @error('contact_number') is-invalid @enderror" 
                    placeholder="Contact Number" 
                    required
                    value="{{ old('contact_number') }}"
                >
                @error('contact_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input 
                    type="password" 
                    name="password" 
                    class="form-control form-control-lg rounded-pill @error('password') is-invalid @enderror" 
                    placeholder="Password" 
                    required
                >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="form-control form-control-lg rounded-pill" 
                    placeholder="Confirm Password" 
                    required
                >
            </div>

            <button type="submit" class="btn btn-danger btn-lg w-100 rounded-pill fw-semibold">
                Register
            </button>
        </form>

        <p class="text-center mt-4 mb-0">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-danger fw-semibold">Login here</a>
        </p>
    </div>
</div>
@endsection
