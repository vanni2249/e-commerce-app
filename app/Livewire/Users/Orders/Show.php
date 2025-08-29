<?php

namespace App\Livewire\Users\Orders;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public $order;

    public function mount($order)
    {
        $this->order = Order::with('sales', 'sales.product', 'sales.product.item')->findOrFail($this->order);
    }

    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.orders.show');
    }
}
