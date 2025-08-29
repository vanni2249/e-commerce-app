<?php

namespace App\Livewire\Users\Checkout;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $user;
    public $cart;

    public function mount()
    {
        $this->user = Auth::user();

        $this->cart = Cart::where('user_id', $this->user->id)
            ->with('products','products.item')
            ->doesntHave('order')
            ->first();
    }

    public function makePayment()
    {
        // Make transition here

        // Conditional logic transaction true or false

        // Assuming the transaction is successful, we can create a order and sales.

        // For example, let's assume we have a Transaction model and a User model
        $transaction = $this->user->transactions()->create([
            'cart_id' => $this->cart->id, // Assuming you have a cart session
            'amount' => 100.00, // Example amount
            'status' => 'success', // Example status
            'payment_method' => 'stripe', // Example payment method
            'transaction_id' => uniqid('txn_'), // Unique transaction ID
        ]);

        // Check if the transaction was successful
        if ($transaction->status == 'success') {
            // For example, if you have an Order model:
            $order = $this->user->orders()->create([
                'transaction_id' => $transaction->id,
                'cart_id' => $this->cart->id, // Assuming you have a cart session
                'status' => 'completed', // Example order status
            ]);
        }

        // Foreach item in the cart, you can create a sale record
        foreach ($this->cart->products as $product) {
            $order->sales()->create([
                'product_id' => $product->id,
                'quantity' => $product->pivot->quantity,
                'price' => $product->price,
                'shipping_cost' => $product->shipping_cost ?? 0.00, // Assuming you have a shipping cost
            ]);
        }

        return redirect()->route('completed', ['order' => $order->id]);
    }

    #[Layout('components.layouts.customer')] 
    public function render()
    {
        return view('livewire.users.checkout.index');
    }
}
