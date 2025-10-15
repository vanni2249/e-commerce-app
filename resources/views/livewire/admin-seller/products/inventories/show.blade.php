<div class="space-y-4">
    <x-card>
        <header class="flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-800 font-bold">Inventory</p>
                <h1>{{ $inventory->number }}</h1>
            </div>
            @if ($admin && $inventory->status === 'pending')
                <x-dropdown>
                    <x-slot name="trigger">
                        <x-icon-button icon="ellipsis-vertical" />
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-button @click="$dispatch('open-modal', 'receive-inventory-modal')">
                            Receive Inventory
                        </x-dropdown-button>
                    </x-slot>
                </x-dropdown>
            @endif
        </header>
    </x-card>
    <x-card>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @forelse ($items as $item)
                <div class="">
                    <p class="text-sm text-gray-600 font-bold">{{ $item['label'] }}</p>
                    <p class="">{{ $item['value'] }}</p>
                </div>
            @empty
                ...
            @endforelse
        </div>
    </x-card>
    <x-modal name="receive-inventory-modal" title="Receive Inventory">
        <form wire:submit.prevent="receiveInventory" class="space-y-4">
            <div>
                <x-label for="received_quantity" value="Received Quantity" />
                <x-input wire:model="received_quantity" id="received_quantity" type="number"
                    class="mt-1 block w-full" />
                @error('received_quantity')
                    <x-error message="{{ $message }}" />
                @enderror
            </div>
            <div>
                <x-button type="submit" value="Receive Inventory" />
            </div>
        </form>
    </x-modal>
</div>
