<div>
    <!-- Header -->
    <x-card>
        <header class="flex items-center justify-between">
            <div class="flex items-center space-x-2 ">
                <div class="flex flex-col">
                    <h2 class="text-lg font-semibold">
                        Favorites
                    </h2>
                    <span class="text-sm text-gray-500">
                        <span class="font-semibold text-gray-700">
                            Show:
                        </span>
                        @if ($favorite_id)
                            {{ $title }}
                        @else
                            All
                        @endif

                    </span>
                </div>
            </div>
            <div>
                <x-icon-button @click="$dispatch('open-modal', 'create-favorite-modal')" icon="plus" />
                <span class="lg:hidden">
                    <x-icon-button @click="$dispatch('open-modal', 'filter-favorites-modal')" icon="filter" />
                </span>
            </div>
        </header>
    </x-card>
    <!-- Body -->
    <div class="grid grid-cols-12 gap-4 mt-4">
        <!-- Sidebar -->
        <div class="col-span-12 lg:col-span-3 hidden lg:block">
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Filters</h2>
                </header>
                @include('users.favorites.filters')
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
                                    wire:click="removeItemFromFavoriteModal({{ $item }})" />
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

    <!-- Create favorite modal -->
    <x-modal name="create-favorite-modal" title="Create favorite" size="md">
        <form wire:submit.prevent="createFavorite">
            <div>
                <x-label for="name" value="Favorite Name" />
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
    <x-modal name="remove-from-favorite-modal" title="Remove Item" size="md">
        <div>
            {{ $item_id->id ?? '' }}
            <p>Are you sure you want to remove this item from your favorites?</p>
            <div class="mt-4 flex justify-end space-x-2">
                <x-button variant="secondary"
                    @click="$dispatch('close-modal', 'remove-from-favorite-modal')">Cancel</x-button>
                <x-button variant="danger" wire:click="removeItemFromFavorites">Remove</x-button>
            </div>
        </div>
    </x-modal>

    <!-- Manage favorites modal -->
    <x-modal name="manager-favorites-modal" title="Manage Favorites" size="md">
        <div class="space-y-4">
            @forelse ($favorites as $favorite)
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-semibold">{{ $favorite->name }}</h4>
                        <p class="text-sm text-gray-500">{{ $favorite->items->count() }} items</p>
                    </div>
                    @if ($favorite->is_default != true)
                        <div class="space-x-1">
                            <x-icon-button icon="edit" wire:click="editFavoriteModal({{ $favorite->id }})" />
                            <x-icon-button icon="delete" wire:click="deleteFavoriteModal({{ $favorite->id }})" />
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-center text-gray-500">No favorites found.</p>
            @endforelse
        </div>
    </x-modal>

    <!-- Edit favorites modal -->
    <x-modal name="edit-favorite-modal" title="Edit Favorites" size="md">
        <form wire:submit.prevent="updateFavorite">
            <div>
                <x-label for="name" value="Favorites Name" />
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

    <!-- Delete favorite modal -->
    <x-modal name="delete-favorite-modal" title="Delete Favorite" size="md">
        <div>
            <p>Are you sure you want to delete this favorite? This action cannot be undone.</p>
            <div class="mt-4 flex justify-end space-x-2">
                <x-button variant="secondary"
                    @click="$dispatch('close-modal', 'delete-favorite-modal')">Cancel</x-button>
                <x-button variant="danger" wire:click="deleteFavorite">Delete</x-button>
            </div>
        </div>
    </x-modal>

    <!-- Filter modal -->
    <x-modal name="filter-favorites-modal" title="Filters" size="sm">
        @include('users.favorites.filters')
    </x-modal>
</div>
