<?php

namespace App\Livewire\Admin\Items;

use App\Models\Item;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public $item_id;

    public function mount($item)
    {
        $this->item_id = $item;

    }

    #[Layout('components.layouts.admin')] 
    public function render()
    {
        return view('livewire.admin.items.show', [
            'item' => Item::with(['seller'])->find($this->item_id),
        ]);
    }
}
