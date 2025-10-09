<div>
    <x-card>
        <header class="flex justify-between items-center mb-4">
            <h1 class="text-md font-bold">Products</h1>
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
                    <th class="p-4"></th>
                    <th class="p-4">Numbers</th>
                    <th class="p-4">Item number</th>
                    <th class="p-4">Variants</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Inventories<br>qty</th>
                    <th class="p-4">Sales<br>qty</th>
                    <th class="p-4">Balance<br>qty</th>
                    <th class="p-4">Avg<br>price</th>
                    <th class="p-4 w-14">Action</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @forelse ($products as $product)
                    <tr class="border-t border-gray-200">
                        <td class="px-1 py-1">
                            <a href="{{ route('admin.products.show', $product) }}">
                                <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                    class="max-w-[56px] h-auto rounded object-cover" alt="">
                            </a>
                        </td>
                        <td class="px-2 py-1">
                            <a href="{{ route($admin ? 'admin.products.show' : 'sellers.products.show', $product) }}"
                                class="text-blue-500 hover:underline">
                                <span class="text-sm">{{ $product->number }}</span>
                            </a>
                        </td>
                        <td class="px-2 py-1">
                            <a href="{{ route($admin ? 'admin.items.show' : 'sellers.items.show', $product->item) }}"
                                class="text-blue-500 hover:underline">
                                <span class="text-sm">{{ $product->item->number }}</span>
                            </a>
                        </td>
                        <td class="p-1 text-xs space-y-1">
                            @forelse ($product->variants as $variant)
                                <div class="bg-blue-50 p-1 rounded">
                                    <span class="font-semibold">{{ $variant->attribute->name }}:</span>
                                    <span>{{ $variant->en_name }}</span>
                                </div>

                            @empty
                                ...
                            @endforelse
                        </td>
                        <td class="px-2 py-1">
                            @if ($product->item->is_active)
                                <x-badge color="success">Active</x-badge>
                            @else
                                <x-badge color="warning">Inactive</x-badge>
                            @endif
                        </td>
                        <td class="px-2 py-1">
                            {{ $product->inventories->sum('quantity') }}
                            <br>
                            <a href="{{ route($admin ? 'admin.products.inventories.index' : 'sellers.products.inventories.index', ['product' => $product->id]) }}"
                                class="text-blue-500 hover:underline text-xs" wire:navigate>
                                Inventories
                            </a>
                        </td>
                        <td class="px-2 py-1">
                            {{ $product->sales->sum('quantity') }}
                        </td>
                        <td class="px-2 py-1">
                            {{ $product->inventories->sum('quantity') - $product->sales->sum('quantity') }}
                        </td>
                        <td class="px-2 py-1">
                            {{-- price avg --}}
                            ${{ number_format($product->inventories->avg('price'), 2) }}
                        </td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <x-icon-link
                                    href="{{ route($admin ? 'admin.products.show' : 'sellers.products.show', $product) }}"
                                    icon="eye" wire:navigate />

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="p-4">
                            <div class="text-center text-gray-500">
                                No products found.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </x-slot>
        </x-table>
    </x-card>
</div>
