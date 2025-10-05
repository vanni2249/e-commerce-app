<?php

namespace App\Livewire\Users\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    use \Livewire\WithPagination;
    public $filters = [
        'year' => null,
        'last_month' => false,
        'last_three_months' => false,
        'last_six_months' => false,
    ];

    public $selected;

    public $years = [];

    public function mount()
    {
        $this->years = Order::where('user_id', Auth::id())
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();
        
        $this->filters['last_month'] = now()->subMonth()->isSameYear(now()) && now()->subMonth()->isSameMonth(now());
        $this->selected = 'last_month';
    }

    public function updatingFilters()
    {
        $this->resetPage();
    }

    public function setLastMonth()
    {
        $this->filters['last_month'] = now()->subMonth()->isSameYear(now()) && now()->subMonth()->isSameMonth(now());
        $this->filters = array_merge($this->filters, [
            'last_three_months' => false,
            'last_six_months' => false,
            'year' => null,
        ]);
        $this->selected = 'last_month';

        $this->resetPage();

        $this->dispatch('close-modal', 'filter-orders');
    }

    public function setLastThreeMonths()
    {
        $this->filters['last_three_months'] = now()->subMonths(3)->isSameYear(now()) && now()->subMonths(3)->isSameMonth(now());
        $this->filters = array_merge($this->filters, [
            'last_month' => false,
            'last_six_months' => false,
            'year' => null,
        ]);
        $this->selected = 'last_three_months';

        $this->resetPage();

        $this->dispatch('close-modal', 'filter-orders');
    }

    public function setLastSixMonths()
    {
        $this->filters['last_6_months'] = now()->subMonths(6)->isSameYear(now()) && now()->subMonths(6)->isSameMonth(now());
        $this->filters = array_merge($this->filters, [
            'last_month' => false,
            'last_three_months' => false,
            'year' => null,
        ]);
        $this->selected = 'last_six_months';

        $this->resetPage();

        $this->dispatch('close-modal', 'filter-orders');
    }

    public function setYear($year)
    {
        $this->filters = array_merge($this->filters, [
            'year' => $year,
            'last_month' => false,
            'last_three_months' => false,
            'last_six_months' => false,
        ]);

        $this->selected = $year;

        $this->resetPage();

        $this->dispatch('close-modal', 'filter-orders');
    }

    public function filterOrderModal()
    {
        $this->dispatch('open-modal', 'filter-orders');
    }

    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.orders.index', [
            'orders' => Order::where('user_id', Auth::id())
                ->with(['sales'])
                ->when($this->filters['year'], function ($query) {
                    $query->whereYear('created_at', $this->filters['year']);
                })
                ->when($this->filters['last_month'], function ($query) {
                    $query->whereMonth('created_at', now()->subMonth()->month)
                        ->whereYear('created_at', now()->subMonth()->year);
                })
                ->when($this->filters['last_three_months'], function ($query) {
                    $query->where('created_at', '>=', now()->subMonths(3));
                })
                ->when($this->filters['last_six_months'], function ($query) {
                    $query->where('created_at', '>=', now()->subMonths(6));
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ]);
    }
}
