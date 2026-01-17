<?php

namespace App\Livewire\Admin\Items;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
    public $admin;

    public $item;

    public $menu = [];

    #[Url]
    public $show;

    public function mount($item)
    {

        $this->admin = Auth::guard('admin')->check();
        $this->item = Item::findOrFail($item);

        $this->menu = $this->menu();
    }

    public function setShow($show)
    {
        $this->show = $show;
    }

    public function menu()
    {
        return [
            [

                'name' => __('Sales'),
                'url' => route('admin.items.show', ['item' => $this->item->id, 'show' => 'sales']),
                'slug' => 'sales',
            ],
            [
                'name' => __('Inventories'),
                'url' => route('admin.items.show', ['item' => $this->item->id, 'show' => 'inventories', 'type' => 'all']),
                'slug' => 'inventories',
            ],
            [
                'name' => __('Products'),
                'url' => route('admin.items.show', ['item' => $this->item->id, 'show' => 'products']),
                'slug' => 'products',
            ],
        ];
    }

    #[Layout('layouts.admin-sidebar')]
    public function render()
    {
        return view('livewire.admin.items.show');
    }
}
