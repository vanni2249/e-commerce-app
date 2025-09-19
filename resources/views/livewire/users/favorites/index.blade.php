<div>
    <!-- Header -->
    <x-card>
        <header class="flex items-center justify-between">
            <div class="flex items-center space-x-2 ">
                @if ($wishlists->count() > 0)
                    <div class="lg:hidden">
                        <x-dropdown align="left">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center space-x-1 text-gray-600 hover:text-gray-900 cursor-pointer">
                                    <x-icon icon="filter" />
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-button wire:click="selectedWishlist({{ null }})">
                                    All Favorites
                                </x-dropdown-button>
                                @foreach ($wishlists as $wishlist)
                                    <x-dropdown-button wire:click="selectedWishlist({{ $wishlist->id }})">
                                        {{ $wishlist->name }}
                                    </x-dropdown-button>
                                @endforeach
                                <div class="flex justify-center py-2 border-t border-gray-200">
                                    <button @click="$dispatch('open-modal', 'manager-wishlists-modal')"
                                        class="text-xs font-semibold cursor-pointer text-blue-500 hover:underline">
                                        Manager
                                    </button>
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif
                <div>
                    <h2 class="text-lg font-semibold">Favorites</h2>
                    <p class="text-sm text-gray-500">Manage your favorite items and wishlists.</p>
                </div>
            </div>
            <x-icon-button @click="$dispatch('open-modal', 'create-wishlist-modal')" icon="plus" />
        </header>
    </x-card>
    <!-- Body -->
    <div class="grid grid-cols-12 gap-4 mt-4">
        <!-- Sidebar -->
        <div class="col-span-12 lg:col-span-3 hidden lg:block">
            <x-card class="min-h-64 bg-white">
                <header class="flex justify-between items-center mb-4">
                    <h3 class="text-md font-semibold">List</h3>
                    <button @click="$dispatch('open-modal', 'manager-wishlists-modal')"
                        class="text-xs font-semibold cursor-pointer text-blue-500 hover:underline">
                        Manager
                    </button>
                </header>
                <!-- List of wishlists -->
                <ul class="space-y-3 text-sm">
                    <li wire:click="selectedWishlist({{ null }})" @class([
                        'text-gray-600 cursor-pointer hover:text-gray-900',
                        'font-bold text-gray-900' => $wishlist_id == null,
                    ])>
                        All Favorites
                    </li>
                    @forelse ($wishlists as $wishlist)
                        <li wire:click="selectedWishlist({{ $wishlist->id }})" @class([
                            'text-gray-600 cursor-pointer hover:text-gray-900 flex justify-between',
                            'font-bold text-gray-900' => $wishlist_id == $wishlist->id,
                        ])>
                            <span>
                                {{ $wishlist->name }}
                            </span>
                            <span>
                                {{ $wishlist->items->count() }}
                            </span>
                        </li>
                    @empty
                        <li>
                            No wishlists found.
                        </li>
                    @endforelse
                </ul>
            </x-card>
        </div>

        <!-- Items list -->
        <div class="col-span-full lg:col-span-9">
            <div class="grid grid-cols-12 gap-4">
                @forelse ($items as $item)
                    <div class="col-span-6 md:col-span-3 lg:col-span-3 relative">
                        <header class="absolute top-2 right-2">
                            <div class="flex space-x-2">
                                <x-icon-button icon="minus" variant="danger" class=""
                                    wire:click="removeItemFromWishlistModal({{ $item }})" />
                            </div>
                        </header>
                        <x-item :item="$item" href="{{ route('items.show', ['item' => $item]) }}" wire:navigate />
                    </div>

                @empty
                    <div class="col-span-12">
                        <x-card>
                            <p class="text-center text-gray-500">No favorite items found.</p>
                        </x-card>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Create wishlist modal -->
    <x-modal name="create-wishlist-modal" title="Create wishlist" size="md">
        <form wire:submit.prevent="createWishlist">
            <div>
                <x-label for="name" value="Wishlist Name" />
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" />
                @error('name')
                    <x-error message="{{ $message }}" />
                @enderror
            </div>
            <div class="mt-4 flex justify-start">
                <x-button type="submit">Create</x-button>
            </div>
        </form>
    </x-modal>

    <!-- Remove item -->
    <x-modal name="remove-from-wishlist-modal" title="Remove Item" size="md">
        <div>
            {{ $item_id->id ?? '' }}
            <p>Are you sure you want to remove this item from your wishlist?</p>
            <div class="mt-4 flex justify-end space-x-2">
                <x-button variant="secondary" @click="$dispatch('close')">Cancel</x-button>
                <x-button variant="danger" wire:click="removeItemFromWishlist">Remove</x-button>
            </div>
        </div>
    </x-modal>

    <!-- Manager wishlists modal -->
    <x-modal name="manager-wishlists-modal" title="Manage Wishlists" size="md">
        <div class="space-y-4">
            @forelse ($wishlists as $wishlist)
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-semibold">{{ $wishlist->name }}</h4>
                        <p class="text-sm text-gray-500">{{ $wishlist->items->count() }} items</p>
                    </div>
                    @if ($wishlist->is_default != true)
                        <div class="space-x-2">
                            <x-button size="sm"
                                wire:click="editWishlistModal({{ $wishlist->id }})">Edit</x-button>
                            <x-button size="sm" variant="danger"
                                wire:click="deleteWishlistModal({{ $wishlist->id }})">Delete</x-button>
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-center text-gray-500">No wishlists found.</p>
            @endforelse
        </div>
    </x-modal>

    <!-- Edit wishlist modal -->
    <x-modal name="edit-wishlist-modal" title="Edit Wishlist" size="md">
        <form wire:submit.prevent="updateWishlist">
            <div>
                <x-label for="name" value="Wishlist Name" />
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" />
                @error('name')
                    <x-error message="{{ $message }}" />
                @enderror
            </div>
            <div class="mt-4 flex justify-start">
                <x-button type="submit">Update</x-button>
            </div>
        </form>
    </x-modal>

    <!-- Delete wishlist modal -->
    <x-modal name="delete-wishlist-modal" title="Delete Wishlist" size="md">
        <div>
            <p>Are you sure you want to delete this wishlist? This action cannot be undone.</p>
            <div class="mt-4 flex justify-end space-x-2">
                <x-button variant="secondary" @click="$dispatch('close')">Cancel</x-button>
                <x-button variant="danger" wire:click="deleteWishlist">Delete</x-button>
            </div>
        </div>
    </x-modal>
</div>
