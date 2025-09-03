<?php

namespace App\Livewire\Sellers\Items;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $sections =[];

    public function handleCreateItemModal()
    {
        $this->dispatch('open-modal', 'create-item-modal');
        $this->sections = \App\Models\Section::all();
    }
    #[Layout('components.layouts.seller')] 
    public function render()
    {
        return view('livewire.sellers.items.index',[
            'items' => \App\Models\Item::where('seller_id', Auth::guard('seller')->user()->id)
                ->with('section', 'products', 'products.inventories', 'products.sales')
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ]);
    }
}
