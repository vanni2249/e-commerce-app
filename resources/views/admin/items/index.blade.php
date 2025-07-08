<x-layouts.admin>
    <div class="grid grid-cols-12 gap-4 px-4">
        <!-- Table -->
        <div class="col-span-full lg:col-span-full">
            <x-card class="h-full rounded-xl">
                
                @livewire('admin.items.list-items')
                
            </x-card>
        </div>
    </div>
</x-layouts.admin>