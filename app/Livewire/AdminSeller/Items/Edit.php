<?php

namespace App\Livewire\AdminSeller\Items;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Item;
use App\Traits\ProductNumber;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class Edit extends Component
{
    use ProductNumber;

    public $admin;
    public $item;
    public $section_id;
    public $en_title;
    public $es_title;
    public $en_short_description;
    public $es_short_description;
    public $en_description;
    public $es_description;
    public $en_specifications = [];
    public $new_en_specification = [];
    public $es_specifications = [];
    public $new_es_specification = [];
    public $en_shipping_policy;
    public $es_shipping_policy;
    public $en_return_policy;
    public $es_return_policy;
    public $categories;
    public $selectedCategories = [];
    public $attrs;
    public $selectedAttributes = [];
    public $attribute_id;
    public $en_name;
    public $es_name;
    public $variant;
    public $variant_id;
    public $sku;
    public $variants = [];
    public $is_active;
    public $approved_by;
    public $approved_at;
    public $available_at;
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
        $this->item = Item::with(['seller', 'seller.user'])->findOrFail($item);
        $this->section_id = $this->item->section_id;
        $this->en_title = $this->item->en_title;
        $this->es_title = $this->item->es_title;
        $this->en_short_description = $this->item->en_short_description;
        $this->es_short_description = $this->item->es_short_description;
        $this->en_description = $this->item->en_description;
        $this->es_description = $this->item->es_description;
        $this->en_specifications = $this->item->en_specifications ?? [];
        $this->es_specifications = $this->item->es_specifications ?? [];
        $this->en_shipping_policy = $this->item->en_shipping_policy;
        $this->es_shipping_policy = $this->item->es_shipping_policy;
        $this->en_return_policy = $this->item->en_return_policy;
        $this->es_return_policy = $this->item->es_return_policy;
        $this->is_active = $this->item->is_active;
        $this->approved_by = $this->item->approvedBy->name ?? '';
        $this->approved_at = $this->item->approved_at;
        $this->available_at = $this->item->available_at;

        $this->showCreateProductButton = $this->showCreateProductButton();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'section_id' => 'required|exists:sections,id',
            'en_title' => 'required|string|max:255',
            'es_title' => 'required|string|max:255',
            'en_short_description' => 'nullable|string|max:120',
            'es_short_description' => 'nullable|string|max:120',
            'en_description' => 'nullable|string',
            'es_description' => 'nullable|string',
            'en_specifications' => 'nullable|array',
            'es_specifications' => 'nullable|array',
            'en_shipping_policy' => 'nullable|string',
            'es_shipping_policy' => 'nullable|string',
            'en_return_policy' => 'nullable|string',
            'es_return_policy' => 'nullable|string',
        ]);

        $this->item->update([
            'section_id' => $this->section_id,
            'en_title' => $this->en_title,
            'es_title' => $this->es_title,
            'en_short_description' => $this->en_short_description,
            'es_short_description' => $this->es_short_description,
            'en_description' => $this->en_description,
            'es_description' => $this->es_description,
            'en_specifications' => $this->en_specifications,
            'es_specifications' => $this->es_specifications,
            'en_shipping_policy' => $this->en_shipping_policy,
            'es_shipping_policy' => $this->es_shipping_policy,
            'en_return_policy' => $this->en_return_policy,
            'es_return_policy' => $this->es_return_policy,
        ]);
    }

    public function addEnglishSpecification()
    {
        $this->validate([
            'new_en_specification.label' => 'required|string|max:100',
            'new_en_specification.value' => 'required|string|max:255',
        ]);

        $this->en_specifications[] = [
            'label' => $this->new_en_specification['label'],
            'value' => $this->new_en_specification['value'],
        ];

        $this->item->update([
            'en_specifications' => $this->en_specifications,
        ]);

        $this->new_en_specification = [];

        $this->dispatch('close-modal', 'new_en_specification-modal');
    }

    public function removeEnglishSpecification($index)
    {
        if (isset($this->en_specifications[$index])) {
            unset($this->en_specifications[$index]);
            $this->en_specifications = array_values($this->en_specifications); // Reindex the array

            $this->item->update([
                'en_specifications' => $this->en_specifications,
            ]);
        }
    }

    public function addSpanishSpecification()
    {
        $this->validate([
            'new_es_specification.label' => 'required|string|max:100',
            'new_es_specification.value' => 'required|string|max:255',
        ]);

        $this->es_specifications[] = [
            'label' => $this->new_es_specification['label'],
            'value' => $this->new_es_specification['value'],
        ];

        $this->item->update([
            'es_specifications' => $this->en_specifications,
        ]);

        $this->new_es_specification = [];

        $this->dispatch('close-modal', 'new_es_specification-modal');
    }

    public function removeSpanishSpecification($index)
    {
        if (isset($this->es_specifications[$index])) {
            unset($this->es_specifications[$index]);
            $this->es_specifications = array_values($this->es_specifications); // Reindex the array

            $this->item->update([
                'es_specifications' => $this->es_specifications,
            ]);
        }
    }

    public function handleCategoriesModal()
    {
        $this->categories = Category::all();
        $this->selectedCategories = $this->item->categories->pluck('id')->toArray();
        $this->dispatch('open-modal', 'sync-categories-modal');
    }

    public function syncCategories()
    {
        $this->item->categories()->sync($this->selectedCategories);

        $this->dispatch('close-modal', 'sync-categories-modal');
    }

    public function handleAttributesModal()
    {
        $this->dispatch('open-modal', 'sync-attributes-modal');
        $this->attrs = Attribute::all();
        $this->selectedAttributes = $this->item->attributes->pluck('id')->toArray();
    }

    public function syncAttributes()
    {
        $this->item->attributes()->sync($this->selectedAttributes);
        $this->dispatch('close-modal', 'sync-attributes-modal');
    }

    public function handleVariantModal($attribute_id)
    {
        $this->attribute_id = $attribute_id;
        $this->dispatch('open-modal', 'create-variant-modal');
    }

    public function storeVariant()
    {
        $this->validate([
            'en_name' => 'required|string|max:10',
            'es_name' => 'nullable|string|max:10',
        ]);

        // Logic to create a new variant for the item
        $this->item->variants()->create([
            'attribute_id' => $this->attribute_id,
            'en_name' => $this->en_name,
            'es_name' => $this->es_name,
        ]);

        $this->reset('en_name', 'es_name');
    }

    public function deleteVariant($variantId)
    {
        $variant = $this->item->variants()->find($variantId);
        if ($variant) {
            $variant->delete();
        }
    }

    public function handleEditVariantModal($variantId)
    {
        $this->variant = $this->item->variants()->find($variantId);
        if ($this->variant) {
            $this->variant_id = $this->variant->id;
            $this->en_name = $this->variant->en_name;
            $this->es_name = $this->variant->es_name;
            $this->attribute_id = $this->variant->attribute_id;
            $this->dispatch('open-modal', 'edit-variant-modal');
        }
    }

    public function updateVariant()
    {
        $this->validate([
            'en_name' => 'required|string|max:10',
        ]);

        if ($this->variant) {
            $this->variant->update([
                'attribute_id' => $this->attribute_id,
                'en_name' => $this->en_name,
                'es_name' => $this->es_name,
            ]);
        }

        $this->reset(['en_name', 'es_name']);
        $this->dispatch('close-modal', 'edit-variant-modal');
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
        return false;
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
        $this->product = $this->item->products()->find($productId)->first();
        if ($this->product) {
            $this->dispatch('open-modal', 'delete-product-modal');
        }
    }

    public function deleteProduct()
    {
        if ($this->product) {
            $this->product->variants()->detach();
            $this->product->delete();
            $this->product = null;
            $this->showCreateProductButton = $this->showCreateProductButton();
            $this->dispatch('close-modal', 'delete-product-modal');
        }
    }

    public function approveItem()
    {
        $this->validate([
            'available_at' => 'required'
        ]);


        $this->item->update([
            'is_active' => true,
            'approved_by' => Auth::guard('admin')->user()->id,
            'approved_at' => now(),
            'available_at' => $this->available_at,
        ]);

        $this->is_active = $this->item->is_active;
        $this->approved_by = $this->item->approvedBy->name ?? '';
        $this->approved_at = $this->item->approved_at;
        $this->available_at = $this->item->available_at;

        $this->dispatch('close-modal', 'approved-modal');
    }

    public function setAvailableAt()
    {
        $this->item->update([
            'available_at' => $this->available_at,
        ]);

        $this->available_at = $this->item->available_at;

        $this->dispatch('close-modal', 'available-at-modal');
    }

    public function render()
    {
        return view('livewire.admin-seller.items.edit', [
            'sections' => \App\Models\Section::all(),

        ])->layout(Auth::guard('admin')->check() ? 'components.layouts.admin' : 'components.layouts.seller');
    }
}
