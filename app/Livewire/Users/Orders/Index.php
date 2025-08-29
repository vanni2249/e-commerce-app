<?php

namespace App\Livewire\Users\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.orders.index', [
            'orders' => Order::where('user_id', Auth::id())
                ->with(['sales'])
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }
}
