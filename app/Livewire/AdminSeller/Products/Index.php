<?php

namespace App\Livewire\AdminSeller\Products;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    use \Livewire\WithPagination;
    public $admin;
    public $search = '';
    public $perPage = 10;

    public function mount()
    {
        $this->admin = Auth::guard('admin')->check();
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin-seller.products.index',[
            'products' => Product::with(['item','variants','variants.attribute', 'inventories', 'sales'])
                ->when($this->search, function ($query){
                    $query->where('number', 'like', '%'.$this->search.'%');
                })
                ->when(!$this->admin, function ($query) {
                    $query->whereHas('item', function ($q) {
                        $q->where('seller_id', Auth::user()->seller->id);
                    });
                })->orderBy('item_id', 'desc')
                ->paginate($this->perPage),
            ]);
    }

}
