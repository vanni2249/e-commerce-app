<?php

namespace App\Livewire\Admin\Items;

use App\Models\Section;
use App\Models\Seller;
use Livewire\Component;

class Details extends Component
{
    public $item;

    public $sections;

    public $sellers;

    public $seller_id;

    public $section_id;

    public $title;

    public $sku;

    public $description;

    public $specification;

    public function handleEditItemModal()
    {
        $this->sections = Section::all();
        $this->sellers = Seller::all();
        $this->seller_id = $this->item->seller_id;
        $this->section_id = $this->item->section_id;
        $this->title = $this->item->title;
        $this->sku = $this->item->sku;
        $this->description = $this->item->description;
        $this->specification = $this->item->specification;

        $this->dispatch('open-modal', 'edit-item-modal');
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'sku' => 'max:255',
            'description' => 'required|string',
            'specification' => 'nullable|string',
            'seller_id' => 'required|exists:sellers,id',
            'section_id' => 'required|exists:sections,id',
        ]);

        $this->item->update([
            'title' => $this->title,
            'sku' => $this->sku,
            'description' => $this->description,
            'specification' => $this->specification,
            'seller_id' => $this->seller_id,
            'section_id' => $this->section_id,
        ]);

        $this->dispatch('close-modal', 'edit-item-modal');
    }

    public function render()
    {
        return view('livewire.admin.items.details');
    }
}
