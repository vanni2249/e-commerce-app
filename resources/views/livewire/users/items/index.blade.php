<div>
    <div class="space-y-4">
        <x-card>
            Results for: <strong>{{ $items->total() }}</strong> items found.

            @if ($search)
                <div class="mt-2">
                    You searched for: <strong>"{{ $search }}"</strong>
                </div>
            @else
                <div class="mt-2 text-gray-500">
                    You can search for items using the search bar above.
                </div>
                
            @endif
        </x-card>
        <div class="grid grid-cols-12 gap-2 md:gap-4">
            @foreach ($items as $item)
                <x-item href="{{ route('items.show', $item) }}" :item="$item" wire:navigate />
            @endforeach
        </div>
        <x-card class="col-span-full">

            {{ $items->links() }}
        </x-card>
    </div>
</div>
