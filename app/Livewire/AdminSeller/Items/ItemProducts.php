<?php

namespace App\Livewire\AdminSeller\Items;

use App\Traits\ProductNumber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class ItemProducts extends Component
{
    use ProductNumber;

    public $admin;
    public $item;
    public $product_sku = '';
    public $product_variants = [];
    public $product_combination;
    public $product_price;
    public $product_shipping_cost;
    public $product;
    public $showCreateProductButton = false;

    public function mount($item)
    {
        $this->admin = Auth::guard('admin')->check();
        $this->item = $item;

        $this->showCreateProductButton = $this->showCreateProductButton();
    }

    public function handleCreateProductModal()
    {
        $this->dispatch('open-modal', 'create-item-modal');
        $this->product_sku = '';

        $this->setProductVariant();
    }

    public function setProductVariant()
    {
        foreach ($this->item->attributes as $i => $attribute) {
            $this->product_variants[$i] = ['name' => ''];
        }
    }

    public function showCreateProductButton()
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
    }

    public function countProducts()
    {
        return $this->item->products()->count();
    }

    public function storeProduct()
    {
        $rules = [
            'product_sku' => 'required',
            'product_price' => 'required|numeric|min:0',
            'product_shipping_cost' => 'required|numeric|min:0',
        ];

        if (!empty($this->item->attributes) && count($this->item->attributes) > 0) {
            $rules['product_variants'] = 'required|array';
            $rules['product_variants.*.id'] = 'required|exists:variants,id';
        }

        $messages = [
            'required' => 'The :attribute field is required.',
            'product_variants.*.id.required' => 'Each variant must be selected.',
            'product_variants.*.id.exists' => 'Invalid variant selected.',
        ];

        $this->validate($rules, $messages);

        if (!empty($this->item->attributes) && $this->checkIfProductCombinationExists()) {
            throw ValidationException::withMessages([
                'combination' => 'Product variants already exist.',
            ]);
        }

        $product = $this->item->products()->create([
            'number' => $this->createProductNumber(),
            'sku' => $this->product_sku,
            'price' => $this->product_price,
            'shipping_cost' => $this->product_shipping_cost,
        ]);

        foreach ($this->product_variants as $variant) {
            $product->variants()->attach($variant['id']);
        }

        $this->showCreateProductButton = $this->showCreateProductButton();

        $this->dispatch('close-modal', 'create-item-modal');

        $this->dispatch('product-created');

        $this->reset(['product_sku', 'product_variants', 'product_combination', 'product_price', 'product_shipping_cost']);
    }

    protected function checkIfProductCombinationExists()
    {
        $variantIds = collect($this->product_variants)->pluck('id')->filter()->unique()->toArray();

        if (empty($variantIds)) {
            return false;
        }

        $query = $this->item->products();

        $query->whereHas('variants', function ($q) use ($variantIds) {
            $q->whereIn('variant_id', $variantIds);
        }, '=', count($variantIds));

        return $query->exists();
    }

    public function handleProductEditModal($productId)
    {
        $this->dispatch('open-modal', 'edit-product-modal');
        $this->product = $this->item->products()->with('variants')->find($productId);
        if ($this->product) {
            $this->product_sku = $this->product->sku;
            $this->product_price = $this->product->price;
            $this->product_shipping_cost = $this->product->shipping_cost;
            $this->product_variants = [];

            foreach ($this->item->attributes as $i => $attribute) {
                $this->product_variants[$i] = ['id' => ''];
            }

            foreach ($this->product->variants as $variant) {
                $index = $this->item->attributes->search(function ($attr) use ($variant) {
                    return $attr->id === $variant->attribute_id;
                });
                if ($index !== false) {
                    $this->product_variants[$index] = ['id' => $variant->id];
                }
            }

            $this->product_combination = $this->product->variants->pluck('id')->toArray();
        }
    }

    public function updateProduct()
    {
        $rules = [
            'product_sku' => 'required',
            'product_price' => 'required|numeric|min:0',
            'product_shipping_cost' => 'required|numeric|min:0',
        ];

        if (!empty($this->item->attributes) && count($this->item->attributes) > 0) {
            $rules['product_variants'] = 'required|array';
            $rules['product_variants.*.id'] = 'required|exists:variants,id';
        }

        $messages = [
            'required' => 'The :attribute field is required.',
            'product_variants.*.id.required' => 'Each variant must be selected.',
            'product_variants.*.id.exists' => 'Invalid variant selected.',
        ];

        $this->validate($rules, $messages);

        $product = $this->item->products()->find($this->product)->first();

        if ($product) {
            if (!empty($this->item->attributes) && $this->checkIfProductCombinationExistsForUpdate($product)) {
                throw ValidationException::withMessages([
                    'combination' => 'Product variants already exist.',
                ]);
            }

            $product->update([
                'sku' => $this->product_sku,
                'price' => $this->product_price,
                'shipping_cost' => $this->product_shipping_cost,
            ]);

            $variantIds = collect($this->product_variants)->pluck('id')->filter()->unique()->toArray();
            $product->variants()->sync($variantIds);
        }

        $this->reset(['product_sku', 'product_variants', 'product_combination', 'product_price', 'product_shipping_cost']);
        $this->dispatch('close-modal', 'edit-product-modal');
    }

    public function checkIfProductCombinationExistsForUpdate($product)
    {
        $variantIds = collect($this->product_variants)->pluck('id')->filter()->unique()->toArray();

        if (empty($variantIds)) {
            return false;
        }

        $query = $this->item->products()->where('id', '!=', $product->id);

        $query->whereHas('variants', function ($q) use ($variantIds) {
            $q->whereIn('variant_id', $variantIds);
        }, '=', count($variantIds));

        return $query->exists();
    }

    public function handleProductDeleteModal($productId)
    {
        $this->product = $this->item->products()->find($productId);
        if ($this->product) {
            $this->dispatch('open-modal', 'delete-product-modal');
        }
    }

    public function deleteProduct()
    {
        if ($this->product) {
            try {
                // Check if product has sales - prevent deletion if it has sales history
                if ($this->product->sales()->exists()) {
                    session()->flash('error', 'Cannot delete product with sales history.');
                    return;
                }
                if ($this->product->inventories()->exists()) {
                    // dd($this->product->inventories()->first());
                    session()->flash('error', 'Cannot delete product with inventory. Please remove the inventory before deleting the product.');
                    return;
                }
                
                // Detach all variants from this product (remove from pivot table)
                $this->product->variants()->detach();
                
                // Delete the product
                $this->product->delete();
                
                // Reset the property
                $this->product = null;
                
                // Update button visibility
                $this->showCreateProductButton = $this->showCreateProductButton();
                
                // Close modal and dispatch events
                $this->dispatch('close-modal', 'delete-product-modal');
                $this->dispatch('product-deleted');
                
                session()->flash('success', 'Product deleted successfully.');
                
            } catch (\Exception $e) {
                // Handle any errors during deletion
                session()->flash('error', 'Failed to delete product: ' . $e->getMessage());
            }
        }
    }

    public function render()
    {
        return view('livewire.admin-seller.items.item-products');
    }
}
