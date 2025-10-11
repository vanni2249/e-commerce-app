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
            ['title' => 'Products Sold', 'subtitle' => 'This Month', 'value' => '1,200', 'icon' => 'products', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'orange'],
            ['title' => 'New Customers', 'subtitle' => 'This Month', 'value' => '75', 'icon' => 'customers', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'purple'],
            ['title'=> 'Searches', 'subtitle' => 'This Month', 'value' => '1,500', 'icon' => 'search', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'red'],
            ['title'=> 'Histories', 'subtitle' => 'This Month', 'value' => '3,200', 'icon' => 'history', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'yellow'],
            ['title'=> 'Visitors', 'subtitle' => 'This Month', 'value' => '5,000', 'icon' => 'visitors', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'teal'],
            ['title'=> 'Claims', 'subtitle' => 'This Month', 'value' => '25', 'icon' => 'claims', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'indigo'],
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
