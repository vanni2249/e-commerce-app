<x-layouts.customer>
    <div class="grid grid-cols-12 gap-2 md:gap-4">
        @for ($i = 0; $i < 24; $i++)
            <x-item href="{{ route('items.show', ['item' => $i]) }}" />
        @endfor
    </div>
</x-layouts.customer>