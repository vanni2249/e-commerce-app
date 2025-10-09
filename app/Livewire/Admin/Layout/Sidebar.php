<?php

namespace App\Livewire\Admin\Layout;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{

    public function collection()
    {
        return [
            ['title' => 'Dashboard', 'route' => 'admin.dashboard', 'active' => 'dashboard'],
            ['title' => 'Items', 'route' => 'admin.items.index', 'active' => 'items'],
            ['title' => 'Products', 'route' => 'admin.products.index', 'active' => 'products'],
            ['title' => 'Orders', 'route' => 'admin.orders.index', 'active' => 'orders'],
            ['title' => 'Sales', 'route' => 'admin.sales.index', 'active' => 'sales'],
            ['title' => 'Users', 'route' => 'admin.users.index', 'active' => 'users'],
        ];
    }

    public function render()
    {
        return view('livewire.admin.layout.sidebar', [
            'collection' => $this->collection(),
        ]);
    }
}
