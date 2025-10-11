<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $widgets = [];
    public function widgets()
    {
        return [
            ['title' => 'Total Sales', 'subtitle' => 'This Month', 'value' => '$24,000', 'icon' => 'sales', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'green'],
            ['title' => 'New Orders', 'subtitle' => 'This Week', 'value' => '150', 'icon' => 'orders', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'blue'],
            ['title' => 'Products Sold', 'subtitle' => 'This Month', 'value' => '1,200', 'icon' => 'products', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'red'],
            ['title' => 'Claims', 'subtitle' => 'This Month', 'value' => '25', 'icon' => 'claims', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'green'],
        ];
    }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.dashboard.index', [
            'widgets' => $this->widgets,
        ]);
    }
}
