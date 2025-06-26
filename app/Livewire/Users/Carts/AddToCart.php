<?php

namespace App\Livewire\Users\Carts;

use Livewire\Component;

class AddToCart extends Component
{
    public $productId;
    public $stock;
    public $quantity;
    public $price;
    public $shippingCost;

    public function addToCart()
    {
        $this->validate([
            'productId' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$this->productId])) {
            $cart[$this->productId]['quantity'] += $this->quantity;
        } else {
            $cart[$this->productId] = [
                'quantity' => $this->quantity,
                'price' => $this->price,
                'shipping_cost' => $this->shippingCost,
            ];
        }

        session()->put('cart', $cart);
        session()->flash('message', 'Product added to cart successfully!');

        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.users.carts.add-to-cart');
    }
}
