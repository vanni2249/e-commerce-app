<?php

namespace App\Livewire\Admin\Items;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    #[Layout('components.layouts.admin')] 
    public function render()
    {
        return view('livewire.admin.items.edit');
    }
}
