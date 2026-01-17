<?php

namespace App\Livewire\Sellers\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $filter;
    public $value;
    public $widgets = [];
    public $labels = [];
    public $chartData = [];

    public function mount()
    {
        if ($this->filter === null) {
            $this->filter = 'day';
        }
        if ($this->value === null) {
            $this->value = date('Y-m-d');
        }
        $this->widgets = $this->widgets();
        $this->setLabels();
        $this->chartData = $this->setChartData();
    }

    public function setLabels()
    {
        switch ($this->filter) {
            case 'day':
                // Set labels for hours
                $this->labels = ['12 AM', '1 AM', '2 AM', '3 AM', '4 AM', '5 AM', '6 AM', '7 AM', '8 AM', '9 AM', '10 AM', '11 AM',
                    '12 PM',    '1 PM', '2 PM', '3 PM', '4 PM', '5 PM', '6 PM', '7 PM', '8 PM', '9 PM', '10 PM', '11 PM'];
                break;
            case 'month':
                // Set labels daily for the month
                $this->labels = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10',
                    '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                    '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];
                break;
            case 'year':
                // Set labels for months
                $this->labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept',
                    'Oct', 'Nov', 'Dec'];
                break;
            default:
                $this->labels = ['12 AM', '1 AM', '2 AM', '3 AM', '4 AM', '5 AM', '6 AM', '7 AM', '8 AM', '9 AM', '10 AM', '11 AM',
                    '12 PM',    '1 PM', '2 PM', '3 PM', '4 PM', '5 PM', '6 PM', '7 PM', '8 PM', '9 PM', '10 PM', '11 PM'];
                break;
        }
    }

    public function widgets()
    {
        return [
            ['title' => 'Total Sales', 'subtitle' => 'This Month', 'value' => '$24,000', 'icon' => 'sales', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'green'],
            ['title' => 'New Orders', 'subtitle' => 'This Week', 'value' => '150', 'icon' => 'orders', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'blue'],
            ['title' => 'Products Sold', 'subtitle' => 'This Month', 'value' => '1,200', 'icon' => 'products', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'red'],
            ['title' => 'Claims', 'subtitle' => 'This Month', 'value' => '25', 'icon' => 'claims', 'color' => 'bg-white', 'border' => 'border-gray-300', 'lineColor' => 'green'],
        ];
    }

    public function labels()
    {
        return ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept',
            'Oct', 'Nov', 'Dec'];
    }

    public function setChartData()
    {
        return [1200, 1900, 3000, 5000, 2300, 3400, 4200, 1900, 3000, 5000, 2300, 3400, 4200];
    }

    #[Layout('layouts.seller')] 
    public function render()
    {
        return view('livewire.sellers.dashboard.index', [
            'widgets' => $this->widgets,
            'labels' => $this->labels,
            'chartData' => $this->chartData,
        ]);
    }
}
