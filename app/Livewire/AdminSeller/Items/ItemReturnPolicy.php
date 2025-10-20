<?php

namespace App\Livewire\AdminSeller\Items;

use Livewire\Component;

class ItemReturnPolicy extends Component
{
    public $item;

    public $en_return_policy;

    public $es_return_policy;

    public function mount($item)
    {
        $this->item = $item;
        $this->en_return_policy = $item->getTranslations('return_policy')['en'] ?? '...';
        $this->es_return_policy = $item->getTranslations('return_policy')['es'] ?? '...';
    }

    public function saveReturnPolicy()
    {
        $this->item->setTranslation('return_policy', 'en', $this->en_return_policy);
        $this->item->setTranslation('return_policy', 'es', $this->es_return_policy);
        $this->item->save();

        $this->dispatch('close-modal', 'edit-return-policy-modal');

    }
    public function render()
    {
        return view('livewire.admin-seller.items.item-return-policy');
    }
}
