<?php

namespace App\Livewire\Users\Carts;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class CounterProducts extends Component
{
    public $user;
    public $count = 10;

    #[On('update-counter-products')]
    public function mount()
    {
        $this->user = Auth::user();
        if ($this->user && $this->user->cart) {
            $this->count = $this->user->cart->products->sum(function ($product) {
                return $product->pivot->quantity;
            });
            $this->count = $this->count;
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
