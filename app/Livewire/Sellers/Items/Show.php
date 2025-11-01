<?php

namespace App\Livewire\Sellers\Items;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

class Show extends Component
{
    public $admin;

    public $item;

    public $menuCollections = [];

    #[Url]
    public $collection;

    public function mount($item)
    {

        $this->admin = Auth::guard('admin')->check();
        $this->item = Item::findOrFail($item);

        $this->menuCollections = $this->menuCollections();
    }

    public function setCollection($slug)
    {
        $this->collection = $slug;
    }

    public function menuCollections()
    {
        return [
            [

                'name' => __('Sale'),
                'url' => route('admin.items.show', ['item' => $this->item->id, 'show' => 'sale']),
                'slug' => 'sale',
            ],
            [
                'name' => __('Inventory'),
                'url' => route('admin.items.show', ['item' => $this->item->id, 'show' => 'inventory']),
                'slug' => 'inventory',
            ],
            [
                'name' => __('Products'),
                'url' => route('admin.items.show', ['item' => $this->item->id, 'show' => 'products']),
                'slug' => 'products',
            ],
        ];
    }
    #[Layout('components.layouts.seller')]
    public function render()
    {
        return view('livewire.sellers.items.show');
    }
}
