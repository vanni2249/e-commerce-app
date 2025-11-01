<div>
    <x-card>
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
    </x-card>
</div>
