@extends('layouts.layout')

@section('title', 'Customer List')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-danger">Registered Customers</h2>

    @if($customers->isEmpty())
        <div class="alert alert-info">No customers found.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-danger">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Registered At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone ?? 'N/A' }}</td>
                            <td>{{ $customer->created_at->format('F d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary mt-3">Back to Dashboard</a>
</div>
@endsection
