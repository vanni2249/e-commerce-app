<?php

namespace App\Livewire\Sellers\Items;

use App\Livewire\Forms\ItemForm;
use App\Models\Item;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    public $admin;

    public $item;

    public $is_active;

    public $approved_by;

    public $approved_at;

    public $available_at;

    public function mount($item)
    {
        $this->admin = Auth::guard('admin')->check();
        $this->item = Item::with(['seller', 'seller.user'])->findOrFail($item);
        $this->is_active = $this->item->is_active;
        $this->approved_by = $this->item->approvedBy->name ?? '';
        $this->approved_at = $this->item->approved_at;
        $this->available_at = $this->item->available_at;

    }

    #[Layout('layouts.seller')]
    public function render()
    {
        return view('livewire.sellers.items.edit');
    }
}
