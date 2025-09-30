<?php

namespace App\Livewire\Users\Items;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public $user;
    public $item;
    public $cart;
    public $product;
    public $inventories;
    public $sales;
    public $quantitySelectedInCart;
    public $stock;
    public $quantity = 1;
    public $price;
    public $shippingCost;
    public $variants = [];
    public $favorites;
    public $favorite_id;
    public $favoriteAdded = false;

    public function mount($item)
    {
        $this->user = Auth::user();


        $this->cart = $this->user ? Cart::where('type', 'cart')->where('user_id', $this->user->id)->doesntHave('order')->first() : null;

        $this->item = Item::with([
            'attributes',
            'attributes.variants' => function ($query) use ($item) {
                $query->where('item_id', $item);
            },
            'products',
            'products.variants',
            'products.inventories',
            'products.sales',
            'products.variants.attribute'
        ])->find($item);

        $this->product = $this->item->products()->first();

        if ($this->item->variants) {
            $this->variants = $this->product->variants->pluck('pivot.variant_id')->toArray();
        }

        $this->setProductData($this->product);

        $this->favorites = ($this->user) ? (($this->user->favorites->isEmpty()) ? null : $this->user->favorites) : null;
        $this->favorite_id = ($this->favorites && $this->favorites->isNotEmpty()) ? $this->favorites->first()->id : null;
        $this->favoriteAdded = ($this->user && $this->favorites && $this->item && method_exists($this->item, 'favorites'))
            ? $this->item->favorites()->whereIn('favorite_id', $this->favorites->pluck('id'))->exists()
            : false;
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

                $this->setProductData($product);
            }
        }
    }

    public function setProductData($product)
    {
        $this->product = $product;
        $this->inventories = $product->inventories()->sum('quantity');
        $this->sales = $product->sales()->sum('quantity');
        $this->quantitySelectedInCart = $this->cart
            ? ($this->cart->products()->where('product_id', $this->product->id)->first()
                ? $this->cart->products()->where('product_id', $this->product->id)->first()->pivot->quantity
                : 0)
            : 0;
        $this->stock = $this->inventories - $this->sales - $this->quantitySelectedInCart;
        $this->price = $this->product->price;
        $this->shippingCost = $this->product->shipping_cost;
    }

    public function addToCart()
    {
        // Validate the quantity
        $this->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // check if isset cart
        if (!$this->cart) {
            $this->createUserCart();
        }

        // Check if the product is already in the cart
        $existingProduct = $this->cart->products()->where('product_id', $this->product->id)->first();

        if ($existingProduct) {
            // If it exists, update the quantity by summing the existing and new quantity
            $currentQuantity = $existingProduct->pivot->quantity;
            $newQuantity = $currentQuantity + $this->quantity;

            $this->cart->products()->updateExistingPivot($this->product->id, [
                'quantity' => $newQuantity,
            ]);
        } else {
            // If it doesn't exist, add the product to the cart
            $this->cart->products()->attach($this->product->id, [
                'quantity' => $this->quantity,
            ]);
        }

        $this->setProductData($this->product);

        $this->dispatch('update-counter-products');
    }

    public function createUserCart()
    {
        // Create a new cart for the user
        $this->cart = Cart::create([
            'user_id' => $this->user->id,
            'type' => 'cart',
        ]);
    }

    public function addItemToFavoriteModal()
    {
        $this->dispatch('open-modal', 'add-item-favorite-modal');

    }

    public function addItemToFavorites()
    {
        if ($this->favorite_id && $this->user) {

            $favorite = $this->user->favorites()->where('id', $this->favorite_id)->first();

            if ($favorite) {
                // Check if the item is already in the favorite
                if (!$this->item->favorites()->where('favorite_id', $favorite->id)->exists()) {
                    $this->item->favorites()->attach($favorite->id);
                    $this->favoriteAdded = true;
                }
            }
        }

        $this->dispatch('close-modal', 'add-item-favorite-modal');
    }

    public function removeItemFromFavoriteModal()
    {
        $this->dispatch('open-modal', 'remove-item-favorite-modal');
    }

    public function removeItemFromFavorites()
    {
        if ($this->favorite_id && $this->user) {
            
            $favorite = $this->user->favorites()->where('id', $this->favorite_id)->first();
            if ($favorite) {
                // Check if the item is already in the favorite
                $this->item->favorites()->detach($favorite->id);
                $this->favoriteAdded = false;
            }
        }

        $this->dispatch('close-modal', 'remove-item-favorite-modal');
    }

    #[Layout('components.layouts.customer')]
    public function render()
    {
        return view('livewire.users.items.show');
    }
}
