<?php

namespace App\Livewire\AdminSeller\Items\Edit;

use Livewire\Component;

class ItemShippingPolicy extends Component
{
    public $item;

    public $en_shipping_policy;

    public $es_shipping_policy;

    public function mount($item)
    {
        $this->item = $item;
        $this->en_shipping_policy = $item->getTranslations('shipping_policy')['en'] ?? '...';
        $this->es_shipping_policy = $item->getTranslations('shipping_policy')['es'] ?? '...';
    }

    public function saveShippingPolicy()
    {
        $this->item->setTranslation('shipping_policy', 'en', $this->en_shipping_policy);
        $this->item->setTranslation('shipping_policy', 'es', $this->es_shipping_policy);
        $this->item->save();

        $this->dispatch('close-modal', 'edit-shipping-policy-modal');

    }
    public function render()
    {
        return view('livewire.admin-seller.items.edit.item-shipping-policy');
    }
}
