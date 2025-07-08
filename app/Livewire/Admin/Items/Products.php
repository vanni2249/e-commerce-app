<?php

namespace App\Livewire\Admin\Items;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Products extends Component
{
    public mixed $item;

    #[Validate(['required'])]
    public string $sku = '';

    public $variants = [];


    public function handleCreateItemModal()
    {
        $this->dispatch('open-modal', 'create-item-modal');

        foreach ($this->item->attributes as $i => $attribute) {
            $this->variants[$i] = ['name' => ''];
        }
    }

    public function storeItem()
    {
        $rules = [
            'sku' => 'required',
        ];

        // Only require variants if the item has attributes
        if (!empty($this->item->attributes) && count($this->item->attributes) > 0) {
            $rules['variants'] = 'required|array';
            $rules['variants.*.name'] = 'required';
        }

        $messages = [
            'required' => 'The :attribute field is required.',
        ];

        $this->validate($rules, $messages);

        $product = $this->item->products()->create([
            'sku' => $this->sku,
        ]);

        foreach ($this->variants as $variant) {
            $product->variants()->attach($variant['name']);
        }

        $this->dispatch('close-modal', 'create-item-modal');
    }

    public function render()
    {
        return view('livewire.admin.items.products', [
            'products' => $this->item->products,
        ]);
    }
}
