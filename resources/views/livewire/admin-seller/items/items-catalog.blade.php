<div>
    <x-card>
        <!-- Header -->
        <!-- Table -->
        <div class="md:flex md:justify-between space-y-2 md:space-y-0 items-center mb-2">
            <div class="">
                <x-input placeholder="Buscar" class="w-full" />
            </div>
            <div class="flex space-x-2">
                <div class="bg-gray-200 rounded-md p-1">
                    <span class="pl-2 uppercase text-xs font-bold text-gray-600 leading-tight">Mostra</span>
                    <select wire:model.live="perPage" class="mx-2 rounded-md text-sm">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                    </select>
                </div>
                <div>
                    <x-button variant="light">Filtro</x-button>
                </div>
            </div>
        </div>
        <x-table>
            <x-slot name="head">
                <tr>
                    <th class="p-4"></th>
                    <th class="p-4">Numbers</th>
                    @if ($admin)
                        <th class="p-4">Seller</th>
                    @endif
                    <th class="p-4">Shop</th>
                    <th class="p-4">Fulfillment</th>
                    <th class="p-4">Section</th>
                    <th class="p-4">Variants<br />Products</th>
                    <th class="p-4">Status</th>
                    {{-- <th class="p-4">Inventories<br>qty</th>
                    <th class="p-4">Sales<br>qty</th>
                    <th class="p-4">Stock</th>
                    <th class="p-4">Avg<br>price</th>
                    <th class="p-4">Gain net</th> --}}
                    <th class="w-14">Action</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach ($items as $item)
                    <tr class="border-t border-gray-200">
                        <!-- Image -->
                        <td class="px-1 py-1">
                            <a href="{{ route('admin.items.show', $item) }}">
                                <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                    class="max-w-[56px] h-auto rounded" alt="">
                            </a>
                        </td>
                        <!-- Id -->
                        <td class="px-4 py-1">{{ $item->number }}</td>
                        @if ($admin)
                            <td class="px-4">{{ $item->seller->store_name ?? '...' }}</td>
                        @endif
                        <!-- Shop & Fulfillment -->
                        <td class="px-4 py-1">
                            {{ $item->shop->name }}
                        </td>

                        <!-- Fulfillment -->
                        <td class="px-4 py-1">
                            <span>{{ $item->fulfillment->name }}</span>
                        </td>
                        <!-- Section -->
                        <td class="px-4 py-1">
                            <span>{{ $item->section->name }}</span>
                        </td>
                        <!-- Variants & Products -->
                        <td class="px-4 py-1">
                            <span class="text-sm">{{ $item->variants->count() }} /
                                {{ $item->products->count() }}</span>

                        </td>
                        <!-- status -->
                        <td class="px-4 py-1">
                            {{-- @if ($item->available_at == null)
                                <x-badge color="warning">Draft</x-badge>
                            @else
                                @if ($item->approved_at == null)
                                    <x-badge color="success">Non approved</x-badge>
                                @else
                                    @if ($item->is_active)
                                        <x-badge color="success">Active</x-badge>
                                    @else
                                        <x-badge color="danger">Inactive</x-badge>
                                    @endif
                                @endif
                            @endif --}}
                            <x-badge :color="$item->status['variant']">
                                {{ ucfirst($item->status['label']) }}
                            </x-badge>
                        </td>
                        <!-- inventories -->
                        {{-- <td class="px-4 py-1">
                            {{ $item->products->sum(fn($product) => $product->inventories->sum('quantity')) }}
                        </td> --}}
                        <!-- Sales -->
                        {{-- <td class="px-4 py-1">
                            {{ $item->products->sum(fn($product) => $product->sales->sum('quantity')) }}
                        </td> --}}
                        <!-- Stock -->
                        {{-- <td class="px-4 py-1">
                            <span class="text-sm">
                                {{ $item->products->sum(fn($product) => $product->inventories->sum('quantity')) - $item->products->sum(fn($product) => $product->sales->sum('quantity')) }}
                            </span>
                        </td> --}}
                        <!-- Low price & hight price -->
                        {{-- <td class="px-4 py-1">
                            @if ($item->products->count() > 0)
                                ${{ $item->products->min('price') }} - ${{ $item->products->max('price') }}
                            @else
                                ...
                            @endif
                        </td> --}}
                        <!-- Gain net -->
                        {{-- <td class="px-4 py-1">
                            ${{ number_format($item->products->sum(fn($product) => $product->sales->sum(fn($sale) => $sale->quantity * $sale->price)), 2) }}
                        </td> --}}
                        <td class="text-right p-4">
                            <div class="flex items-center space-x-2">
                                @if ($this->admin)
                                    <x-icon-link href="{{ route('admin.items.edit', $item) }}" wire:navigate
                                        icon="pencil" />
                                    <x-icon-link href="{{ route('admin.items.show', $item) }}" wire:navigate
                                        icon="eye" />
                                @else
                                    <x-icon-link href="{{ route('sellers.items.show', $item) }}" wire:navigate
                                        icon="eye" />
                                    <x-icon-link href="{{ route('sellers.items.edit', $item) }}" wire:navigate
                                        icon="pencil" />
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        @if ($items->hasPages())
            <!-- Pagination -->
            <div class="mt-4">
                {{ $items->links() }}
            </div>
        @endif
    </x-card>
</div>
