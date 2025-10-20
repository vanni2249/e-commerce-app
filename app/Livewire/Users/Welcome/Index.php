<?php

namespace App\Livewire\Users\Welcome;

use App\Models\Category;
use App\Models\Item;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $sessionId;
    public function mount()
    {
        $this->sessionId = session()->get('visitor-session');
    }
    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.welcome.index', [
            'categories' => Category::all(),
            'items' => Item::with(['products'])
                ->showAccepted()
                ->take(6)->get()
        ]);
    }
}
