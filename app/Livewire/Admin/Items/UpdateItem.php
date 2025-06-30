<?php

namespace App\Livewire\Admin\Items;

use App\Models\Section;
use App\Models\Seller;
use Livewire\Component;

class UpdateItem extends Component
{
    public $sections;

    public $sellers;

    public $item;

    public $seller_id;

    public $section_id;

    public $title;

    public $sku;

    public $description;

    public $specification;

    public function mount($item)
    {
        $this->sections = Section::all();
        $this->sellers = Seller::all();
        $this->item = $item;
        $this->seller_id = $item->seller_id;
        $this->section_id = $item->section_id;
        $this->title = $item->title;
        $this->sku = $item->sku;
        $this->description = $item->description;
        $this->specification = $item->specification;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'sku' => 'max:255',
            'description' => 'required|string',
            'specification' => 'nullable|string',
            'seller_id' => 'required|exists:sellers,id',
            'section_id' => 'required|exists:categories,id',
        ]);

        $this->item->update([
            'title' => $this->title,
            'sku' => $this->sku,
            'description' => $this->description,
            'specification' => $this->specification,
            'seller_id' => $this->seller_id,
            'section_id' => $this->section_id,
        ]);

        session()->flash('message', 'Item updated successfully.');
        
        $this->redirect(route('admin.items.show', $this->item->id . '#detail'));
    }

    public function render()
    {
        return view('livewire.admin.items.update-item');
    }
}
