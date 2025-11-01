<div>
    <x-card>
        <!-- Shop Menu - Horizontal scrollable -->
        <menu class="flex space-x-2 overflow-x-auto no-scrollbar min-w-0 mb-4">
            {{-- <div class="flex space-x-4 min-w-max"> --}}
                @foreach ($types as $typeCollection)
                    <li class="flex-shrink-0">
                        <button @class([
                            'text-xs font-bold px-4 py-1 rounded-full hover:bg-gray-200 hover:text-gray-800 whitespace-nowrap cursor-pointer flex-shrink-0',
                            'bg-gray-200 text-gray-800' => $typeCollection['value'] == $type,
                            'border border-gray-200 text-gray-600' => $typeCollection['value'] != $type,
                        ])
                            wire:click="setType('{{ $typeCollection['value'] }}')">{{ $typeCollection['name'] }}</button>
                    </li>
                @endforeach
            {{-- </div> --}}
        </menu>
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
    </x-card>
</div>
