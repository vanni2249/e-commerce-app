<?php

namespace App\Livewire\AdminSeller\Products\Inventories;

use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $admin;
    public $product_id;
    public $inventory_id;
    public $inventory;
    public $items = [];
    public $received_quantity = 0;

    public function mount($product, $inventory)
    {
        $this->product_id = $product;
        $this->inventory_id = $inventory;
        $this->admin = Auth::guard('admin')->check();
        $this->inventory = Inventory::with(['product', 'seller', 'admin'])->findOrFail($this->inventory_id);
        $this->items =  $this->detail();
    }

    public function detail()
    {
        return [
            [
                'label' => 'Product',
                'value' => $this->inventory->product->number ?? '...'
            ],
            [
                'label' => 'Type',
                'value' => $this->inventory->type ?? '...'
            ],
            [
                'label' => 'Initial Quantity',
                'value' => $this->inventory->initial_quantity
            ],
            [
                'label' => 'Current Quantity',
                'value' => $this->inventory->quantity
            ],
            [
                'label' => 'Price',
                'value' => '$' . number_format($this->inventory->price, 2)
            ],
            [
                'label' => 'Created By',
                'value' => $this->inventory->created_seller_id ? 'Seller: ' . ($this->inventory->seller ? $this->inventory->seller->name : '...') : ($this->inventory->create_admin_id ? 'Admin: ' . ($this->inventory->admin ? $this->inventory->admin->name : '...') : 'System')
            ],
            [
                'label' => 'Status',
                'value' => $this->inventory->status == 'pending' ? 'Pending' : ($this->inventory->status == 'received' ? 'Received' : 'Cancelled')
            ],
            [
                'label' => 'Received At',
                'value' => $this->inventory->received_at ? date('Y-m-d H:i:s', strtotime($this->inventory->received_at)) : 'Not received'
            ],
            [
                'label' => 'Received By',
                'value' => $this->inventory->received_at ? 'Admin:' . $this->inventory->received->name : ($this->inventory->received_by ? ($this->inventory->received_by == 0 ? 'System' : '...') : 'Not received')
            ],
            [
                'label' => 'Deleted At',
                'value' => $this->inventory->deleted_at ? date('Y-m-d H:i:s', strtotime($this->inventory->deleted_at)) : 'Not deleted'
            ],
            [
                'label' => 'Created At',
                'value' => date('Y-m-d H:i:s', strtotime($this->inventory->created_at))
            ],
            [
                'label' => 'Updated At',
                'value' => date('Y-m-d H:i:s', strtotime($this->inventory->updated_at))
            ],
        ];
    }

    public function receiveInventory()
    {
        $this->validate([
            'received_quantity' => 'required|integer|min:1|max:' . $this->inventory->initial_quantity,
        ]);

        $this->inventory->update([
            'quantity' => $this->received_quantity,
            'status' => 'received',
            'received_at' => now(),
            'received_by' => $this->admin ? Auth::guard('admin')->id() : 0,
        ]);

        $this->items =  $this->detail();
        $this->dispatch('close-modal', 'receive-inventory-modal');
    }

    public function render()
    {
        return view('livewire.admin-seller.products.inventories.show')
            ->layout($this->admin ? 'components.layouts.admin' : 'components.layouts.seller');
    }
}
