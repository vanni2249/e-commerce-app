<?php

namespace App\Livewire\Users\Completed;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Traits\OrderSummary;

class Index extends Component
{
    use OrderSummary;

    public $order_id;
    public $order;

    public function mount($order)
    {
        $this->order_id = $order;
        $this->order = Order::with('sales','sales.product','sales.product.item','address', 'address.city')->findOrFail($this->order_id);
    }

    #[Layout('components.layouts.customer')] 
    public function render()
    {
        return view('livewire.users.completed.index',[
            'order' => $this->order,
            'summary' => $this->summary(),
        ]);
    }
}
