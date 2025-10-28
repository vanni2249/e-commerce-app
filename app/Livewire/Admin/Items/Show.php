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
    public $segments = [];
    public $admin;
    public $item;
    public $menuCollections = [];

    #[Url]
    public $collection;

    public function mount($item)
    {
        $this->segments = [
            5 => request()->segment(5) ?? '',
        ];

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

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.items.show');
    }
}
