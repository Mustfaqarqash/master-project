<div>
    <table>
        <tbody>
        @forelse($cart as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>
                    <button wire:click="updateCartItem({{ $item['product_id'] }}, {{ $item['quantity'] - 1 }})">-</button>
                    <input type="number" wire:model.defer="cart.{{ $item['product_id'] }}.quantity" min="1">
                    <button wire:click="updateCartItem({{ $item['product_id'] }}, {{ $item['quantity'] + 1 }})">+</button>
                </td>
                <td>
                    <button wire:click="removeFromCart({{ $item['product_id'] }})">Remove</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Your cart is empty!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
