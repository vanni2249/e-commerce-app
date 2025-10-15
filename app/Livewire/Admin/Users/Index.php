<?php

namespace App\Livewire\Admin\Users;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    #[Layout('components.layouts.admin')] 
    public function render()
    {
        return view('livewire.admin.users.index', [
            'users' => \App\Models\User::paginate(10),
        ]);
    }
}
