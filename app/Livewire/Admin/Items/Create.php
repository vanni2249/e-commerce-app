<?php

namespace App\Livewire\Admin\Items;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    #[Layout('layouts.admin-sidebar')] 
    public function render()
    {
        return view('livewire.admin.items.create');
    }
}
