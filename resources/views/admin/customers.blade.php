@extends('layouts.layout')

@section('title', 'Customer List')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold text-danger">Customer List</h2>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-danger mb-3">← Back to Dashboard</a>

    @if($customers->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-danger">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Registered At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $index => $customer)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone ?? 'N/A' }}</td>
                            <td>{{ $customer->address ?? 'N/A' }}</td>
                            <td>{{ $customer->created_at->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">No customers found.</div>
    @endif
</div>
@endsection
