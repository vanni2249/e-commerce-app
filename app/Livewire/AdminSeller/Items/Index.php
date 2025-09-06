<?php

namespace App\Livewire\AdminSeller\Items;

use App\Models\Item;
use App\Traits\CreateItemNumber;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    use CreateItemNumber;

    public $admin;
    public $sellers;
    public $sections;

    public $seller_id;

    public $section_id;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;
    public $selectedItems = [];
    public $selectAll = false;

    public function mount()
    {
        $this->admin = Auth::guard('admin')->check();
    }

    public function handleCreateItemModal()
    {
        $this->dispatch('open-modal', 'create-item-modal');
        $this->sellers = \App\Models\Seller::all();
        $this->sections = \App\Models\Section::all();
    }

    public function store()
    {
        $this->validate([
            'section_id' => 'required|exists:sections,id',
        ]);

        $item = Item::create([
            'number' => $this->createItemNumber(),
            'seller_id' => $this->admin ? $this->seller_id : Auth::user()->seller->id,
            'section_id' => $this->section_id,
        ]);

        if ($this->admin) {
            return $this->redirect('/admin/items/' . $item->id . '/edit', navigate: true);
        } else {
            return $this->redirect('/sellers/items/' . $item->id . '/edit', navigate: true);
        }


        $this->redirect(route('admin.items.show', $item->id));
    }

    
    public function render()
    {
        return view('livewire.admin-seller.items.index', [
            'items' => Item::with('seller', 'seller.user', 'section', 'products', 'products.inventories', 'products.sales')
                ->when(!$this->admin, function ($query) {
                    $query->where('seller_id', Auth::user()->seller->id);
                })->orderBy('created_at', 'desc')
                ->paginate($this->perPage),
        ])->layout($this->admin ? 'components.layouts.admin' : 'components.layouts.seller');
    }
}
