<?php

namespace App\Livewire\AdminSeller\Items;

use Livewire\Component;

class ItemLongDescription extends Component
{

    public $item;

    public $en_long_description;

    public $es_long_description;

    public function mount($item)
    {
        $this->item = $item;
        $this->en_long_description = $item->getTranslations('long_description')['en'] ?? '';
        $this->es_long_description = $item->getTranslations('long_description')['es'] ?? '';
    }

    public function saveLongDescription()
    {
        $this->item->setTranslation('long_description', 'en', $this->en_long_description);
        $this->item->setTranslation('long_description', 'es', $this->es_long_description);
        $this->item->save();

        $this->dispatch('close-modal', 'edit-long-description-modal');

    }
    public function render()
    {
        return view('livewire.admin-seller.items.item-long-description');
    }
}
