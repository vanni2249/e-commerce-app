<?php

namespace App\Livewire\Admin\Items;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Validation\Rule;


class Products extends Component
{
    public mixed $item;

    public string $sku = '';

    public $variants = [];

    public $combination;

    public $showCreateItemButton = false;

    public function mount($item)
    {
        $this->showCreateItemButton = $this->showCreateItemButton();
    }

    public function showCreateItemButton()
    {
        if ($this->item->attributes->isNotEmpty()) {
            return true;
        } else {
            if ($this->countProducts() === 1) {
                // Item has no attributes, only allow creating one product (hide button)
                return false;
            } else {
                // Item has no attributes, but already has products, so we can show the button
                return true;
            }
        }
        return false;
    }

    public function countProducts()
    {
        return $this->item->products()->count();
    }

    public function handleCreateItemModal()
    {
        $this->dispatch('open-modal', 'create-item-modal');
        $this->sku = '';

        $this->setVariant();
    }

    public function setVariant()
    {
        foreach ($this->item->attributes as $i => $attribute) {
            $this->variants[$i] = ['name' => ''];
        }
    }

    public function storeItem()
    {
        // $selectedVariantIds = collect($this->variants)->pluck('name')->filter()->unique()->toArray();
        // dd($selectedVariantIds);
        $rules = [
            'sku' => 'required',
        ];

        if (!empty($this->item->attributes) && count($this->item->attributes) > 0) {
            $rules['variants'] = 'required|array';
            $rules['variants.*.name'] = 'required';
            $rules['combination'] = Rule::requiredIf(function () {
                return $this->checkIfCombinationExists();
            });
        }

        $messages = [
            'required' => 'The :attribute field is required.',
            'combination.required' => 'Product variants already exist.',
        ];

        $this->validate($rules, $messages);

        $product = $this->item->products()->create([
            'sku' => $this->sku,
        ]);

        foreach ($this->variants as $variant) {
            $product->variants()->attach($variant['name']);
        }

        $this->showCreateItemButton = $this->showCreateItemButton();

        $this->dispatch('close-modal', 'create-item-modal');

        $this->reset(['sku', 'variants']);

        $this->dispatch('product-created');
    }

    protected function checkIfCombinationExists()
    {
        $query = $this->item->products();

        $collections = collect($this->variants)->pluck('name')->filter()->unique()->toArray();

        if (!empty($this->item->attributes)) {
            foreach ($collections as $i => $attribute) {
                $query->whereHas('variants', function ($query) use ($attribute) {
                    $query->where('variant_id', $attribute);
                });
            }
        }

        if ($query->exists()) {
            return true;
        }
        return false;
    }

    public function render()
    {
        return view('livewire.admin.items.products');
    }
}
