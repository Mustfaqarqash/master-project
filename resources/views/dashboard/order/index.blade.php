@extends('layouts.dashboard')
@section("product", "active")
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">

            <!-- Order List Widget -->
            <div class="card mb-6">
                <div class="card-widget-separator-wrapper">
                    <div class="card-body card-widget-separator">
                        <div class="row gy-4 gy-sm-1">
                            <!-- Pending Payment -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-4 pb-sm-0">
                                    <div>
                                        <h4 class="mb-0">{{ $orderStats['pendingPayment'] }}</h4>
                                        <p class="mb-0">Pending Payment</p>
                                    </div>
                                    <div class="avatar me-sm-6">
                            <span class="avatar-initial rounded bg-label-secondary text-heading">
                                <i class="ri-calendar-2-line ri-24px"></i>
                            </span>
                                    </div>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none me-6">
                            </div>

                            <!-- Completed -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
                                    <div>
                                        <h4 class="mb-0">{{ $orderStats['completed'] }}</h4>
                                        <p class="mb-0">Completed</p>
                                    </div>
                                    <div class="avatar me-lg-6">
                            <span class="avatar-initial rounded bg-label-secondary text-heading">
                                <i class="ri-check-double-line ri-24px"></i>
                            </span>
                                    </div>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none">
                            </div>

                            <!-- Refunded -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="d-flex justify-content-between align-items-start border-end pb-4 pb-sm-0 card-widget-3">
                                    <div>
                                        <h4 class="mb-0">{{ $orderStats['refunded'] }}</h4>
                                        <p class="mb-0">Refunded</p>
                                    </div>
                                    <div class="avatar me-sm-6">
                            <span class="avatar-initial rounded bg-label-secondary text-heading">
                                <i class="ri-wallet-3-line ri-24px"></i>
                            </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Failed -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="mb-0">{{ $orderStats['failed'] }}</h4>
                                        <p class="mb-0">Failed</p>
                                    </div>
                                    <div class="avatar">
                            <span class="avatar-initial rounded bg-label-secondary text-heading">
                                <i class="ri-error-warning-line ri-24px"></i>
                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Order List Table -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Order List</h5>
                    <button class="btn btn-outline-primary btn-sm">Add New Order</button>
                </div>
                <div class="card-datatable table-responsive p-3">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                        <tr>

                            <th scope="col">Order ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Status</th>
                            <th scope="col">Method</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Row example -->
                        @foreach($orders as $order)
                            <tr>


                                <!-- Order ID with link -->
                                <td>
                                    <a href="" class="text-body fw-bold">#{{ $order->id }}</a>
                                </td>

                                <!-- Order Date -->
                                <td>{{ $order->created_at->format('M d, Y') }}</td>

                                <!-- User Information with avatar and email -->
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $order->user->google_id ? asset($order->user->image) :
                                             ( $order->user->image?asset('storage/' .$order->user->image):
                                             asset('assets/img/avatars/3.png')) }}"
                                             alt="Avatar"
                                             class="rounded-circle me-2"
                                             width="30" height="30">
                                        <div>
                                            <p class="mb-0 fw-semibold">{{ $order->user->name }}</p>
                                            <small class="text-muted">{{ $order->user->email }}</small>
                                        </div>
                                    </div>
                                </td>

                                <!-- Payment Status -->
                                <td>
                                    @if($order->payment_status == 'paid')
                                        <h6 class="mb-0 w-px-100 d-flex align-items-center text-success">
                                            <i class="ri-circle-fill ri-10px me-1"></i>Paid
                                        </h6>
                                    @elseif($order->payment_status == 'cancelled')
                                        <h6 class="mb-0 w-px-100 d-flex align-items-center text-secondary">
                                            <i class="ri-circle-fill ri-10px me-1"></i>Cancelled
                                        </h6>
                                    @elseif($order->payment_status == 'failed')
                                        <h6 class="mb-0 w-px-100 d-flex align-items-center text-danger">
                                            <i class="ri-circle-fill ri-10px me-1"></i>Failed
                                        </h6>
                                    @else
                                        <h6 class="mb-0 w-px-100 d-flex align-items-center text-warning">
                                            <i class="ri-circle-fill ri-10px me-1"></i>Pending
                                        </h6>
                                    @endif
                                </td>

                                <!-- Order Status with dynamic styling -->
                                <td>
                                    @if($order->order_status == 'dispatched')
                                        <span class="badge px-2 rounded-pill bg-warning text-dark">Dispatched</span>
                                    @elseif($order->order_status == 'ready')
                                        <span class="badge px-2 rounded-pill bg-info text-dark">Ready to Pickup</span>
                                    @elseif($order->order_status == 'out_for_delivery')
                                        <span class="badge px-2 rounded-pill bg-primary">Out for Delivery</span>
                                    @elseif($order->order_status == 'delivered')
                                        <span class="badge px-2 rounded-pill bg-success">Delivered</span>
                                    @else
                                        <span class="badge px-2 rounded-pill bg-secondary">Unknown Status</span>
                                    @endif
                                </td>


                                <!-- Payment Method with icon -->
                                <td>
                                    @php
                                        $paymentIcon = match ($order->payment_method) {
                                            'cashOnDelivery' => 'assets/img/icons/payments/cash-on-delivery.png',
                                            'paypal' => 'assets/img/icons/payments/mastercard-2.png',
                                            default => 'assets/img/icons/payments/default.png' // Fallback if needed
                                        };
                                    @endphp

                                    <img src="{{ asset($paymentIcon) }}" alt="{{ $order->payment_method }}" width="20">

                                    {{ ucfirst($order->payment_method) }}
                                </td>

                                <!-- Actions Dropdown -->
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-icon btn-text-secondary" data-bs-toggle="dropdown">
                                            <i class="ri-more-2-line"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{route('order.show' , $order->id)}}" class="dropdown-item">View</a>
                                            <a href="{{route('order.edit' , $order->id)}}" class="dropdown-item">Edit</a>
                                            <a href="{{route('order.delete' , $order->id)}}" class="dropdown-item text-danger">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                        <!-- Repeat rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
