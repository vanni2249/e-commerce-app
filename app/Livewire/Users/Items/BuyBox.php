<?php

namespace App\Livewire\Users\Items;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BuyBox extends Component
{
    public $item;
    public $product;
    public $productId;
    public $stock;
    public $quantity = 1;
    public $price;
    public $shippingCost;
    public $cart;
    public $userId;
    public $variants = [];

    public function mount($item)
    {
        $this->item = Item::with([
            'attributes',
            'attributes.variants' => function ($query) use ($item) {
                $query->where('item_id', $item);
            },
            'products',
            'products.variants',
            'products.variants.attribute'
        ])->find($item);
        $this->product = $this->item->products()->first();

        if ($this->item->variants) {
            $this->variants = $this->product->variants->pluck('pivot.variant_id')->toArray();
        }

        $this->productId = $this->product->id;
        $this->stock = $this->product->inventories()->sum('quantity');
        $this->price = $this->product->price;
        $this->shippingCost = $this->product->shipping_cost;
    }

    public function updated($property, $value)
    {
        foreach ($this->item->attributes as $i => $attribute) {
            if ($property === 'variants.' . $i) {

                $query = $this->item->products();

                $collections = collect($this->variants)->filter()->unique()->toArray();


                if (!empty($this->item->attributes)) {
                    foreach ($collections as $i => $attribute) {
                        $query->whereHas('variants', function ($query) use ($attribute) {
                            $query->where('variant_id', $attribute);
                        });
                    }
                }

                $product = $query->first();
                $this->productId = $product ? $product->id : null;
                $this->stock = $product->inventories()->sum('quantity');
                $this->price = $this->product->price;
                $this->shippingCost = $this->product->shipping_cost;
            }
        }
    }

    public function addToCart()
    {
        // Set User ID
        $this->getUserId();

        // Ensure the user has a cart
        $this->issetUserCart();

        // Validate the quantity
        $this->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Check if the product is already in the cart
        $existingProduct = $this->cart->products()->where('product_id', $this->productId)->first();

        if ($existingProduct) {
            // If it exists, update the quantity by summing the existing and new quantity
            $currentQuantity = $existingProduct->pivot->quantity;
            $newQuantity = $currentQuantity + $this->quantity;

            $this->cart->products()->updateExistingPivot($this->productId, [
                'quantity' => $newQuantity,
            ]);

            // goto session to update the counter
            $this->countProductsInCart();
        } else {
            // If it doesn't exist, add the product to the cart
            $this->cart->products()->attach($this->productId, [
                'quantity' => $this->quantity,
            ]);

            // goto session to update the counter
            $this->countProductsInCart();
        }
    }

    public function countProductsInCart()
    {
        // Sum quantities of products in the cart
        session('counter-products', $this->cart->products()->sum('quantity'));
    }

    public function issetUserCart()
    {
        // Check if the cart exists for the user
        $this->cart = Cart::where('user_id', $this->userId)
            ->doesntHave('order')
            ->first();

        if (!$this->cart) {
            // If no cart exists, create a new one
            $this->cart = Cart::create([
                'user_id' => $this->userId,
            ]);
        }
    }

    public function getUserId()
    {
        // Get the authenticated user's ID
        $this->userId = Auth::id();
    }
    public function render()
    {
        return view('livewire.users.items.buy-box');
    }
}
