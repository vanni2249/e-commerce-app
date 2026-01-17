<?php

namespace App\Livewire\Admin\Users;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 10;
    
    #[Layout('layouts.admin-sidebar')] 
    public function render()
    {
        return view('livewire.admin.users.index', [
            'users' => \App\Models\User::when($this->search, function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%')
                      ->orWhere('email', 'like', '%'.$this->search.'%')
                      ->orWhere('number', 'like', '%'.$this->search.'%');
            })->paginate($this->perPage),
        ]);
    }
}
