<?php

namespace App\Livewire\AdminSeller\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    use \Livewire\WithPagination;
    public $admin;
    public $perPage = 10;
    public $search = '';

    public function mount()
    {
        $this->admin = Auth::guard('admin')->check();
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin-seller.orders.index', [
            'orders' => Order::with(['sales', 'sales.product', 'sales.product.item', 'address' ,'user'])
                ->when(!$this->admin, function ($q) {
                    $q->whereHas('sales', function ($query) {
                        $query->whereHas('product.item', function ($subQuery) {
                            $subQuery->where('seller_id', Auth::user()->seller->id);
                        });
                    });
                })
                ->when($this->search, function ($q) {
                    $q->where('number', 'like', '%' . $this->search . '%');
                })
                ->latest()->paginate($this->perPage)
            ]);
    }
}
