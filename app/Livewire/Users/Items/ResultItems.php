<?php

namespace App\Livewire\Users\Items;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ResultItems extends Component
{
    use WithPagination;
    // public $items;

    public $search;

    public $sortBy = 'created_at';

    public $sortDirection = 'desc';

    public $perPage = 24;

    public function render()
    {

        return view('livewire.users.items.result-items', [
            'items' => Item::query()
                ->with(['category', 'products'])
                ->when($this->search, function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
}
