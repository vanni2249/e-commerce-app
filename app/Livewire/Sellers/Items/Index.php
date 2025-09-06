<?php

namespace App\Livewire\Sellers\Items;

use App\Models\Item;
use App\Traits\CreateItemNumber;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    use CreateItemNumber;

    public $seller_id;
    public $sections = [];
    public $section_id;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;
    public $selectedItems = [];
    public $selectAll = false;

    public function mount()
    {
        $this->seller_id = Auth::user()->seller->id;
    }

    public function handleCreateItemModal()
    {
        $this->dispatch('open-modal', 'create-item-modal');
        $this->sections = \App\Models\Section::all();
    }

    public function store()
    {
        $this->validate([
            'section_id' => 'required|exists:sections,id',
        ]);

        $item = Item::create([
            'number' => $this->createItemNumber(),
            'seller_id' => $this->seller_id,
            'section_id' => $this->section_id,
        ]);

        $this->redirect(route('sellers.items.edit', ['item' => $item->id]));
    }

    #[Layout('components.layouts.seller')]
    public function render()
    {
        return view('livewire.sellers.items.index', [
            'items' => \App\Models\Item::where('seller_id', $this->seller_id)
                ->with('section', 'products', 'products.inventories', 'products.sales')
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage),
        ]);
    }
}
