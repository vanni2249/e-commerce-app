<?php

namespace App\Livewire\Users\Carts;

use App\Models\Cart;
use App\Models\Product;
use App\Traits\CartSummary;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    use CartSummary;
    public $cart;
    public $products = [];
    public $stock;
    public $summary = [];

    public function mount()
    {
        $this->cart = Cart::where('user_id', Auth::id())
            ->with('products', 'products.item')
            ->doesntHave('order')
            ->first();

        if ($this->cart) {
            $this->products = $this->cart->products;
            $this->summary = $this->summary();
        }
    }

    public function removeCart()
    {
        // Remove the cart from the database

        $this->cart->delete();

        $this->redirect('carts', navigate: true);
    }

    public function removeItem($productId)
    {
        // Remove the product from the cart
        $this->cart->products()->detach($productId);

        // Check if the cart is empty and remove it if necessary
        if ($this->cart->products->isEmpty()) {
            $this->removeCart();
        } else {
            // Refresh the cart data
            $this->cart = Cart::where('user_id', Auth::id())
                ->with('products', 'products.item')
                ->doesntHave('order')
                ->first();

            $this->products = $this->cart ? $this->cart->products : [];

            $this->summary = $this->summary();
            
        }
    }

    public function lessProductQuantity($productId)
    {
        $product = $this->cart->products()->where('product_id', $productId)->first();

        if ($product && $product->pivot->quantity > 1) {
            $this->cart->products()->updateExistingPivot($productId, [
                'quantity' => $product->pivot->quantity - 1,
            ]);
        } elseif ($product && $product->pivot->quantity == 1) {
            $this->removeItem($productId);
            return; // Exit the function to avoid refreshing the cart again
        }

        // Refresh the cart data
        $this->cart = Cart::where('user_id', Auth::id())
            ->with('products', 'products.item')
            ->doesntHave('order')
            ->first();
        $this->products = $this->cart ? $this->cart->products : [];

        $this->summary = $this->summary();
    }

    public function sumProductQuantity($productId)
    {
        $product = $this->cart->products()->where('product_id', $productId)->first();
        $stock = Product::find($productId)?->inventories->sum('quantity') ?? 0;

        if ($product && $product->pivot) {
            if ($product->pivot->quantity < $stock) {
                $this->cart->products()->updateExistingPivot($productId, [
                    'quantity' => $product->pivot->quantity + 1,
                ]);
            }
        }

        // Refresh the cart data
        $this->cart = Cart::where('user_id', Auth::id())
            ->with('products', 'products.item')
            ->doesntHave('order')
            ->first();

        $this->products = $this->cart ? $this->cart->products : [];
        $this->summary = $this->summary();
    }

    // public function summary()
    // {
    //     return [
    //         [
    //             'label' => 'Items in Cart',
    //             'value' => $this->cart ? $this->cart->products->sum('pivot.quantity') : 0,
    //         ],
    //         [
    //             'label' => 'Subtotal',
    //             'value' => $this->cart ? '$' . number_format($this->cart->products->sum(function ($product) {
    //                 return $product->price * $product->pivot->quantity;
    //             }), 2) : '$0.00',
    //         ],
    //         [
    //             'label' => 'Shipping',
    //             'value' => $this->cart ? '$' . number_format($this->cart->products->sum(function ($product) {
    //                 return $product->shipping_cost * $product->pivot->quantity;
    //             }), 2) : '$0.00',
    //         ],
    //         [
    //             'label' => 'Total after Tax',
    //             'value' => $this->cart ? '$' . number_format($this->cart->products->sum(function ($product) {
    //                 return ($product->price + $product->shipping_cost) * $product->pivot->quantity;
    //             }), 2) : '$0.00',
    //         ],
    //         [
    //             'label' => 'Tax (10%)',
    //             'value' => $this->cart ? '$' . number_format($this->cart->products->sum(function ($product) {
    //                 return (($product->price + $product->shipping_cost) * 0.1) * $product->pivot->quantity;
    //             }), 2) : '$0.00',
    //         ],
    //         [
    //             'label' => 'Discount',
    //             'value' => '$0.00',
    //         ],
    //         [
    //             'label' => 'Grand Total',
    //             'value' => $this->cart ? '$' . number_format($this->cart->products->sum(function ($product) {
    //                 return (($product->price + $product->shipping_cost) * 1.1) * $product->pivot->quantity;
    //             }), 2) : '$0.00',
    //         ]
    //     ];
    // }

    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.carts.index');
    }
}
