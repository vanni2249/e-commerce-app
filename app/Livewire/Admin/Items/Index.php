<?php

namespace App\Livewire\Admin\Items;

use App\Models\Item;
use App\Models\ItemStatus;
use App\Models\Shop;
use App\Traits\ItemNumber;
use App\Traits\ItemUlid;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Index extends Component
{
    use ItemUlid, ItemNumber;

    public $admin;

   public $segments = [];

    public $sellers = [];

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

    public $itemStatuses = [];

    public function mount()
    {
        $this->admin = Auth::guard('admin')->check();
        $this->itemStatuses = ItemStatus::all();
        $this->segments = [
            '3' => request()->segment(3),
            '4' => request()->segment(4),
        ];
    }

    public function handleCreateItemModal()
    {
        $this->dispatch('open-modal', 'create-item-modal');
        $this->sellers = \App\Models\Seller::all();
    }

    public function updatedSellerId()
    {
        $this->shops = [];
        $this->shop_id = null;
        $this->fulfillments = [];
        $this->fulfillment_id = null;
        if ($this->seller_id) {
            $this->setCollections();
        }
    }

    public function setCollections()
    {
        $this->seller = \App\Models\Seller::find($this->seller_id);
        $this->shops = $this->seller->shops()->wherePivot('is_active', true)->get();
        $this->fulfillments = $this->seller->fulfillments()->wherePivot('is_active', true)->get();
        $this->sections = \App\Models\Section::all();
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

        if ($this->admin) {
            return $this->redirect('/admin/items/' . $item->id . '/edit', navigate: true);
        } else {
            return $this->redirect('/sellers/items/' . $item->id . '/edit', navigate: true);
        }
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.items.index', [
            'items' => Item::with('seller', 'shop', 'fulfillment', 'seller.user', 'section', 'variants', 'products', 'products.inventories', 'products.sales')
                ->when(!$this->admin, function ($query) {
                    $query->where('seller_id', Auth::user()->seller->id);
                })
                ->when($this->segments['3'], function ($query) {
                    $query->where('shop_id', Shop::where('slug', $this->segments['3'])->first()->id);
                })
                ->when($this->segments['4'] != 'all', function ($query) {
                    $query->where('item_status_id', ItemStatus::where('slug', $this->segments['4'])->first()->id);
                })
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage),
        ]);
    }
}
