<?php

namespace App\Livewire\AdminSeller\Sales;

use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public $admin;

    public function mount()
    {
        $this->admin = Auth::guard('admin')->check();
    }

    #[Layout('layouts.admin-sidebar')]
    public function render()
    {
        return view('livewire.admin-seller.sales.show',[
            'sale' => Sale::when(!$this->admin, function($query){
                $query->whereHas('product.item', function($query){
                    $query->where('seller_id', Auth::user()->seller->id);
                });
            })->findOrFail(request()->route('sale')),
        ]);
    }
}
