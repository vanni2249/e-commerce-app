<?php

namespace App\Livewire\Users\Favorites;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    #[Layout('components.layouts.customer')] 
    public function render()
    {
        return view('livewire.users.favorites.show');
    }
}
