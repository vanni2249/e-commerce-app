<div class="flex min-h-32 lg:min-h-64 flex-col">
    <!-- List of favorites -->
    <ul class="grow space-y-3 text-sm">
        <li wire:click="selectedFavorite({{ null }})" @class([
            'text-gray-600 cursor-pointer hover:text-gray-900',
            'font-bold text-gray-900' => $favorite_id == null,
        ])>
            All
        </li>
        @forelse ($favorites as $favorite)
            <li wire:click="selectedFavorite({{ $favorite->id }})" @class([
                'text-gray-600 cursor-pointer hover:text-gray-900 flex justify-between',
                'font-bold text-gray-900' => $favorite_id == $favorite->id,
            ])>
                <span>
                    {{ $favorite->name }}
                </span>
                <span>
                    {{ $favorite->items->count() }}
                </span>
            </li>
        @empty
            <li>
                No favorites found.
            </li>
        @endforelse
    </ul>
    <footer class=" text-center">

        <button wire:click="managerFavoritesModal"
            class="text-sm font-semibold cursor-pointer text-blue-500 hover:underline">
            Manager
        </button>
    </footer>
</div>
