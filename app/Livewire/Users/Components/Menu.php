<?php

namespace App\Livewire\Users\Components;

use App\Models\Category;
use Livewire\Component;

class Menu extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.users.components.menu', [
            'categories' => $this->categories,
        ]);
    }
}
