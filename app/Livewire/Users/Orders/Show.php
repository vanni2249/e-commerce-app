<?php

namespace App\Livewire\Users\Orders;

use App\Models\Order;
use App\Traits\OrderSummary;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    use OrderSummary;

    public $order;

    public function mount($order)
    {
        $this->order = Order::with('address', 'address.city', 'sales', 'sales.product', 'sales.product.item')->findOrFail($this->order);
    }

    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.orders.show',[
            'order' => $this->order,
            'summary' => $this->summary(),
        ]);
    }
}
