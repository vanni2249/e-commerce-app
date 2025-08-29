<?php

namespace App\Livewire\Users\Items;

use App\Models\Item;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public $sortBy = 'created_at';

    public $sortDirection = 'desc';

    public $perPage = 24;
    
    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.items.index', [
            'items' => Item::query()
                ->with(['categories', 'products'])
                ->when($this->search, function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
}
