<?php

namespace App\Livewire\Sellers\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('components.layouts.seller')] 
    public function render()
    {
        return view('livewire.sellers.dashboard.index');
    }
}
