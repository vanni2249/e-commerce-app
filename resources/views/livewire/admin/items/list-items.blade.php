<div>
    <header class="flex justify-between items-center mb-4">
        <h1 class="text-lg font-bold">Items</h1>
        <x-icon-button wire:click="handleCreateItemModal" icon="plus" />
        <x-modal name="create-item-modal" title="Create item">
            @if ($sellers)
                <form wire:submit="store" class="space-y-4">
                    <div>
                        <x-label value="Seller" />
                        <x-select wire:model="seller_id" class="w-full">
                            <option value="">Select a seller</option>
                            @foreach ($sellers as $seller)
                                <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                            @endforeach

                        </x-select>
                        @error('seller_id')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    <div>
                        <x-label value="Section" />
                        <x-select wire:model="section_id" class="w-full">
                            <option value="">Select a section</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </x-select>
                        @error('section_id')
                            <x-error message="{{ $message }}" />
                        @enderror
                    </div>
                    <div>
                        <x-button type="Submit" variant="light" size="sm" label="Create" />
                    </div>
                </form>
            @endif
        </x-modal>
    </header>
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
                <th class="p-4">Section</th>
                <th class="p-4">Variants</th>
                <th class="p-4">Products</th>
                <th class="p-4">Status</th>
                <th class="p-4">Inventories<br>qty</th>
                <th class="p-4">Sales<br>qty</th>
                <th class="p-4">Stock</th>
                <th class="p-4">Avg<br>price</th>
                <th class="p-4">Gain net</th>
                <th class="p-4">Seller</th>
                <th class=" w-14">Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($items as $item)
                <tr class="border-t border-gray-200">
                    <td class="px-1 py-1">
                        <a href="{{ route('admin.items.show', $item) }}">
                            <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                class="max-w-[56px] h-auto rounded" alt="">
                        </a>
                    </td>
                    <!-- Id -->
                    <td class="px-4 py-1">
                        <a href="{{ route('admin.items.show', $item->id) }}">
                            {{ $item->id }}
                        </a>
                    </td>
                    <!-- Category or sections -->
                    <td class="px-4 py-1">
                        <span class="text-sm">{{ $item->section->name }}</span>
                    </td>
                    <!-- Variants -->
                    <td class="px-4 py-1">
                        <span class="text-sm">{{ rand(1, 5) }}</span>
                    </td>
                    <!-- Products -->
                    <td class="px-4 py-1">
                        {{ $item->products->count() }}
                    </td>
                    <!-- status -->
                    <td class="px-4 py-1">
                        <x-badge
                            color="{{ rand(0, 1) ? 'green' : 'red' }}">{{ rand(0, 1) ? 'Active' : 'Inactive' }}</x-badge>
                    </td>
                    <!-- inventories -->
                    <td class="px-4 py-1">
                        {{ $item->products->sum(fn($product) => $product->inventories->sum('quantity')) }}
                    </td>
                    <!-- Sales -->
                    <td class="px-4 py-1">
                        {{ $item->products->sum(fn($product) => $product->sales->sum('quantity')) }}
                    </td>
                    <!-- Stock -->
                    <td class="px-4 py-1">
                        <span class="text-sm">
                            {{ $item->products->sum(fn($product) => $product->inventories->sum('quantity')) - $item->products->sum(fn($product) => $product->sales->sum('quantity')) }}
                        </span>
                    </td>
                    <!-- Low price & hight price -->
                    <td class="px-4 py-1">
                        ${{ $item->products->min('price') }} - ${{ $item->products->max('price') }}
                    </td>
                    <!-- Gain net -->
                    <td class="px-4 py-1">
                        ${{ number_format($item->products->sum(fn($product) => $product->sales->sum(fn($sale) => $sale->quantity * $sale->price)), 2) }}
                    </td>
                    <td class="px-4 py-1">
                        <span>
                            {{ $item->seller->name ?? 'N/A' }}
                        </span>
                        <br>
                        <small class="text-gray-500">
                            {{ \Carbon\Carbon::parse($item->created_at)->format('m/d/Y') }}
                        </small>
                    </td>
                    <td class="text-right py-1">
                        <div class="flex items-center space-x-2">
                            <x-icon-link href="{{ route('admin.items.show', $item) }}" icon="eye" />
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
</div>
