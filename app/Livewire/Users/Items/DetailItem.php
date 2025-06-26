<?php

namespace App\Livewire\Users\Items;

use App\Models\Item;
use Livewire\Component;

class DetailItem extends Component
{
    public $item;
    public $product;
    public $productId;
    public $stock;
    public $quantity = 1;
    public $price;
    public $shippingCost;

    public function mount($item)
    {
        $this->item = Item::with('category', 'products')->find($item);
        $this->product = $this->item->products()->first();
        $this->productId = $this->product->id;
        $this->stock = $this->product->stock() > 10 ? 10 : $this->product->stock();
        $this->price = $this->product->price;
        $this->shippingCost = $this->product->shipping_cost;
    }
    public function render()
    {
        return view('livewire.users.items.detail-item');
    }
}
