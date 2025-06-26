<?php

namespace App\Livewire\Users\Carts;

use Livewire\Attributes\On;
use Livewire\Component;

class CountItems extends Component
{
    public $count = 0;

    #[On('cartUpdated')]
    public function mount()
    {
        $this->count = count(session()->get('cart', [])) ?? 0;
    }

    public function render()
    {
        return view('livewire.users.carts.count-items');
    }
}
