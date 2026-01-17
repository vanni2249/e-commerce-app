<?php

namespace App\Livewire\AdminSeller\Products;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public $admin;
    public $product_id;
    public $widgets = [];
    public $product;

    public function mount($product)
    {
        $this->admin = Auth::guard('admin')->check();
        $this->product_id = $product;
        $this->product = Product::with(['item'])->find($this->product_id);
        $this->widgets = $this->widgets();
    }

    public function widgets()
    {
        return [
            ['label' => 'Inventories', 'value' => $this->product->inventories->sum('quantity')],
            ['label' => 'Returns', 'value' => $this->product->inventories()->where('type', 'return')->sum('quantity')],
            ['label' => 'Adjustments', 'value' => $this->product->inventories()->where('type', 'adjustment')->sum('quantity')],
            ['label' => 'Sales', 'value' => $this->product->sales->sum('quantity')],
        ];
    }

    #[Layout('admin-sidebar')]
    public function render()
    {
        return view('livewire.admin-seller.products.show');
    }
}
