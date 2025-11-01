<?php

namespace App\Livewire\AdminSeller\Items\Show;

use App\Models\Inventory;
use Livewire\Attributes\Url;
use Livewire\Component;

class ItemInventories extends Component
{
    public $item;

    public $search;

    public $types;

    #[Url]
    public $type = '';

    public $perPage = 24;

    public function mount($item)
    {
        $this->item = $item;
        $this->types = $this->types();
        $this->type = 'all';
    }

    public function placeholder()
    {
        return view('placeholders.table-skeleton');
    }

    public function types()
    {
        return [
            [
                'name' => __('All Types'),
                'value' => 'all',
            ],
            [
                'name'=> __('Purchase'),
                'value' => 'purchase',
            ],
            [
                'name'=> __('Return'),
                'value'=> 'return',
            ],
            [
                'name'=> __('Damage'),
                'value'=> 'damage',
            ],
            [
                'name'=> __('Adjustment'),
                'value'=> 'adjustment',
            ],
        ];
    }

    public function setType($type)
    {
        $this->type = $type;
    } 

    public function render()
    {
        return view('livewire.admin-seller.items.show.item-inventories', [
            'inventories' => Inventory::with(['product','product.item' ])
                ->whereHas('product', function ($query) {
                    $query->where('item_id', $this->item->id);
                })
                ->where('type', '=', 'purchase')
                ->when($this->type != 'all', function ($query) {
                    $query->where('type', $this->type);
                })
                ->paginate($this->perPage),
        ]);
    }
}
