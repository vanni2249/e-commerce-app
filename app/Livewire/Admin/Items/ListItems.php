<?php

namespace App\Livewire\Admin\Items;

use App\Models\Item;
use App\Models\ItemStatus;
use App\Models\Shop;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Lazy()]
class ListItems extends Component
{
    public $sellers = [];

    public $search = '';

    public $sortField = 'created_at';

    public $sortDirection = 'desc';

    public $perPage = 24;

    public $selectedItems = [];

    public $selectAll = false;

    #[Url]
    public $shop = '';

    #[Url]
    public $status = '';

    #[Url(except: '')]
    public $filter_seller_id = '';

    #[Url(except: '')]
    public $filter_fulfillment_id = '';

    #[Url(except: '')]
    public $filter_section_id = '';


    public function mount()
    {
        
    }

    public function placeholder()
    {
        return view('placeholders.table-skeleton');
    }

    public function render()
    {
        return view('livewire.admin.items.list-items', [
            'items' => Item::with('seller', 'shop', 'item_status', 'fulfillment', 'seller.user', 'section', 'variants', 'products', 'products.inventories', 'products.sales')
                ->when($this->search, function ($query) {
                    $query->where('number', 'like', '%' . $this->search . '%');
                })
                ->when($this->shop, function ($query) {
                    $query->where('shop_id', Shop::where('slug', $this->shop)->first()->id);
                })
                ->when($this->filter_seller_id, function ($query) {
                    $query->where('seller_id', $this->filter_seller_id);
                })
                ->when($this->filter_fulfillment_id, function ($query) {
                    $query->where('fulfillment_id', $this->filter_fulfillment_id);
                })
                ->when($this->filter_section_id, function ($query) {
                    $query->where('section_id', $this->filter_section_id);
                })
                ->when($this->status != 'all', function ($query) {
                    $query->where('item_status_id', ItemStatus::where('slug', $this->status)->first()->id);
                })
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage),
        ]);
    }
}
