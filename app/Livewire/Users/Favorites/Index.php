<?php

namespace App\Livewire\Users\Favorites;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $user;
    public $wishlists;
    public $wishlist;
    public $name;
    public $description;
    public $is_active = true;
    public $wishlist_id;
    public $item_id;

    public function mount()
    {
        $this->user = Auth::user();
        $this->wishlists = Wishlist::where('user_id', $this->user->id)->with(['items'])->get();
    }

    public function createWishlist()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
        ]);

        $wishlist = Wishlist::create([
            'user_id' => $this->user->id,
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ]);

        // Refresh the wishlists
        $this->wishlists = Wishlist::where('user_id', $this->user->id)->with(['items'])->get();

        // Reset form fields
        $this->reset(['name', 'description', 'is_active']);

        // Close modal (assuming you have a modal component that listens for this event)
        $this->dispatch('close-modal', 'create-wishlist-modal');
    }

    public function selectedWishlist($wishlistId = null)
    {
        $this->wishlist_id = $wishlistId;
    }

    public function removeItemFromWishlistModal($itemId)
    {
        $this->item_id = $itemId['id'];
        $this->dispatch('open-modal', 'remove-from-wishlist-modal');
    }

    public function removeItemFromWishlist()
    {
        foreach ($this->wishlists as $wishlist) {
            $wishlist->items()->detach($this->item_id);
        }

        // Refresh the wishlists
        $this->wishlists = Wishlist::where('user_id', $this->user->id)->with(['items'])->get();

        // Close modal
        $this->dispatch('close-modal', 'remove-from-wishlist-modal');
    }

    public function editWishlistModal($wishlistId)
    {
        $this->wishlist = Wishlist::find($wishlistId);
        $this->name = $this->wishlist->name;
        $this->description = $this->wishlist->description;
        $this->is_active = $this->wishlist->is_active;
        $this->wishlist_id = $this->wishlist->id;

        $this->dispatch('open-modal', 'edit-wishlist-modal');
    }

    public function updateWishlist()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
        ]);

        $wishlist = Wishlist::find($this->wishlist_id);
        $wishlist->update([
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ]);

        // Refresh the wishlists
        $this->wishlists = Wishlist::where('user_id', $this->user->id)->with(['items'])->get();

        // Reset form fields
        $this->reset(['name', 'description', 'is_active', 'wishlist_id']);

        // Close modal
        $this->dispatch('close-modal', 'edit-wishlist-modal');
    }

    public function deleteWishlistModal($wishlistId)
    {
        $this->wishlist = Wishlist::find($wishlistId);
        $this->wishlist_id = $this->wishlist->id;

        $this->dispatch('open-modal', 'delete-wishlist-modal');
    }

    public function deleteWishlist()
    {
        $wishlist = Wishlist::find($this->wishlist_id);
        $wishlist->items()->detach(); // Detach all items
        $wishlist->delete();

        // Refresh the wishlists
        $this->wishlists = Wishlist::where('user_id', $this->user->id)->with(['items'])->get();

        // Reset wishlist_id
        $this->reset('wishlist_id');

        // Close modal
        $this->dispatch('close-modal', 'delete-wishlist-modal');
        
    }

    #[Layout('components.layouts.customer')] 
    public function render()
    {
        return view('livewire.users.favorites.index',[
            'items' => $this->wishlists->flatMap(function ($wishlist) {
                if ($this->wishlist_id) {
                    return $wishlist->items()->where('wishlist_id', $this->wishlist_id)->get();
                }
                return $wishlist->items;
            }),
        ]);
    }
}
