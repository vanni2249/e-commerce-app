<?php

namespace App\Livewire\Users\Welcome;

use App\Models\Item;
use Livewire\Component;

class NewItems extends Component
{
    public $items;

    public function mount()
    {
        $this->items = Item::with(['category', 'products'])->take(12)->get();
    }

    public function render()
    {
        return view('livewire.users.welcome.new-items', [
            'items' => $this->items,
        ]);
    }
}
