<x-layouts.customer>
    <x-card>
        <header class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Favorites</h2>
        </header>
    </x-card>
    <div class="grid grid-cols-12 gap-4">
        @for ($i = 0; $i < 12; $i++)
            <x-item href="{{ route('items.show', ['item' => $i]) }}" />
        @endfor
    </div>
</x-layouts.customer>