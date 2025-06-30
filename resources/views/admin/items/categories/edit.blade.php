<x-layouts.admin>
    <div class="px-4 space-y-4">
        <!-- Header -->
        <header class="col-span-full flex items-center justify-between px-2">
            <h1 class="text-lg font-bold">Categories</h1>
        </header>
        <x-card>
            @livewire('admin.items.attach-detach-categories', ['item' => $item])
        </x-card>
    </div>
</x-layouts.admin>