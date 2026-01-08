<?php

namespace App\Livewire\Users\ThankYou;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.user')]
    public function render()
    {
        return view('livewire.users.thank-you.index');
    }
}
