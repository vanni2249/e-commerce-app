<?php

namespace App\Livewire\AdminSeller\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public $admin;
    public $order;
    public $order_id;
    public $search = "";
    public $perPage = 10;
    public $items = [];

    public function mount($order)
    {
        $this->admin = Auth::guard('admin')->check();
        $this->order_id = $order;
        $this->order = Order::findOrFail($order);
        $this->items = $this->details();
    }

    public function details()
    {
        return [
            ['label' => 'Order Number', 'value' => $this->order->number],
            ['label' => 'Items', 'value' => $this->order->sales->count()],
            ['label' => 'Total Amount', 'value' => '$' . number_format($this->order->transaction->amount, 2)],
            ['label' => 'User', 'value' => $this->order->user->name],
            ['label' => 'Address Line 1', 'value' => $this->order->address->line1],
            ['label' => 'Address Line 2', 'value' => $this->order->address->line2],
            ['label' => 'City', 'value' => $this->order->address->city->name],
            ['label' => 'Created At', 'value' => $this->order->created_at->format('Y-m-d H:i:s')],
        ];
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin-seller.orders.show',[
            'order' => $this->order,
            'sales' => $this->order->sales()->whereHas('product.item', function ($query) {
                if (!$this->admin) {
                    $query->where('seller_id', Auth::user()->seller->id);
                }
            })
            ->when($this->search, function ($query) {
                    $query->where('number', 'like', '%' . $this->search . '%');
            })
            ->with(['product', 'product.item'])->get()
        ]);
    }
}
