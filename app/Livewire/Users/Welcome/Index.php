<?php

namespace App\Livewire\Users\Welcome;

use App\Models\Category;
use App\Models\Item;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('components.layouts.customer')] 
    public function render()
    {
        return view('livewire.users.welcome.index',[
            'categories' => Category::all(),
            'items' => Item::with(['products'])->take(12)->get()
        ]);
    }
}
