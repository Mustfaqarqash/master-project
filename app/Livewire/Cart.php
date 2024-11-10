<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class CartOne extends Component
{
    public $cart = [];

    protected $listeners = ['addToCart', 'removeFromCart', 'updateCartItem'];

    public function mount()
    {
        $this->cart = json_decode(Cookie::get('cart', json_encode([])), true);
    }

    public function addToCart($productId, $name, $price, $quantity)
    {
        $cartItem = [
            'product_id' => $productId,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
        ];

        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity'] += $quantity;
        } else {
            $this->cart[$productId] = $cartItem;
        }

        Cookie::queue('cart', json_encode($this->cart), 60 * 24 * 7);
    }

    public function updateCartItem($productId, $quantity)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity'] = max(1, $quantity);
            Cookie::queue('cart', json_encode($this->cart), 60 * 24 * 7);
        }
    }

    public function removeFromCart($productId)
    {
        unset($this->cart[$productId]);
        Cookie::queue('cart', json_encode($this->cart), 60 * 24 * 7);
    }

    public function render()
    {
        return view('livewire.cart', ['cart' => $this->cart]);
    }
}
