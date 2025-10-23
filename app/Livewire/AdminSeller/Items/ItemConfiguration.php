<?php

namespace App\Livewire\AdminSeller\Items;

use Livewire\Component;

class ItemConfiguration extends Component
{
    public $item;

    public $seller;

    public $seller_id;

    public $sections = [];

    public $section_id;

    public $shops = [];

    public $shop_id;

    public $fulfillments = [];

    public $fulfillment_id;

    public function mount($item)
    {
        $this->item = $item;
        
        $this->seller_id = $this->item->seller_id;
        $this->shop_id = $this->item->shop_id;
        $this->fulfillment_id = $this->item->fulfillment_id;
        $this->section_id = $this->item->section_id;
        $this->seller = \App\Models\Seller::find($this->seller_id);
        $this->shops = $this->seller->shops()->wherePivot('is_active', true)->get();
        $this->fulfillments = $this->seller->fulfillments()->wherePivot('is_active', true)->get();
        $this->sections = \App\Models\Section::all();
    }
    public function handelConfigurationModal()
    {
        $this->dispatch('open-modal', 'item-configuration-modal');

    }

    public function saveConfiguration()
    {
        $this->validate([
            'shop_id' => 'required|exists:shops,id',
            'fulfillment_id' => 'required|exists:fulfillments,id',
            'section_id' => 'required|exists:sections,id',
        ]);

        $this->item->shop_id = $this->shop_id;
        $this->item->fulfillment_id = $this->fulfillment_id;    
        $this->item->section_id = $this->section_id;
        $this->item->save();

        $this->dispatch('close-modal', 'item-configuration-modal');
    }

    public function render()
    {
        return view('livewire.admin-seller.items.item-configuration', [
            'sections' => \App\Models\Section::all(),
        ]);
    }
}
