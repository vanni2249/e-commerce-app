<div class="space-y-4 md:space-y-2">
    <header class="flex items-center justify-between px-1">
        <h1 class="text-lg font-bold">Items</h1>
        <x-button wire:click="handleCreateItemModal" value="New item" />
    </header>
    <!-- Menu's -->
    <div class="grid grid-cols-1">
        <!-- Shop Menu - Horizontal scrollable -->
        <menu class="flex space-x-4 px-1 overflow-x-auto no-scrollbar min-w-0">
            <div class="flex space-x-4 min-w-max">
                @foreach (App\Models\Shop::all() as $shop)
                    <li class="flex-shrink-0">
                        <a href="{{ route('admin.items.index', ['shop' => $shop->slug, 'status' => 'approved']) }}"
                            @class([
                                'block border-b-3 text-xs text-gray-800 font-bold uppercase whitespace-nowrap px-1',
                                'hover:border-blue-600' => request()->segment(3) != $shop->slug,
                                'active:border-blue-600',
                                'border-blue-600' => request()->segment(3) == $shop->slug,
                                'border-transparent' => request()->segment(3) != $shop->slug,
                            ]) wire:navigate>
                            {{ $shop->name }}
                        </a>
                    </li>
                @endforeach
            </div>
        </menu>

        <!-- Status Menu - Horizontal scrollable -->
        <menu class="flex flex-row space-x-4 pb-1 overflow-x-auto no-scrollbar border-y border-gray-200 py-2 min-w-0">
            <div class="flex space-x-4 min-w-max px-1">
                <li class="flex-shrink-0">
                    <a href="{{ route('admin.items.index', ['shop' => $this->segments['3'], 'status' => 'all']) }}"
                        @class([
                            'text-xs font-bold px-4 py-1 rounded-full hover:bg-blue-600 hover:text-white flex-shrink-0 whitespace-nowrap',
                            'bg-blue-600 text-white' => $this->segments['4'] == 'all',
                            'bg-white text-gray-600' => $this->segments['4'] != 'all',
                        ])>
                        All
                    </a>
                </li>
                @foreach ($itemStatuses as $itemStatus)
                    <li class="flex-shrink-0">
                        <a href="{{ route('admin.items.index', ['shop' => $this->segments['3'], 'status' => $itemStatus->slug]) }}"
                            @class([
                                'text-xs font-bold px-4 py-1 rounded-full hover:bg-blue-600 hover:text-white whitespace-nowrap flex-shrink-0',
                                'bg-blue-600 text-white' => $this->segments['4'] == $itemStatus->slug,
                                'bg-white text-gray-600' => $this->segments['4'] != $itemStatus->slug,
                            ])>
                            {{ $itemStatus->name }}
                        </a>
                    </li>
                @endforeach
            </div>
        </menu>
    </div>
    <div class="bg-white rounded-xl space-y-4 p-4">
        <!-- Filters -->
        <div class="md:flex md:justify-between space-y-2 md:space-y-0 items-center">
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
        <!-- Table -->
        <x-table>
            <x-slot name="head">
                <tr>
                    <th class="p-4"></th>
                    <th class="p-4">
                        Numbers
                        @if ($admin)
                            <br>
                            Seller
                        @endif
                    </th>
                    <th class="p-4">Shop<br>Fulfillment</th>
                    <th class="p-4">Section</th>
                    <th class="p-4">Variants<br />Products</th>
                    <th class="p-4">Status</th>
                    @if ($segments['4'] != 'draft')
                        <th class="p-4">Inventories<br>qty</th>
                        <th class="p-4">Sales<br>qty</th>
                        <th class="p-4">Stock</th>
                        <th class="p-4">Avg<br>price</th>
                        <th class="p-4">Gain net</th>
                    @endif
                    <th class="w-14">Action</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @forelse($items as $item)
                    <tr class="border-t border-gray-200">
                        <!-- Image -->
                        <td class="px-1 py-1">
                            <a href="{{ route('admin.items.show', $item) }}">
                                <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                    class="max-w-[56px] h-auto rounded" alt="">
                            </a>
                        </td>
                        <!-- Id -->
                        <td class="px-4 py-1">
                            <span>{{ $item->number }}</span>
                            @if ($admin)
                                <br>
                                <span>{{ $item->seller->store_name ?? '...' }}</span>
                            @endif
                        </td>
                        <!-- Shop & Fulfillment -->
                        <td class="px-4 py-1">
                            <span>{{ $item->shop->name }}</span>
                            <br>
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
                            <x-badge :color="$item->item_status['variant']">
                                {{ ucfirst($item->item_status['name']) }}
                            </x-badge>
                        </td>
                        @if ($segments['4'] != 'draft')
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
                                @if ($item->products->count() > 0)
                                    ${{ $item->products->min('price') }} - ${{ $item->products->max('price') }}
                                @else
                                    ...
                                @endif
                            </td>
                            <!-- Gain net -->
                            <td class="px-4 py-1">
                                ${{ number_format($item->products->sum(fn($product) => $product->sales->sum(fn($sale) => $sale->quantity * $sale->price)), 2) }}
                            </td>
                        @endif
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
                @empty
                    <tr>
                        <td colspan="12" class="p-4 text-center text-gray-500">
                            No items found.
                        </td>
                    </tr>
                @endforelse
            </x-slot>
        </x-table>
    </div>
    <div class="px-4 pb-4">

        @if ($items->hasPages())
            <!-- Pagination -->
            <div class="mt-4">
                {{ $items->links() }}
            </div>
        @endif
    </div>
    <!-- Modal for creating a new item -->
    <x-modal name="create-item-modal" title="Create item" size="md">
        <form wire:submit="store" class="space-y-4">
            <!-- If admin is true get sellers -->
            <div>
                <x-label value="Seller" />
                <x-select wire:model.live="seller_id" class="w-full">
                    <option value="">Select a seller</option>
                    @foreach ($sellers as $seller)
                        <option value="{{ $seller->id }}">{{ $seller->store_name }}</option>
                    @endforeach

                </x-select>
                @error('seller_id')
                    <x-error message="{{ $message }}" />
                @enderror
            </div>
            <!-- Shops -->
            <div>
                <x-label value="Shops" />
                <x-select :disabled="$seller_id ? false : true" wire:model="shop_id" @class(['w-full'])>
                    <option value="">Select a shops</option>
                    @foreach ($shops as $shop)
                        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                    @endforeach
                </x-select>
                @error('shop_id')
                    <x-error message="{{ $message }}" />
                @enderror
            </div>

            <!-- Fulfillment -->
            <div>
                <x-label value="Fulfillment" />
                <x-select :disabled="$seller_id ? false : true" wire:model="fulfillment_id" class="w-full">
                    <option value="">Select a fulfillment</option>
                    @foreach ($fulfillments as $fulfillment)
                        <option value="{{ $fulfillment->id }}">{{ $fulfillment->name }}</option>
                    @endforeach
                </x-select>
                @error('fulfillment_id')
                    <x-error message="{{ $message }}" />
                @enderror
            </div>

            <!-- Section -->
            <div>
                <x-label value="Section" />
                <x-select :disabled="$seller_id ? false : true" wire:model="section_id" class="w-full">
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
                <x-button type="Submit" label="Create" />
            </div>
        </form>
    </x-modal>
</div>
