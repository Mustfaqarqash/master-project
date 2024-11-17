@extends('layouts.dashboard')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl">
            <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Order</h5>
                    <small class="text-body float-end">Modify order details</small>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('order.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Order ID (Read-Only) -->
                        <div class="form-floating form-floating-outline mb-6">
                            <input type="text" class="form-control" id="orderId" placeholder="Order ID" value="{{ $order->id }}" readonly />
                            <label for="orderId">Order ID</label>
                        </div>

                        <!-- User Select -->
                        <div class="form-floating form-floating-outline mb-6">
                            <select name="user_id" id="userId" class="form-control" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <label for="userId">User</label>
                        </div>

                        <!-- Store Select -->
                        <div class="form-floating form-floating-outline mb-6">
                            <select name="store_id" id="storeId" class="form-control" required>
                                @foreach($stores as $store)
                                    <option value="{{ $store->id }}" {{ $order->store_id == $store->id ? 'selected' : '' }}>{{ $store->name }}</option>
                                @endforeach
                            </select>
                            <label for="storeId">Store</label>
                        </div>

                        <!-- Order Status -->
                        <div class="form-floating form-floating-outline mb-6">
                            <select name="status" id="orderStatus" class="form-control" required>
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="dispatched" {{ $order->status == 'dispatched' ? 'selected' : '' }}>Dispatched</option>
                                <option value="ready" {{ $order->status == 'ready' ? 'selected' : '' }}>Ready to Pickup</option>
                                <option value="out_for_delivery" {{ $order->status == 'out_for_delivery' ? 'selected' : '' }}>Out for Delivery</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>
                            <label for="orderStatus">Order Status</label>
                        </div>

                        <!-- Address -->
                        <div class="form-floating form-floating-outline mb-6">
                            <textarea class="form-control" id="orderAddress" placeholder="Delivery Address" name="address" required>{{ old('address', $order->address->street_address ?? 'N/A') }}</textarea>
                            <label for="orderAddress">Delivery Address</label>
                        </div>

                        <!-- Order Total (Read-Only) -->
                        <div class="form-floating form-floating-outline mb-6">
                            <input type="text" class="form-control" id="orderTotal" placeholder="Order Total" value="${{ number_format($order->order_total_price, 2) }}" readonly />
                            <label for="orderTotal">Order Total</label>
                        </div>

                        <!-- Order Items -->
                        <div class="mb-6">
                            <h5 class="mb-4">Order Items</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderDetails as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>
                                                <input type="number" name="items[{{ $item->id }}][quantity]" value="{{ $item->quantity }}" class="form-control quantity-input" data-price="{{ $item->price }}" data-id="{{ $item->id }}" min="1" required />
                                            </td>
                                            <td>${{ number_format($item->price, 2) }}</td>
                                            <td>
                                                <span class="subtotal" data-id="{{ $item->id }}">
                                                    ${{ number_format($item->quantity * $item->price, 2) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100">Update Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <script>
        // Listen for changes in quantity inputs
        document.querySelectorAll('.quantity-input').forEach(function(input) {
            input.addEventListener('input', function() {
                const quantity = parseInt(input.value);
                const price = parseFloat(input.getAttribute('data-price'));
                const subtotalElement = document.querySelector('.subtotal[data-id="' + input.getAttribute('data-id') + '"]');
                const subtotal = quantity * price;

                // Update the subtotal display
                subtotalElement.textContent = '$' + subtotal.toFixed(2);

                // Update the total order price
                let totalPrice = 0;
                document.querySelectorAll('.subtotal').forEach(function(subtotalElement) {
                    totalPrice += parseFloat(subtotalElement.textContent.replace('$', ''));
                });

                // Update the total order price display
                document.getElementById('orderTotal').value = '$' + totalPrice.toFixed(2);
            });
        });
    </script>
@endsection
