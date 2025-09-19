<?php

namespace App\Livewire\Users\Carts;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class CounterProducts extends Component
{
    public $user;
    public $cart;
    public $count = 10;

    #[On('update-counter-products')]
    public function mount()
    {
        $this->user = Auth::user();
        $this->cart = ($this->user && $this->user->cart)
            ? $this->user->cart->where('type', 'cart')->doesntHave('order')->first()
            : null;
        if ($this->user && $this->cart) {
            $this->count = $this->cart->products->sum(function ($product) {
            return $product->pivot->quantity;
            });
        }
        else {
            $this->count = 0;
        }
    }

    public function render()
    {
        return view('livewire.users.carts.counter-products');
    }
}
