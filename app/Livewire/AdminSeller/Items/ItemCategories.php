<?php

namespace App\Livewire\AdminSeller\Items;

use App\Models\Category;
use Livewire\Component;

class ItemCategories extends Component
{
    public $item;
    public $categories = [];

    public $selectedCategories = [];

    public function mount($item)
    {
        $this->item = $item;
    }
    public function handleCategoriesModal()
    {
        $this->categories = Category::all();
        $this->selectedCategories = Category::all()->pluck("id")->toArray();
        $this->selectedCategories = $this->item->categories->pluck('id')->toArray();
        $this->dispatch('open-modal', 'sync-categories-modal');
    }

    public function syncCategories()
    {
        $this->item->categories()->sync($this->selectedCategories);

        $this->dispatch('close-modal', 'sync-categories-modal');
    }

    public function render()
    {
        return view('livewire.admin-seller.items.item-categories');
    }
}
