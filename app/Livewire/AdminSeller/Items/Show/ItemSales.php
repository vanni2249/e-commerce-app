<?php

namespace App\Livewire\AdminSeller\Items\Show;

use App\Models\Sale;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class ItemSales extends Component
{
    public $item;

    public $search;

    public $perPage = 24;

    public function mount($item)
    {
        $this->item = $item;
    }

    public function placeholder()
    {
        return view('placeholders.table-skeleton');
    }

    public function render()
    {
        return view('livewire.admin-seller.items.show.item-sales', [
            'sales' => Sale::with(['product','product.item', 'product.item.seller'])
                ->whereHas('product', function ($query) {
                    $query->where('item_id', $this->item->id);
                })
                ->paginate($this->perPage),
        ]);
    }
}
