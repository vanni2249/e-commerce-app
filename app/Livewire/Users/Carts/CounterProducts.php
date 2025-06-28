<?php

namespace App\Livewire\Users\Carts;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CounterProducts extends Component
{
    public $count = 10;

    public function mount()
    {
        $this->count = Session::get('counter-product', 0);
    }

    public function render()
    {
        return view('livewire.users.carts.counter-products');
    }
}
