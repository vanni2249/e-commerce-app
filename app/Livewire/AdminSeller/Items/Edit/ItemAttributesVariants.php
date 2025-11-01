<?php

namespace App\Livewire\AdminSeller\Items\Edit;

use App\Models\Attribute;
use Livewire\Attributes\On;
use Livewire\Component;

class ItemAttributesVariants extends Component
{
    public $item;

    public $attrs;
    public $selectedAttributes = [];
    public $attribute_id;

    public $variant;

    public $en_name;

    public $es_name;

    #[On("product-created")]
    public function mount()
    {
        // $this->item = $item;
        $this->attrs = $this->item->attributes;
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
            'name' => [
                'en' => $this->en_name,
                'es' => $this->es_name,
            ],
        ]);

        $this->reset('en_name', 'es_name');
        $this->dispatch('close-modal', 'create-variant-modal');
    }

    public function handleDeleteVariantModal($variantId)
    {
        $this->variant = $this->item->variants()->find($variantId);
        if ($this->variant) {
            $this->dispatch('open-modal', 'delete-variant-modal');
        }
    }

    public function deleteVariant()
    {
        if (!$this->variant) {
            return;
        }
        $this->variant->delete();

        $this->dispatch('close-modal', 'delete-variant-modal');
    }

    public function handleEditVariantModal($variantId)
    {
        $this->variant = $this->item->variants()->find($variantId);
        if ($this->variant) {
            $this->variant_id = $this->variant->id;
            $this->en_name = $this->variant->getTranslation('name', 'en');
            $this->es_name = $this->variant->getTranslation('name', 'es');
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
                'name' => [
                    'en' => $this->en_name,
                    'es' => $this->es_name,
                ],
            ]);
        }

        $this->reset(['en_name', 'es_name']);
        $this->dispatch('close-modal', 'edit-variant-modal');
    }

    public function render()
    {
        return view('livewire.admin-seller.items.edit.item-attributes-variants');
    }
}
