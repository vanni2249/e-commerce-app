<?php

namespace App\Livewire\AdminSeller\Items;

use Livewire\Component;

class ItemShortDescription extends Component
{
    public $item;

    public $en_short_description;

    public $es_short_description;

    public function mount($item)
    {
        $this->item = $item;
        $this->en_short_description = $item->getTranslations('short_description')['en'] ?? '';
        $this->es_short_description = $item->getTranslations('short_description')['es'] ?? '';
    }

    public function saveShortDescription()
    {
        $this->item->setTranslation('short_description', 'en', $this->en_short_description);
        $this->item->setTranslation('short_description', 'es', $this->es_short_description);
        $this->item->save();

        $this->dispatch('close-modal', 'edit-short-description-modal');

    }
    public function render()
    {
        return view('livewire.admin-seller.items.item-short-description');
    }
}
