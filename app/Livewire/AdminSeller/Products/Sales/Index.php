<?php

namespace App\Livewire\AdminSeller\Products\Sales;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $admin;
    public $product_id;

    public function mount($product)
    {
        $this->admin = Auth::guard('admin')->check();
        $this->product_id = $product;
    }
    public function render()
    {
        return view('livewire.admin-seller.products.sales.index',[
            'product' => Product::with(['sales' => function($query){
                $query->orderBy('created_at', 'DESC');
            }])->findOrFail($this->product_id)
        ])->layout($this->admin ? 'components.layouts.admin' : 'components.layouts.seller');
    }
}
