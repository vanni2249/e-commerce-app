<?php

namespace App\Livewire\Sellers\Items;

use App\Models\Item;
use App\Models\ItemStatus;
use App\Models\Shop;
use App\Traits\ItemNumber;
use App\Traits\ItemUlid;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    use ItemUlid, ItemNumber;

    // public $admin;

    // #[Url]
    // public $segments = [];

    // public $sellers = [];

    // public $seller_id;

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

    // public $selectedItems = [];

    // public $selectAll = false;

    public $itemStatuses = [];

    #[Url]
    public $shop;

    #[Url]
    public $status;

    public function mount()
    {
        $this->seller = Auth::user()->seller;
        // dd($this->seller);
        // $this->admin = Auth::guard('admin')->check();
        $this->itemStatuses = ItemStatus::all();
    }

    public function handleCreateItemModal()
    {
        $this->dispatch('open-modal', 'create-item-modal');
        // $this->sellers = \App\Models\Seller::all();
        $this->setCollections();
    }

    // public function updatedSellerId()
    // {
    //     $this->shops = [];
    //     $this->shop_id = null;
    //     $this->fulfillments = [];
    //     $this->fulfillment_id = null;
    //     if ($this->seller_id) {
    //         $this->setCollections();
    //     }
    // }

    public function setCollections()
    {
        // $this->seller = \App\Models\Seller::find($this->seller_id);
        $this->shops = $this->seller->shops()->wherePivot('is_active', true)->get();
        $this->fulfillments = $this->seller->fulfillments()->wherePivot('is_active', true)->get();
        $this->sections = \App\Models\Section::all();
    }

    public function setShop($value)
    {
        $this->shop = $value;
    }

    public function setStatus($value)
    {
        $this->status = $value;
    }

    public function store()
    {
        $this->validate([
            'section_id' => 'required|exists:sections,id',
            'shop_id' => 'required|exists:shops,id',
            'fulfillment_id' => 'required|exists:fulfillments,id',
        ]);

        $item = Item::create([
            'ulid' => $this->createItemUlid(),
            'number' => $this->createItemNumber(),
            'seller_id' => $this->admin ? $this->seller_id : Auth::user()->seller->id,
            'shop_id' => $this->shop_id,
            'fulfillment_id' => $this->fulfillment_id,
            'section_id' => $this->section_id,
        ]);

        return $this->redirect('/admin/items/' . $item->id . '/edit', navigate: true);
    }

    #[Layout('layouts.seller')]
    public function render()
    {
        return view('livewire.sellers.items.index', [
            'items' => Item::with('seller', 'shop', 'fulfillment', 'seller.user', 'section', 'variants', 'products', 'products.inventories', 'products.sales')
                ->when($this->shop, function ($query) {
                    $query->where('shop_id', Shop::where('slug', $this->shop)->first()->id);
                })
                ->when($this->status != 'all', function ($query) {
                    $query->where('item_status_id', ItemStatus::where('slug', $this->status)->first()->id);
                })
                ->where('seller_id', $this->seller->id)
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage),
        ]);
    }
}
