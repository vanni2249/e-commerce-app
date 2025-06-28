<?php

namespace App\Livewire\Users\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListOrders extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Order::where('user_id', Auth::id())
            ->with(['sales'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.users.orders.list-orders');
    }
}
