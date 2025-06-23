<x-layouts.customer>
    <x-card>
        <header class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Addresses</h2>
            <x-button size="sm" variant="light">New Address</x-button>
        </header>
    </x-card>
    <div class="grid grid-cols-12 gap-4">
        @for ($i = 0; $i < 3; $i++) 
        <div class="col-span-12 md:col-span-6 lg:col-span-4">
            <x-card>
                <x-address />
            </x-card>
        </div>
        @endfor
    </div>
</x-layouts.customer>