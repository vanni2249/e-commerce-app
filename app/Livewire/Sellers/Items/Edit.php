<?php

namespace App\Livewire\Sellers\Items;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    #[Layout('components.layouts.seller')] 
    public function render()
    {
        return view('livewire.sellers.items.edit');
    }
}
