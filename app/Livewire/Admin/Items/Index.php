<?php

namespace App\Livewire\Admin\Items;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Index extends Component
{
    public $sellers;
    public $sections;

    #[Validate('required|exists:sellers,id')]
    public $seller_id;

    #[Validate('required|exists:sections,id')]
    public $section_id;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;
    public $selectedItems = [];
    public $selectAll = false;

    public function handleCreateItemModal()
    {
        $this->dispatch('open-modal', 'create-item-modal');
        $this->sellers = \App\Models\Seller::all();
        $this->sections = \App\Models\Section::all();
    }

    public function store()
    {
        $this->validate();

        $item = Item::create([
            'seller_id' => $this->seller_id,
            'section_id' => $this->section_id,
        ]);

        $this->redirect(route('admin.items.show', $item->id));
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.items.index', [
            'items' => Item::with('seller', 'section', 'products', 'products.inventories', 'products.sales')
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage),
        ]);
    }
}
