<?php

namespace App\Livewire\Users\Layout;

use Livewire\Component;

class Menu extends Component
{
    public function services()
    {
        return [
            __('New Arrivals'),
            __('Best Sellers'),
            __('Contact Us'),
            __('About Us'),
            __('Help Center'),
        ];
    }

    public function items()
    {
        return [
            [
                'value' => __('Orders'),
                'url' => route('orders.index'),
            ],
            [
                'value' => __('Favorites'),
                'url' => route('favorites'),
            ],
            [
                'value' => __('Addresses'),
                'url' => route('addresses'),
            ],
            [
                'value' => __('Logout'),
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
