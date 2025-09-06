<?php

namespace App\Livewire\AdminSeller\Items;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $item;

    public function mount($item)
    {
        $this->item = Item::findOrFail($item);
    }

    public function render()
    {
        return view('livewire.admin-seller.items.show')
            ->layout(Auth::guard('admin')->check() ? 'components.layouts.admin' : 'components.layouts.seller');
    }
}
