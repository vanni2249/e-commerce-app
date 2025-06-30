<?php

namespace App\Livewire\Admin\Items;

use App\Models\Item;
use Livewire\Component;

class ListItems extends Component
{
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;
    public $selectedItems = [];
    public $selectAll = false;

    public function render()
    {
        return view('livewire.admin.items.list-items', [
            'items' => Item::with('seller', 'section', 'products','products.inventories', 'products.sales')
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage),
        ]);
    }
}
