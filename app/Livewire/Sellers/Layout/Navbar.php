<?php

namespace App\Livewire\Sellers\Layout;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{

    public $user;
    public $initialName;
    
    public function mount()
    {
        $this->user = Auth::user();
        $this->initialName = $this->user->getInitialName();
    }
    public function render()
    {
        return view('livewire.sellers.layout.navbar');
    }
}
