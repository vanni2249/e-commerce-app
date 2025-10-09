<?php

namespace App\Livewire\Admin\Layout;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $admin;
    public $initialName;
    
    public function mount()
    {
        $this->admin = Auth::guard('admin')->user()->name;
        $this->initialName = Auth::guard('admin')->user()->getInitialName();
    }
    public function render()
    {
        return view('livewire.admin.layout.navbar');
    }
}
