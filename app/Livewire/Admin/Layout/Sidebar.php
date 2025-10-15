<?php

namespace App\Livewire\Admin\Layout;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{
    public $segment;

    public function mount()
    {
        $this->segment = request()->segment(2);
    }

    public function collection()
    {
        return [
            ['title' => 'Dashboard', 'route' => 'admin.dashboard', 'active' => 'dashboard'],
            ['title' => 'Items', 'route' => 'admin.items.index', 'active' => 'items'],
            ['title' => 'Products', 'route' => 'admin.products.index', 'active' => 'products'],
            ['title' => 'Orders', 'route' => 'admin.orders.index', 'active' => 'orders'],
            ['title' => 'Sales', 'route' => 'admin.sales.index', 'active' => 'sales'],
            ['title' => 'Users', 'route' => 'admin.users.index', 'active' => 'users'],
            ['title' => 'Sellers', 'route' => 'admin.sellers.index', 'active' => 'sellers'],
            ['title' => 'Admins', 'route' => 'admin.admins.index', 'active' => 'admins'],
            // ['title' => 'Users', 'routes' => [
            //     [
            //         'title' => 'Customers',
            //         'route' => 'admin.users.index',
            //         'active' => 'users'
            //     ],
            //     [
            //         'title' => 'Sellers',
            //         'route' => 'admin.sellers.index',
            //         'active' => 'sellers'
            //     ],
            //     [
            //         'title' => 'Admins',
            //         'route' => 'admin.admins.index',
            //         'active' => 'admins'
            //     ],
            // ], 'active' => 'users', 'buttonId' => 'users-menu-button', 'mainContent' => 'users-menu-content', 'arrowRightId' => 'users-menu-arrow-right', 'arrowDownId' => 'users-menu-arrow-down'],
        ];
    }

    public function render()
    {
        return view('livewire.admin.layout.sidebar', [
            'collection' => $this->collection(),
        ]);
    }
}
