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
            ['title' => 'Dashboard', 'route' => 'admin/dashboard', 'active' => 'dashboard'],
            ['title' => 'Items', 'route' => route('admin.items.index', ['shop' => 'retail', 'status' => 'all']), 'active' => 'items'],
            ['title' => 'Products', 'route' => 'admin/products', 'active' => 'products'],
            ['title' => 'Orders', 'route' => 'admin/orders', 'active' => 'orders'],
            ['title' => 'Sales', 'route' => 'admin/sales', 'active' => 'sales'],
            ['title' => 'Users', 'route' => 'admin/users', 'active' => 'users'],
            ['title' => 'Sellers', 'route' => 'admin/sellers', 'active' => 'sellers'],
            ['title' => 'Admins', 'route' => 'admin/admins', 'active' => 'admins'],
            // [
            //     'title' => 'Users',
            //     'routes' => [
            //         [
            //             'title' => 'Customers',
            //             'route' => 'admin.users.index',
            //             'active' => 'users'
            //         ],
            //         [
            //             'title' => 'Sellers',
            //             'route' => 'admin.sellers.index',
            //             'active' => 'sellers'
            //         ],
            //         [
            //             'title' => 'Admins',
            //             'route' => 'admin.admins.index',
            //             'active' => 'admins'
            //         ],
            //     ],
            //     'active' => 'users',
            //     'buttonId' => 'users-menu-button',
            //     'mainContent' => 'users-menu-content',
            //     'arrowRightId' => 'users-menu-arrow-right',
            //     'arrowDownId' => 'users-menu-arrow-down'
            // ],
        ];
    }

    public function render()
    {
        return view('livewire.admin.layout.sidebar', [
            'collection' => $this->collection(),
        ]);
    }
}
