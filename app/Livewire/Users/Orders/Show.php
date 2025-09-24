<?php

namespace App\Livewire\Users\Orders;

use App\Models\Claim;
use App\Models\ClaimCategory;
use App\Models\Order;
use App\Traits\OrderSummary;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    use \App\Traits\ClaimNumber;
    use OrderSummary;

    public $order;
    public $user;
    public $name;
    public $phone;
    public $claimCategories = [];
    public $claim_category_id;
    public $comments;
    public $claimCreated;
    public $sale;
    

    public function mount($order)
    {
        $this->order = Order::with('address', 'address.city', 'sales', 'sales.product', 'sales.product.item')->findOrFail($this->order);
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->phone = $this->user->phone;
    }

    public function shippingInfoModal()
    {
        $this->dispatch('open-modal', 'shipping-info-modal');
    }

    public function claimOrderModal()
    {
        $this->claimCategories = ClaimCategory::all();
        $this->dispatch('open-modal', 'claim-order-modal');
    }

    public function claimOrderStore()
    {
        $this->validate([
            'claim_category_id' => 'required|exists:claim_categories,id',
            'phone' => 'required|string|max:15',
            'comments' => 'nullable|string|max:1000',
        ]);

        $this->claimCreated = $this->order->claims()->create([
            'number' => $this->createClaimNumber(),
            'user_id' => $this->user->id,
            'claim_category_id' => $this->claim_category_id,
            'comments' => $this->comments,
        ]);
    }

    public function claimSaleModal($sale)
    {
        $this->claimCategories = ClaimCategory::all();
        $this->sale = $this->order->sales()->where('id', $sale)->first();
        $this->dispatch('open-modal', 'claim-sale-modal');
    }

    public function claimSaleStore()
    {
        $this->validate([
            'claim_category_id' => 'required|exists:claim_categories,id',
            'phone' => 'required|string|max:15',
            'comments' => 'nullable|string|max:1000',
        ]);

        $this->claimCreated = $this->sale->claims()->create([
            'number' => $this->createClaimNumber(),
            'user_id' => $this->user->id,
            'claim_category_id' => $this->claim_category_id,
            'comments' => $this->comments,
        ]);
    }

    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.orders.show', [
            'order' => $this->order,
            'summary' => $this->summary(),
        ]);
    }
}
