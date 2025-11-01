<?php

namespace App\Livewire\Admin\Items;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

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

    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

    public function menuCollections()
    {
        return [
            [

                'name' => __('Sales'),
                'url' => route('admin.items.show', ['item' => $this->item->id, 'show' => 'sale']),
                'collection' => 'sales',
            ],
            [
                'name' => __('Inventories'),
                'url' => route('admin.items.show', ['item' => $this->item->id, 'show' => 'inventories']),
                'collection' => 'inventories',
            ],
            [
                'name' => __('Adjustments'),
                'url' => route('admin.items.show', ['item' => $this->item->id, 'show' => 'adjustments']),
                'collection' => 'adjustments',
            ],
            [
                'name' => __('Products'),
                'url' => route('admin.items.show', ['item' => $this->item->id, 'show' => 'products']),
                'collection' => 'products',
            ],
        ];
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.items.show');
    }
}
