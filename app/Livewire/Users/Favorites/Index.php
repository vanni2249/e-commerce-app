<?php

namespace App\Livewire\Users\Favorites;

use App\Models\Favorite;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $user;
    public $favorites;
    public $favorite;
    public $name;
    public $description;
    public $is_active = true;
    public $favorite_id;
    public $item_id;

    public function mount()
    {
        $this->user = Auth::user();
        // $this->favorite_id = $this->user->favorites()->first()?->id;
        // $this->favorite = $this->user->favorites()->first();
        $this->favorites = $this->user->favorites;
    }
    public function createFavorite()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
        ]);

        $favorite = Favorite::create([
            'user_id' => $this->user->id,
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ]);

        // Refresh the favorites
        $this->favorites = $this->user->favorites;

        // Reset form fields
        $this->reset(['name', 'description', 'is_active']);

        // Close modal (assuming you have a modal component that listens for this event)
        $this->dispatch('close-modal', 'create-favorite-modal');
    }

    public function selectedFavorite($favoriteId = null)
    {
        $this->favorite_id = $favoriteId;
    }

    public function removeItemFromFavoriteModal($itemId)
    {
        $this->item_id = $itemId['id'];

        $this->dispatch('open-modal', 'remove-from-favorite-modal');
    }

    public function removeItemFromFavorites()
    {
        foreach ($this->favorites as $favorite) {
            $favorite->items()->detach($this->item_id);
        }

        // Refresh the favorites
        $this->favorites = Favorite::where('user_id', $this->user->id)->with(['items'])->get();

        // Close modal
        $this->dispatch('close-modal', 'remove-from-favorite-modal');
    }

    public function editFavoriteModal($favoriteId = null)
    {
        $this->favorite = Favorite::find($favoriteId);
        $this->name = $this->favorite->name;
        $this->description = $this->favorite->description;
        $this->is_active = $this->favorite->is_active;
        $this->favorite_id = $this->favorite->id;


        $this->dispatch('close-modal', 'manager-favorites-modal');
        $this->dispatch('open-modal', 'edit-favorite-modal');
    }

    public function updateFavorite()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
        ]);

        $favorite = Favorite::find($this->favorite_id);
        $favorite->update([
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ]);

        // Refresh the favorites
        $this->favorites = Favorite::where('user_id', $this->user->id)->with(['items'])->get();

        // Reset form fields
        $this->reset(['name', 'description', 'is_active', 'favorite_id']);

        // Close modal
        $this->dispatch('close-modal', 'edit-favorite-modal');
    }

    public function deleteFavoriteModal($favoriteId)
    {
        $this->favorite = Favorite::find($favoriteId);
        $this->favorite_id = $this->favorite->id;

        $this->dispatch('close-modal', 'manager-favorites-modal');
        $this->dispatch('open-modal', 'delete-favorite-modal');
    }

    public function deleteFavorite()
    {
        $favorite = Favorite::find($this->favorite_id);
        $favorite->items()->detach(); // Detach all items
        $favorite->delete();

        // Refresh the favorites
        $this->favorites = Favorite::where('user_id', $this->user->id)->with(['items'])->get();

        // Reset favorite_id
        $this->reset('favorite_id');

        // Close modal
        $this->dispatch('close-modal', 'delete-favorite-modal');

    }

    #[Layout('components.layouts.customer')] 
    public function render()
    {
        return view('livewire.users.favorites.index',[
           'items' => $this->favorites->flatMap(function ($favorite) {
               if ($this->favorite_id) {
                   return $favorite->items()->where('favorite_id', $this->favorite_id)->get();
               }
               return $favorite->items;
           }),
        ]);
    }
}
