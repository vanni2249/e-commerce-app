<?php

namespace App\Livewire\Admin\Admins;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $perPage = 10;

    #[Layout('components.layouts.admin')] 
    public function render()
    {
        return view('livewire.admin.admins.index', [
            'admins' => \App\Models\Admin::when('search', function ($search) {

                $search->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })->paginate($this->perPage),
        ]);
    }
}
