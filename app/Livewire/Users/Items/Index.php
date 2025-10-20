<?php

namespace App\Livewire\Users\Items;

use App\Models\Item;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $query;

    #[Url(except: '')]
    public $search = '';

    public $sortBy = 'created_at';

    public $sortDirection = 'desc';

    public $perPage = 24;

    // Filters
    public $filters = [
        'is_to_customer' => false,
        'is_to_business' => false,
        'categories' => [],
    ];

    public $categories = [];

    public function mount()
    {
        // Get query all categories in each items and group
        // Refactored: Use eager loading and reduce queries for categories
        $currentLocale = app()->getLocale();
        $this->categories = Item::query()
            ->when($this->search, function ($query) use ($currentLocale) {
                $search = strtolower($this->search);
                $words = explode(' ', $search);
                $excludedWordsForJson = ['label', 'value'];
                $query->where(function ($q) use ($words, $excludedWordsForJson, $currentLocale) {
                    foreach ($words as $word) {
                        $q->orWhere(function ($sub) use ($word, $excludedWordsForJson, $currentLocale) {
                            // Search in translatable title field
                            // $sub->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.{$currentLocale}'))) LIKE ?", ['%' . $word . '%'])
                            //     ->orWhereRaw("LOWER({$currentLocale}_description) LIKE ?", ['%' . $word . '%'])
                            //     ->orWhereRaw("LOWER({$currentLocale}_short_description) LIKE ?", ['%' . $word . '%']);
                            // if (!in_array($word, $excludedWordsForJson)) {
                            //     $sub->orWhereRaw("LOWER({$currentLocale}_specifications) LIKE ?", ['%' . $word . '%']);
                            // }
                        });
                    }
                });
            })
            ->with('categories:id,name') // Only select needed columns
            ->get()
            ->pluck('categories')
            ->flatten()
            ->unique('id')
            ->sortBy('name')
            ->values(); // Reset keys for cleaner output

    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilters()
    {
        $this->resetPage();
    }


    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.items.index', [
            'items' => Item::query()
                ->with(['categories', 'products'])
                ->when($this->search, function ($query) {
                    $search = strtolower($this->search);
                    $words = explode(' ', $search);
                    $currentLocale = app()->getLocale();

                    $excludedWordsForJson = ['label', 'value'];
                    $query->where(function ($q) use ($words, $excludedWordsForJson, $currentLocale) {
                        foreach ($words as $word) {
                            $q->orWhere(function ($sub) use ($word, $excludedWordsForJson, $currentLocale) {
                                // Search in translatable title field
                                $sub->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.{$currentLocale}'))) LIKE ?", ['%' . $word . '%'])
                                    ->orWhereRaw("LOWER({$currentLocale}_description) LIKE ?", ['%' . $word . '%'])
                                    ->orWhereRaw("LOWER({$currentLocale}_short_description) LIKE ?", ['%' . $word . '%']);

                                // Solo buscar en JSON si la palabra no está excluida
                                if (!in_array($word, $excludedWordsForJson)) {
                                    $sub->orWhereRaw("LOWER({$currentLocale}_specifications) LIKE ?", ['%' . $word . '%']);
                                }
                            });
                        }
                    });
                })
                ->when(!($this->filters['is_to_customer'] && $this->filters['is_to_business']), function ($query) {
                    $query->where(function ($q) {
                        if ($this->filters['is_to_customer']) {
                            $q->orWhere('is_to_customer', true);
                        }
                        if ($this->filters['is_to_business']) {
                            $q->orWhere('is_to_business', true);
                        }
                    });
                })
                ->when(count($this->filters['categories']), function ($query) {
                    $query->whereHas('categories', function ($q) {
                        $q->whereIn('categories.id', $this->filters['categories']);
                    });
                })
                ->showAccepted()
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage),
        ]);
    }
}
