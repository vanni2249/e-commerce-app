<?php

namespace App\Livewire\AdminSeller\Products\Inventories;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    use \Livewire\WithPagination;
    use \App\Traits\InventoryNumber;

    public $admin;
    public $product_id;
    public $search = '';
    public $perPage = 10;
    public $type = 'purchase';
    public $initial_quantity;
    public $price = 0.00;

    public function mount($product)
    {
        $this->admin = Auth::guard('admin')->check();
        $this->product_id = $product;
    }

    public function createInventory()
    {
        $this->validate([
            'type' => 'required|in:purchase,adjustment',
            'initial_quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($this->product_id);

        $inventory = $product->inventories()->create([
            'number' => $this->createInventoryNumber(),
            'initial_quantity' => $this->initial_quantity,
            'price' => $this->price,
            'created_seller_id' => $this->admin ? null : Auth::user()->seller->id,
            'create_admin_id' => $this->admin ? Auth::guard('admin')->id() : null,
            'status' => 1,
        ]);

        // Reset form fields
        $this->type = 'purchase';
        $this->initial_quantity = null;
        $this->price = null;

        $this->dispatch('close-modal', 'create-inventory-modal');
    }

    public function handleReceiveInventory()
    {
        $this->dispatch('open-modal', 'receive-inventory-modal');
    }

    public function render()
    {
        return view('livewire.admin-seller.products.inventories.index', [
            'product' => Product::with(['inventories.seller', 'inventories.admin', 'inventories' => function ($query) {
                $query->when('search', function ($q) {
                    $q->where('number', 'like', '%' . $this->search . '%');
                })->orderBy('created_at', 'DESC')->paginate($this->perPage);
            }])->findOrFail($this->product_id)
        ])
            ->layout($this->admin ? 'components.layouts.admin' : 'components.layouts.seller');
    }
}
