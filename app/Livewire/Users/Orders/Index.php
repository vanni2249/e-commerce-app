<?php

namespace App\Livewire\Users\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    use \Livewire\WithPagination;

    public $filters = [
        'year' => null,
        'last-month' => false,
        'last-three-months' => false,
        'last-six-months' => false,
    ];

    #[Url(except: '')]
    public $filter = '';

    public $years = [];

    public function mount()
    {
        $this->years = Order::where('user_id', Auth::id())
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();
        
        $this->filters['last-month'] = now()->subMonth()->isSameYear(now()) && now()->subMonth()->isSameMonth(now());
    }

    public function updatingFilters()
    {
        $this->resetPage();
    }

    public function setLastMonth()
    {
        $this->filters['last-month'] = now()->subMonth()->isSameYear(now()) && now()->subMonth()->isSameMonth(now());
        $this->filters = array_merge($this->filters, [
            'last-three-months' => false,
            'last-six-months' => false,
            'year' => null,
        ]);
        $this->filter = '';

        $this->resetPage();

        $this->dispatch('close-modal', 'filter-orders');
    }

    public function setLastThreeMonths()
    {
        $this->filters['last-three-months'] = now()->subMonths(3)->isSameYear(now()) && now()->subMonths(3)->isSameMonth(now());
        $this->filters = array_merge($this->filters, [
            'last-month' => false,
            'last-six-months' => false,
            'year' => null,
        ]);
        $this->filter = 'last-three-months';

        $this->resetPage();

        $this->dispatch('close-modal', 'filter-orders');
    }

    public function setLastSixMonths()
    {
        $this->filters['last_6_months'] = now()->subMonths(6)->isSameYear(now()) && now()->subMonths(6)->isSameMonth(now());
        $this->filters = array_merge($this->filters, [
            'last-month' => false,
            'last-three-months' => false,
            'year' => null,
        ]);
        $this->filter = 'last-six-months';

        $this->resetPage();

        $this->dispatch('close-modal', 'filter-orders');
    }

    public function setYear($year)
    {
        $this->filters = array_merge($this->filters, [
            'year' => $year,
            'last-month' => false,
            'last-three-months' => false,
            'last-six-months' => false,
        ]);

        $this->filter = $year;

        $this->resetPage();

        $this->dispatch('close-modal', 'filter-orders');
    }

    public function filterOrderModal()
    {
        $this->dispatch('open-modal', 'filter-orders');
    }

    #[Layout('layouts.user')]
    public function render()
    {
        return view('livewire.users.orders.index', [
            'orders' => Order::where('user_id', Auth::id())
                ->with(['sales'])
                ->when($this->filters['year'], function ($query) {
                    $query->whereYear('created_at', $this->filters['year']);
                })
                ->when($this->filters['last-month'], function ($query) {
                    $query->whereMonth('created_at', now()->subMonth()->month)
                        ->whereYear('created_at', now()->subMonth()->year);
                })
                ->when($this->filters['last-three-months'], function ($query) {
                    $query->where('created_at', '>=', now()->subMonths(3));
                })
                ->when($this->filters['last-six-months'], function ($query) {
                    $query->where('created_at', '>=', now()->subMonths(6));
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ]);
    }
}
