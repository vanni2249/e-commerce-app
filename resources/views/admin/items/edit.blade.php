<x-layouts.admin>
    <div class="px-4 space-y-4">
        <!-- Header -->
        <header class="col-span-full flex items-center justify-between px-2">
            <h1 class="text-lg font-bold">Edit item</h1>
        </header>
        <!-- Item title -->
        <x-card class="space-y-4">
            @livewire('admin.items.update-item', ['item' => $item])
            
        </x-card>
    </div>

</x-layouts.admin>
