<?php

namespace App\Livewire\Admin\Items;

use App\Models\Item;
use App\Models\ItemStatus;
use App\Models\Shop;
use App\Traits\ItemNumber;
use App\Traits\ItemUlid;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
// use Livewire\Attributes\Lazy;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

// #[Lazy()]
class Index extends Component
{
    use ItemUlid, ItemNumber, WithPagination;

    // public $admin;

    public $sellers = [];

    public $seller_id;

    public $seller;

    public $sections = [];

    public $section_id;

    public $shops = [];

    public $shop_id;

    public $fulfillments = [];

    public $fulfillment_id;

    // public $search = '';

    // public $sortField = 'created_at';

    // public $sortDirection = 'desc';

    // public $perPage = 24;

    // public $selectedItems = [];

    // public $selectAll = false;

    #[Url]
    public $shop;

    #[Url]
    public $status;

    // #[Url(except: '')]
    // public $filter_seller_id = '';

    // #[Url(except: '')]
    // public $filter_fulfillment_id = '';

    // #[Url(except: '')]
    // public $filter_section_id = '';

    public function mount()
    {
        // $this->admin = Auth::guard('admin')->check();
        // $this->itemStatuses = ItemStatus::all();
        $this->sellers = \App\Models\Seller::all();
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
        if ($this->seller_id) {
            $this->setCollections();
        }
    }

    public function storeFilter()
    {
        $this->dispatch('close-modal', 'filter-items-modal');
    }

    public function setCollections()
    {
        $this->seller = \App\Models\Seller::find($this->seller_id);
        $this->shops = $this->seller->shops()->wherePivot('is_active', true)->get();
        $this->fulfillments = $this->seller->fulfillments()->wherePivot('is_active', true)->get();
        $this->sections = \App\Models\Section::all();
    }

    public function setShop($value)
    {
        $this->shop = $value;
        // $this->dispatch('refresh-items-list', value: $value);
        // dd();
    }

    public function setStatus($value)
    {
        $this->resetPage();
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
            'item_status_id' => ItemStatus::where('slug', 'draft')->first()->id,
        ]);

        return $this->redirect('/admin/items/' . $item->id . '/edit', navigate: true);
    }

    protected $queryString = [
        'shop' => ['except' => ''],
        'status' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function placeholder()
    {
        return view('placeholders.header-table-skeleton');
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.items.index');
    }
}
