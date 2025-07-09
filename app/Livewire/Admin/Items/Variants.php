<?php

namespace App\Livewire\Admin\Items;

use App\Models\Attribute;
use Livewire\Attributes\On;
use Livewire\Component;

class Variants extends Component
{
    public $item;

    public $attrs;

    public $selectedAttributes = [];

    public $attribute_id;

    public $en_name;

    public $es_name;

    public $variant;

    public $variant_id;

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
        ]);

        // Logic to create a new variant for the item
        $this->item->variants()->create([
            'attribute_id' => $this->attribute_id,
            'en_name' => $this->en_name,
            'es_name' => $this->es_name,
        ]);

        $this->reset('en_name');
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

    #[On('product-created')]
    public function render()
    {
        return view('livewire.admin.items.variants',[
            'attributes' => $this->item->attributes()->with(['variants' => function ($query) {
                $query->where('item_id', $this->item->id);
            }])->get(),
        ]);
    }
}
