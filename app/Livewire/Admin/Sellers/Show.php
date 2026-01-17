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

    public function verifySeller()
    {
        $this->seller->is_active = true;
        $this->seller->is_verified = true;
        $this->seller->verified_at = now();
        $this->seller->verified_by = auth()->guard('admin')->user()->id;
        $this->seller->save();

        session()->flash('message', 'Seller verified successfully.');
        $this->dispatch('close-modal', 'verify-seller-modal');
    }

    #[Layout('layouts.admin')] 
    public function render()
    {
        return view('livewire.admin.sellers.show');
    }
}
