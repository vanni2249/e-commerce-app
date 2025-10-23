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

    public $seller_id;

    public $seller;

    public $sections = [];

    public $section_id;

    public $shops = [];

    public $shop_id;

    public $fulfillments = [];

    public $fulfillment_id;

    public $search = '';

    public $sortField = 'created_at';

    public $sortDirection = 'desc';

    public $perPage = 10;

    public $selectedItems = [];

    public $selectAll = false;

    public function mount()
    {
        $this->admin = Auth::guard('admin')->check();
        $this->seller_id = $this->admin ? null : Auth::user()->seller->id;
        $this->sections = \App\Models\Section::all();
        if ($this->admin == true) {
            $this->sellers = \App\Models\Seller::all();
        }else{
            $this->setCollections();
        }
    }

    public function handleCreateItemModal()
    {
        $this->dispatch('open-modal', 'create-item-modal');
    }

    public function updatedSellerId()
    {
        $this->shops = [];
        $this->shop_id = null;
        $this->fulfillments = [];
        $this->fulfillment_id = null;
        $this->setCollections();
    }
    
    public function setCollections()
    {
        $this->seller = \App\Models\Seller::find($this->seller_id);
        $this->shops = $this->seller->shops()->wherePivot('is_active', true)->get();
        $this->fulfillments = $this->seller->fulfillments()->wherePivot('is_active', true)->get();
    }

    public function store()
    {
        $this->validate([
            'section_id' => 'required|exists:sections,id',
            'shop_id' => 'required|exists:shops,id',
            'fulfillment_id' => 'required|exists:fulfillments,id',
        ]);

        $item = Item::create([
            'number' => $this->createItemNumber(),
            'seller_id' => $this->admin ? $this->seller_id : Auth::user()->seller->id,
            'shop_id' => $this->shop_id,
            'fulfillment_id' => $this->fulfillment_id,
            'section_id' => $this->section_id,
        ]);

        if ($this->admin) {
            return $this->redirect('/admin/items/' . $item->id . '/edit', navigate: true);
        } else {
            return $this->redirect('/sellers/items/' . $item->id . '/edit', navigate: true);
        }
    }


    public function render()
    {
        return view('livewire.admin-seller.items.index', [
            'items' => Item::with('seller', 'shop', 'fulfillment', 'seller.user', 'section', 'variants', 'products', 'products.inventories', 'products.sales')
                ->when(!$this->admin, function ($query) {
                    $query->where('seller_id', Auth::user()->seller->id);
                })->orderBy('created_at', 'desc')
                ->paginate($this->perPage),
        ])->layout($this->admin ? 'components.layouts.admin' : 'components.layouts.seller');
    }
}
