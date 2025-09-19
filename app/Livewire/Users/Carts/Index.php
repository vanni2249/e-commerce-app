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
    public $product;

    public function mount()
    {
        $this->cart = Cart::where('user_id', Auth::id())
            ->with('products', 'products.item')
            ->doesntHave('order')
            ->first();
    }

    public function lessProductQuantity($productId)
    {
        $product = $this->cart->products()->where('product_id', $productId)->first();

        if ($product && $product->pivot->quantity > 1) {
            $this->cart->products()->updateExistingPivot($productId, [
                'quantity' => $product->pivot->quantity - 1,
            ]);
        } elseif ($product && $product->pivot->quantity == 1) {
            $this->product = $productId;
            $this->removeItem();
            return; // Exit the function to avoid refreshing the cart again
        }

        $this->dispatch('update-counter-products');

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

        $this->dispatch('update-counter-products');

    }

    public function removeItemCartModal($productId)
    {
        // $this->removeItem($productId);
        $this->product = $productId;

        $this->dispatch('open-modal','remove-item-modal');
    }

     public function removeItem()
    {
        // Remove the product from the cart
        $this->cart->products()->detach($this->product);

        // Check if the cart is empty and remove it if necessary
        if ($this->cart->products->isEmpty()) {
            $this->removeCart();
        }else {
            $this->dispatch('update-counter-products');
            
            $this->dispatch('close-modal','remove-item-modal');
        }
    }

    public function removeCart()
    {
        $this->cart->delete();

        $this->redirect('carts', navigate: true);

    }

    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.carts.index', [
            'cart' => $this->cart,
            'products' => $this->cart->products ?? [],
            'summary' => $this->summary(),
        ]);
    }
}
