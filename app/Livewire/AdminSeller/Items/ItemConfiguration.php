<?php

namespace App\Livewire\AdminSeller\Items;

use Livewire\Component;

class ItemConfiguration extends Component
{
    public $item;

    public $section_id;

    public function mount($item)
    {   
        $this->item = $item;
        $this->section_id = $item->section_id;
    }

    public function saveConfiguration()
    {
        $this->validate([
            'section_id' => 'required|exists:sections,id',
        ]);
        $this->item->section_id = $this->section_id;
        $this->item->save();

        $this->dispatch('close-modal', 'business-seller-modal');
    }

    public function render()
    {
        return view('livewire.admin-seller.items.item-configuration', [
            'sections' => \App\Models\Section::all(),
        ]);
    }
}
