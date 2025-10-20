<?php

namespace App\Livewire\AdminSeller\Items;

use Livewire\Component;

class ItemDescription extends Component
{
     public $item;

    public $en_description;

    public $es_description;

    public function mount($item)
    {
        $this->item = $item;
        $this->en_description = $item->getTranslations('description')['en'] ?? '...';
        $this->es_description = $item->getTranslations('description')['es'] ?? '...';
    }

    public function saveDescription()
    {
        $this->item->setTranslation('description', 'en', $this->en_description);
        $this->item->setTranslation('description', 'es', $this->es_description);
        $this->item->save();

        $this->dispatch('close-modal', 'edit-description-modal');

    }
    public function render()
    {
        return view('livewire.admin-seller.items.item-description');
    }
}
