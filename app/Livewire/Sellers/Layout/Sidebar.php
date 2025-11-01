<?php

namespace App\Livewire\Sellers\Layout;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user()->name;
    }
    public function collection()
    {
        return [
            ['title' => 'Dashboard', 'route' => route('sellers.dashboard'), 'active' => 'dashboard'],
            ['title' => 'Items', 'route' => route('sellers.items.index', ['shop' => 'retail', 'status' => 'approved']), 'active' => 'items'],
            ['title' => 'Products', 'route' => route('sellers.products.index'), 'active' => 'products'],
            ['title' => 'Orders', 'route' => route('sellers.orders.index'), 'active' => 'orders'],
            ['title' => 'Sales', 'route' => route('sellers.sales.index'), 'active' => 'sales'],
        ];
    }
    public function render()
    {
        return view('livewire.sellers.layout.sidebar', [
            'collection' => $this->collection(),
        ]);
    }
}
