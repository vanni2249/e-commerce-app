<?php

namespace App\Livewire\AdminSeller\Items;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.admin-seller.items.edit')
            ->layout(Auth::guard('admin')->check() ? 'components.layouts.admin' : 'components.layouts.seller');
    }
}
