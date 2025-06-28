<?php

namespace App\Livewire\Users\Checkout;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListItems extends Component
{
    public $cart;

    public function mount()
    {
        $this->cart = Cart::where('user_id', Auth::id())
            ->with('products','products.item')
            ->doesntHave('order')
            ->first();
    }
    public function render()
    {
        return view('livewire.users.checkout.list-items');
    }
}
