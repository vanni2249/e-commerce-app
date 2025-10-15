<?php

namespace App\Livewire\Admin\Sellers;

use App\Models\Seller;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public $seller;

    public function mount($seller)
    {
        $this->seller = Seller::findOrFail($seller);
    }

    #[Layout('components.layouts.admin')] 
    public function render()
    {
        return view('livewire.admin.sellers.show');
    }
}
