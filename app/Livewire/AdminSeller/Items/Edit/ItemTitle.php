<?php

namespace App\Livewire\AdminSeller\Items\Edit;

use Livewire\Component;

class ItemTitle extends Component
{
    public $item;

    public $en_title;

    public $es_title;

    public function mount($item)
    {
        $this->item = $item;
        $this->en_title = $item->getTranslations('title')['en'] ?? '...';
        $this->es_title = $item->getTranslations('title')['es'] ?? '...';
    }

    public function saveTitle()
    {
        $this->item->setTranslation('title', 'en', $this->en_title);
        $this->item->setTranslation('title', 'es', $this->es_title);
        $this->item->save();

        $this->dispatch('close-modal', 'edit-title-modal');

    }


    public function render()
    {
        return view('livewire.admin-seller.items.edit.item-title');
    }
}
