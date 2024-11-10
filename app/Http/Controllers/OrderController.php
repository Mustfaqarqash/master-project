<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('userSide.checkout.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Retrieve the cart items from the cookie
        $cart = json_decode(Cookie::get('cart', json_encode([])), true);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        // Calculate the total price of items in the cart
        $orderTotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        $orderStatus = 'Pending';
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to place an order.');
        }

        // Create the order
        $order = Order::create([
            'order_total_price' => $orderTotal,
            'order_status' => $orderStatus,
            'user_id' => $user->id,
        ]);

        // Insert each cart item as an order detail
        foreach ($cart as $item) {
            order_detail::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'], // Ensure product_id is included in cart data
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total_price' => $item['price'] * $item['quantity'],
                'payment_method'=>'Cash on Delivery'
            ]);
        }

        // Clear the cart cookie
        Cookie::queue(Cookie::forget('cart'));

        return redirect()->route('checkoutView')->with('success', 'Order placed successfully!');
    }


/**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }
}
