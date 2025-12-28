<div>
    <div class="bg-white rounded-lg space-y-4 p-4">
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
        <!-- Table -->
        <x-table>
            <x-slot name="head">
                <tr>
                    <th class="py-2 px-4">Sale<br/>Number</th>
                    <th class="py-2 px-4">Order<br/>number</th>
                    <th class="py-2 px-4">Product<br/>number</th>
                    <th class="py-2 px-4">Quantity</th>
                    <th class="py-2 px-4">Price</th>
                    <th class="py-2 px-4">Shipping<br/>Cost</th>
                    <th class="py-2 px-4">Percentage<br/>Fee</th>
                    <th class="py-2 px-4">Fixed<br/>Fee</th>
                    <th class="py-2 px-4">Seller</th>
                    <th class="py-2 px-4">Status</th>
                    <th class="py-2 px-4">Created at</th>
                    <th class="py-2 px-4">Updated at</th>
                    <th class="py-2 px-4">Action</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @forelse ($sales as $sale)
                    <tr>
                        <td class="py-2 px-4">{{ $sale->number }}</td>
                        <td class="py-2 px-4">{{ $sale->order->number }}</td>
                        <td class="py-2 px-4">{{ $sale->product->number }}</td>
                        <td class="py-2 px-4">{{ $sale->quantity }}</td>
                        <td class="py-2 px-4">{{ $sale->price }}</td>
                        <td class="py-2 px-4">{{ $sale->shipping_cost }}</td>
                        <td class="py-2 px-4">{{ $sale->percentage_fee }}</td>
                        <td class="py-2 px-4">{{ $sale->fixed_fee }}</td>
                        <td class="py-2 px-4">{{ $sale->product->item->seller->store_name }}</td>
                        <td class="py-2 px-4">{{ $sale->status }}</td>
                        <td class="py-2 px-4">{{ $sale->created_at->format('M d, Y  H:i:s') }}</td>
                        <td class="py-2 px-4">{{ $sale->updated_at->format('M d, Y  H:i:s') }}</td>
                        <td class="py-2 px-4">
                            {{-- <x-button href="{{ route('admin.seller.items.show', $sale->id) }}">View</x-button> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="13" class="py-4 px-4 text-center text-gray-500">
                            No sales found for this item.
                        </td>
                    </tr>
                @endforelse
            </x-slot>

        </x-table>
    </div>
</div>
