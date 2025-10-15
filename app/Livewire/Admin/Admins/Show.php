<?php

namespace App\Livewire\Admin\Admins;

use App\Models\Admin;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public $admin;

    public function mount($admin)
    {
        $this->admin = Admin::findOrFail($admin);
    }

    #[Layout('components.layouts.admin')] 
    public function render()
    {
        return view('livewire.admin.admins.show');
    }
}
