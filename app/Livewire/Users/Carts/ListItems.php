<?php

namespace App\Livewire\Users\Carts;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ListItems extends Component
{
    public $items;

    public function mount()
    {
        $this->items = Session::get('cart');
    }

    public function remove()
    {
        // remove all items from the cart
        Session::forget('cart');
        $this->items = [];
        session()->flash('message', 'All items removed from cart successfully!');
        $this->dispatch('cartUpdated');
        $this->redirect(route('cart'));

    }

    public function render()
    {
        return view('livewire.users.carts.list-items');
    }
}
