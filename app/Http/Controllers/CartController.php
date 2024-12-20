<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{


    public function index()
    {
        $cities = City::all();
        $userId = Auth::check() ? Auth::id() : null;

        // Get cart items from cookie, default to an empty array if not set
        $cart = json_decode(Cookie::get('cart', json_encode([])), true);

        // Filter cart items for the authenticated user
        $userCart = $userId ? array_filter($cart, function ($item) use ($userId) {
            return $item['user_id'] === $userId;
        }) : [];

        return view('userSide.cart.index', compact('cart', 'cities', 'userCart'));
    }

    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Get the cart data from the cookie
        $cart = json_decode(Cookie::get('cart', json_encode([])), true);

        // Check if the product exists in the cart
        if (isset($cart[$productId])) {
            // Update the quantity of the product
            $cart[$productId]['quantity'] = $request->quantity;

            // Save the updated cart back to the cookie
            return redirect()->back()->with('success', 'Cart updated successfully!')
                ->cookie('cart', json_encode($cart), 60 * 24 * 7); // Set cookie for 1 week
        } else {
            return redirect()->back()->with('error', 'Product not found in cart.');
        }
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = json_decode(Cookie::get('cart', json_encode([])), true);

        // Retrieve the product's store ID
        $product = \App\Models\Product::find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        $newStoreId = $product->store_id;

        // Check if cart contains items from a different store
        if (!empty($cart)) {
            $existingStoreId = reset($cart)['store_id']; // Get the store ID of the first item in the cart
            if ($existingStoreId !== $newStoreId) {
                return redirect()->back()->with('error', 'You cannot add products from a different store.');
            }
        }

        // Add or update the product in the cart
        $cartItem = [
            'product_id' => $request->product_id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'user_id' => Auth::user()->id,
            'store_id' => $newStoreId, // Add the store ID to the cart item
        ];

        if (isset($cart[$cartItem['product_id']])) {
            $cart[$cartItem['product_id']]['quantity'] += $cartItem['quantity'];
        } else {
            $cart[$cartItem['product_id']] = $cartItem;
        }

        // Set the updated cart in a cookie
        return redirect()->back()->with('success', 'Product added to cart successfully!')
            ->cookie('cart', json_encode($cart), 60 * 24 * 7); // Set cookie for 1 week
    }

    public function clear()
    {
        // Set the cart cookie to an empty array
        Cookie::queue(Cookie::forget('cart'));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }

    public function deleteCartItem($productId)
    {
        $cart = json_decode(Cookie::get('cart', json_encode([])), true);

        if (isset($cart[$productId])) {
            unset($cart[$productId]); // Remove item from cart
        }

        return redirect()->back()->with('success', 'Item removed from cart successfully!')
            ->cookie('cart', json_encode($cart), 60 * 24 * 7);
    }



}
