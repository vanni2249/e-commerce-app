<div>
    <x-card>
        <header class="flex justify-between items-center mb-4">
            <div>
                <h1 class="text-md font-bold">Inventories</h1>
                <p class="text-gray-500 text-sm">{{ $product->number }}</p>
            </div>
            <x-icon-button icon="plus" @click="$dispatch('open-modal', 'create-inventory-modal')" />
        </header>
        <div class="md:flex md:justify-between space-y-2 md:space-y-0 items-center mb-2">
            <div class="">
                <x-input wire:model.live="search" placeholder="Search" class="w-full" />
            </div>
            <div class="flex space-x-2">
                <div class="bg-gray-200 rounded-md p-1">
                    <span class="pl-2 uppercase text-xs font-bold text-gray-600 leading-tight">Show</span>
                    <select wire:model.live="perPage" class="mx-2 rounded-md text-sm">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                    </select>
                </div>
                {{-- <div>
                        <x-button variant="light">Filtro</x-button>
                    </div> --}}
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <tr>
                    <th class="p-4">Number</th>
                    <th class="p-4">Created</th>
                    <th class="p-4">Received<br />By</th>
                    <th class="p-4">Inicial<br />Quantity</th>
                    <th class="p-4">Quantity<br />Received</th>
                    <th class="p-4">Cost<br>Unit</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 w-14">Action</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @forelse ($product->inventories as $inventory)
                    <tr class="border-t border-gray-200">
                        <td class="p-1 md:p-4">
                            <span class="font-bold text-sm">
                                {{ ucfirst($inventory->type) }}
                            </span>
                            <br>
                            <span>
                                {{ $inventory->number }}
                            </span>
                        </td>
                        <td class="p-1 md:p-4">
                            <span>
                                {{ $inventory->created_seller_id === null ? 'Create Zierra LLC' : $inventory->seller->store_name ?? '' }}
                            </span>
                            <br>
                            <span>
                                {{ $inventory->created_at->format('d/M/Y H:m') }}
                            </span>
                        </td>
                        <td class="p-1 md:p-4">
                            <span>
                                {{ $inventory->received_by ? $inventory->received->name : 'N/A' }}
                            </span>
                            <br>
                            <span>
                                {{ $inventory->received_at ? $inventory->received_at : 'N/A' }}
                            </span>
                        </td>
                        <td class="p-4">
                            {{ $inventory->initial_quantity }}
                        </td>
                        <td class="p-4">
                            {{ $inventory->quantity }}
                        </td>
                        <td class="p-4">
                            ${{ number_format($inventory->price, 2) }}
                        </td>
                        <td class="p-1 md:p-4">
                            @switch($inventory->status)
                                @case('pending')
                                    <x-badge color="warning" value="Pending"></x-badge>
                                @break

                                @case('received')
                                    <x-badge color="success" value="Received"></x-badge>
                                @break

                                @case('canceled')
                                    <x-badge color="red" value="Canceled"></x-badge>
                                @break

                                @default
                            @endswitch
                        </td>
                        <td class="p-1 md:p-4">
                            <div class="flex items-center space-x-2">
                                <x-icon-link
                                    href="{{ $admin === true
                                        ? route('admin.products.inventories.show', ['product' => $product->id, 'inventory' => $inventory->id])
                                        : route('sellers.products.inventories.show', ['product' => $product->id, 'inventory' => $inventory->id]) }}"
                                    wire:navigate icon="eye" />
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="p-4">
                                <div class="text-center text-gray-500">
                                    No inventories found.
                                </div>
                            </td>
                    @endforelse
                </x-slot>
            </x-table>
        </x-card>

        <!-- Create inventory modal -->
        <x-modal name="create-inventory-modal" title="Create Inventory">
            <form action="" class="grid grid-cols-2 gap-4" wire:submit.prevent="createInventory">
                <div class="col-span-2">
                    <x-label for="type" value="Type" />
                    <x-select id="type" class="mt-1 block w-full" wire:model.defer="type">
                        <option value="purchase">Purchase</option>
                        <option value="adjustment">Adjustment</option>
                    </x-select>
                    @error('type')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>
                <div class="col-span-1">
                    <x-label for="initial_quantity" value="Initial Quantity" />
                    <x-input wire:model="initial_quantity" id="initial_quantity" type="number" class="mt-1 block w-full"
                        wire:model.defer="initial_quantity" />
                    @error('initial_quantity')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>
                <div class="col-span-1">
                    <x-label for="price" value="Cost Unit" />
                    <x-input wire:model="price" id="price" type="number" step="0.01" class="mt-1 block w-full"
                        wire:model.defer="price" />
                    @error('price')
                        <x-error message="{{ $message }}" />
                    @enderror
                </div>
                <div class="col-span-2">
                    <x-button value="Create Inventory" />

                </div>
            </form>
        </x-modal>

        <!-- Receive Inventory modal -->
        <x-modal name="receive-inventory-modal" title="Receive Inventory">
        </x-modal>
    </div>
