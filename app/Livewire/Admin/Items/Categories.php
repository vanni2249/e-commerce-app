<?php

namespace App\Livewire\Admin\Items;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $item;

    public $categories;

    public $selectedCategories = [];

    public function handleCategoriesModal()
    {
        $this->categories = Category::all();
        $this->selectedCategories = $this->item->categories->pluck('id')->toArray();
        $this->dispatch('open-modal', 'sync-categories-modal');
    }

    public function sync()
    {
        $this->item->categories()->sync($this->selectedCategories);

        $this->dispatch('close-modal', 'sync-categories-modal');
    }

    public function render()
    {
        return view('livewire.admin.items.categories');
    }
}
