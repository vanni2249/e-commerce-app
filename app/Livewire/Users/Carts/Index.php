<?php

namespace App\Livewire\Users\Carts;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $cart;
    
    public function removeCart()
    {
        // Remove the cart from the database
        
        $this->cart->delete();

        $this->redirect('cart');

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
        }
    }
    #[Layout('components.layouts.customer')] 
    public function render()
    {
        return view('livewire.users.carts.index',[
            'cart' => Cart::where('user_id', Auth::id())
            ->with('products','products.item')
            ->doesntHave('order')
            ->first()
        ]);
    }
}
