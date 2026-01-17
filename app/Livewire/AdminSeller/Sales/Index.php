<?php

namespace App\Livewire\AdminSeller\Sales;

use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    use \Livewire\WithPagination;
    
    public $admin;
    public $search = "";
    public $perPage = 10;

    public function mount()
    {
        $this->admin = Auth::guard('admin')->check();
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin-seller.sales.index',[
            'sales' => Sale::whereHas('product.item', function ($query) {
                if (!$this->admin) {
                    $query->where('seller_id', Auth::user()->seller->id);
                }
            })
            ->when($this->search, function ($query) {
                    $query->where('number', 'like', '%' . $this->search . '%');
            })
            ->with(['product', 'order', 'product.item'])->paginate($this->perPage)
        ]);
    }
}
