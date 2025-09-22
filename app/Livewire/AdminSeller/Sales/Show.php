<?php

namespace App\Livewire\AdminSeller\Sales;

use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $admin;

    public function mount()
    {
        $this->admin = Auth::guard('admin')->check();
    }

    public function render()
    {
        return view('livewire.admin-seller.sales.show',[
            'sale' => Sale::when(!$this->admin, function($query){
                $query->whereHas('product.item', function($query){
                    $query->where('seller_id', Auth::user()->seller->id);
                });
            })->findOrFail(request()->route('sale')),
        ])
        ->layout($this->admin ? 'components.layouts.admin' : 'components.layouts.seller');
        
    }
}
