<?php

namespace App\Livewire\Users\Favorites;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    #[Layout('layouts.user')] 
    public function render()
    {
        return view('livewire.users.favorites.show');
    }
}
