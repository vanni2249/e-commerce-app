<div>
    <div class="grid grid-cols-12 gap-2 md:gap-4">
        @foreach ($items as $item)
            <x-item href="{{ route('items.show', $item) }}" :item="$item" />
        @endforeach

        <x-card class="col-span-full">
            {{ $items->links() }}
        </x-card>
    </div>
</div>
