<div>
    <div class="bg-white rounded-xl space-y-4 p-4">
        <!-- Search & Filters -->
        <div class="md:flex md:justify-between space-y-2 md:space-y-0 items-center">
            <div class="">
                <x-input wire:model.live='search' placeholder="{{ __('Search') }}" class="w-full" />
            </div>
            <div class="flex space-x-2">
                <div class="bg-gray-200 rounded-md p-1">
                    <span class="pl-2 uppercase text-xs font-bold text-gray-600 leading-tight">{{ __('Show') }}</span>
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
        <!-- Table -->
        <x-table>
            <x-slot name="head">
                <tr>
                    <th class="p-4"></th>
                    <th class="p-4">
                        Numbers
                        <br>
                        Shop
                    </th>
                    <th class="p-4">Seller<br>Fulfillment</th>
                    <th class="p-4">Section</th>
                    <th class="p-4">Variants<br />Products</th>
                    <th class="p-4">Status</th>
                    @if ($shop != 'draft')
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
                            <a href="{{ route('admin.items.show', ['item' => $item->id, 'show' => 'sale']) }}">
                                <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                    class="max-w-[56px] h-auto rounded" alt="">
                            </a>
                        </td>
                        <!-- Id -->
                        <td class="px-4 py-1">
                            <span>{{ $item->number }}</span>
                            <br>
                            <span>{{ $item->shop->name }}</span>
                        </td>
                        <!-- Shop & Fulfillment -->
                        <td class="px-4 py-1">
                            <span>{{ $item->seller->store_name ?? '...' }}</span>
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
                        @if ($shop != 'draft')
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
                                <x-icon-link href="{{ route('admin.items.edit', ['item' => $item->id]) }}"
                                    wire:navigate icon="pencil" />
                                <x-icon-link
                                    href="{{ route('admin.items.show', ['item' => $item->id, 'collection' => 'sales']) }}"
                                    wire:navigate icon="eye" />
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
        <div class=" pb-4">

            @if ($items->hasPages())
                <!-- Pagination -->
                <div class="mt-4">
                    {{ $items->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Modal filter items -->
    <x-modal name="filter-items-modal" title="Filter items" size="sm">
        <form wire:submit.prevent='storeFilter' class="space-y-4">
            <!-- Sellers -->
            <div class="w-full">
                <x-label for="seller" value="Seller" />
                <x-select wire:model="filter_seller_id" class="w-full">
                    <option value="">All</option>
                    @foreach ($sellers as $seller)
                        <option value="{{ $seller->id }}">{{ $seller->store_name }}</option>
                    @endforeach
                </x-select>
            </div>
            <!-- Fulfillments -->
            <div class="w-full">
                <x-label for="fulfillment" value="Fulfillment" />
                <x-select wire:model="filter_fulfillment_id" class="w-full">
                    <option value="">All</option>
                    @foreach (App\Models\Fulfillment::all() as $seller)
                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                    @endforeach
                </x-select>
            </div>
            <!-- Sections -->
            <div class="w-full">
                <x-label for="section" value="Section" />
                <x-select wire:model="filter_section_id" class="w-full">
                    <option value="">All</option>
                    @foreach (App\Models\Section::all() as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </x-select>
            </div>
            <!-- Status -->
            <div class="w-full">
                <x-label for="status" value="Status" />
                <x-select wire:model="status" class="w-full">
                    <option value="all">All</option>
                    @foreach (App\Models\ItemStatus::all() as $itemStatus)
                        <option value="{{ $itemStatus->slug }}">{{ $itemStatus->name }}</option>
                    @endforeach
                </x-select>
            </div>
            <div>
                <x-button type="submit" value="{{ __('Filter') }}" />
            </div>
        </form>
    </x-modal>
</div>
