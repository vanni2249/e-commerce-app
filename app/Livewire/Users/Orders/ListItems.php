<?php

namespace App\Livewire\Users\Orders;

use Livewire\Component;

class ListItems extends Component
{
    public $order;

    public function mount($order)
    {
        $this->order = $order->load('sales', 'sales.product', 'sales.product.item');
    }

    public function render()
    {
        return view('livewire.users.orders.list-items');
    }
}
