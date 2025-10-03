<?php

namespace App\Livewire\Users\Layout;

use Livewire\Component;

class Menu extends Component
{
    public function services()
    {
        return [
            'New Arrivals',
            'Best Sellers',
            'Contact Us',
            'About Us',
            'Help Center',
        ];
    }

    public function items()
    {
        return [
            [
                'value' => 'Orders',
                'url' => route('orders.index'),
            ],
            [
                'value' => 'Favorites',
                'url' => route('favorites'),
            ],
            [
                'value' => 'Addresses',
                'url' => route('addresses'),
            ],
            [
                'value' => 'Logout',
                'url' => route('logout'),
            ],
        ];
    }
    public function render()
    {
        return view('livewire.users.layout.menu', [
            'services' => $this->services(),
            'items' => $this->items(),
        ]);
    }
}
