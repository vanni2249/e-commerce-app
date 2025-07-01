<?php

namespace App\Livewire\Admin\Items;

use App\Models\Category;
use Livewire\Component;

class AttachDetachCategories extends Component
{
    public $item;

    public $categories;

    public $selectedCategories = [];

    public function mount($item)
    {
        $this->item = $item;
        $this->categories = Category::all();
        $this->selectedCategories = $item->categories->pluck('id')->toArray();
    }

    public function sync()
    {

        $this->item->categories()->sync($this->selectedCategories);

        session()->flash('message', 'Categories attached successfully.');

        $this->redirect(route('admin.items.show', $this->item->id . '#categories'));
    }

    public function render()
    {
        return view('livewire.admin.items.attach-detach-categories');
    }
}
