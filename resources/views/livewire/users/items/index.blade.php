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
            <!-- Filter -->
            <div class="col-span-full lg:col-span-3">
                <x-card></x-card>
            </div>
            <!-- Results -->
            <div class="col-span-full lg:col-span-9">
                <di class="grid grid-cols-12 gap-4">

                    @foreach ($items as $item)
                        <div class="col-span-6 md:col-span-3 lg:col-span-3">
                            <x-item href="{{ route('items.show', $item) }}" :item="$item" wire:navigate />
                        </div>
                    @endforeach
                </di    v>
            </div>
        </div>
        <x-card class="col-span-full">

            {{ $items->links() }}
        </x-card>
    </div>
</div>
