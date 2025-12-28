<div>
    <div class="bg-white rounded-lg p-4 space-y-4">
        <!-- Search & Filters -->
        <div class="md:flex md:justify-between space-y-2 md:space-y-0 items-center">
            <div class="">
                <x-input wire:model.live='search' placeholder="{{ __('Search') }}" class="w-full" />
            </div>
            <div class="flex space-x-2">
                <div class="bg-gray-200 rounded-md p-1">
                    <span
                        class="pl-2 uppercase text-xs font-bold text-gray-600 leading-tight">{{ __('Show') }}</span>
                    <select wire:model.live="perPage" class="mx-2 text-gray-600 rounded-md text-xs">
                        <option value="24">24</option>
                        <option value="48">48</option>
                        <option value="72">72</option>
                        <option value="96">96</option>
                    </select>
                </div>
                <div>
                    <x-button @click="$dispatch('open-modal', 'filter-items-modal')"
                        variant="light">{{ __('Filter') }}</x-button>
                </div>
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <tr>
                    <th class="py-2 px-4">Inventory<br/>Number</th>
                    <th class="py-2 px-4">Product<br/>number</th>
                    <th class="py-2 px-4">Initial<br/>Quantity</th>
                    <th class="py-2 px-4">Received<br/>Quantity</th>
                    <th class="py-2 px-4">Price</th>
                    <th class="py-2 px-4">Created<br/>Seller</th>
                    <th class="py-2 px-4">Created<br/>Admin</th>
                    <th class="py-2 px-4">Status</th>
                    <th class="py-2 px-4">Received<br/>At</th>
                    <th class="py-2 px-4">Received<br/>By</th>
                    <th class="py-2 px-4">Created at</th>
                    <th class="py-2 px-4">Updated at</th>
                    <th class="py-2 px-4">Action</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @forelse ($inventories as $inventory)
                    <tr>
                        <!-- Inventory number -->
                        <td class="p-4">{{ $inventory->number }}</td>
                        <!-- Product number -->
                        <td class="p-4">{{ $inventory->product->number }}</td>
                        <!-- Initial Quantity -->
                        <td class="p-4">{{ $inventory->initial_quantity }}</td>
                        <!-- Received Quantity -->
                        <td class="p-4">{{ $inventory->quantity }}</td>
                        <!-- Price -->
                        <td class="p-4">{{ $inventory->price }}</td>
                        <!-- Created Seller -->
                        <td class="p-4">{{ $inventory->created_seller_id }}</td>
                        <!-- Created Admin -->
                        <td class="p-4">{{ $inventory->created_admin_id }}</td>
                        <!-- Status -->
                        <td class="p-4">{{ $inventory->status }}</td>
                        <!-- Received At -->
                        <td class="p-4">{{ $inventory->received_at  }}</td>
                        <!-- Received By -->
                        <td class="p-4">{{ $inventory->received_by }}</td>
                        <!-- Created at -->
                        <td class="p-4">{{ $inventory->created_at->format('M d, Y  H:i:s') }}</td>
                        <!-- Updated at -->
                        <td class="p-4">{{ $inventory->updated_at->format('M d, Y  H:i:s') }}</td>
                        <!-- Action -->
                        <td class="p-4">
                            {{-- <x-button href="{{ route('admin.seller.items.show', $sale->id) }}">View</x-button> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="13" class="py-4 px-4 text-center text-gray-500">
                            No inventories found for this item.
                        </td>
                    </tr>
                @endforelse
            </x-slot>

        </x-table>
    </div>
</div>
