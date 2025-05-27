@extends('layouts.layout')

@section('title', 'Shop')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-primary">Online Public Market</h2>

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text text-muted">₱{{ number_format($product->price, 2) }}</p>
                    <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                    <button class="btn btn-outline-primary mt-auto" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                        View Details
                    </button>
                </div>
            </div>
        </div>

        <!-- Product Modal -->
        <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel{{ $product->id }}">{{ $product->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded">
                            </div>
                            <div class="col-md-6">
                                <h4>₱{{ number_format($product->price, 2) }}</h4>
                                <p>{{ $product->description }}</p>
                                <p><strong>Available:</strong> {{ $product->quantity }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <!-- Add to Cart Form -->
                        <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>

                        <!-- Buy Now Form -->
                        <form action="{{ route('checkout.buyNow') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-success">Buy Now</button>
                        </form>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        <a href="{{ route('customer.dashboard') }}" class="btn btn-outline-secondary">Back to Dashboard</a>
    </div>
</div>
@endsection
