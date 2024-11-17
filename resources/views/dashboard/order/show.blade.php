@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="card mb-5 shadow-lg">

                <h2 >Order Details</h2>

            <div class="card-body">
                <p class="mb-2"><strong>Order ID:</strong> <span class="badge bg-info text-dark">#{{ $order->id }}</span></p>
                <p class="mb-2"><strong>User:</strong> {{ $order->user->name ?? 'No User' }}</p>
                <p class="mb-2"><strong>User Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
                <p class="mb-2"><strong>Store:</strong> {{ $order->store->name ?? 'N/A' }}</p>
                <p class="mb-2"><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y') }}</p>
            </div>
        </div>

        <h3 class="text-primary mb-4">Order Items</h3>
        <div class="row">
            @forelse($order_details as $detail)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="row g-0">
                            <!-- Product Image -->
                            <div class="col-md-4">
                                <img class="img-fluid rounded-start"
                                     src="{{ asset('storage/' . $detail->product->image->path) }}"
                                     alt="{{ $detail->product->name }}" />
                            </div>

                            <!-- Product Details -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">{{ $detail->product->name }}</h5>
                                    <p class="card-text text-muted">{{ $detail->product->description }}</p>
                                    <p class="card-text">
                                        <strong>Price:</strong> ${{ number_format($detail->product->price, 2) }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Quantity:</strong> {{ $detail->quantity }}
                                    </p>
                                    <p class="card-text"><small class="text-muted">Added on {{ $detail->product->created_at->format('Y/m/d') }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No items found for this order.</p>
            @endforelse
        </div>
    </div>
@endsection
