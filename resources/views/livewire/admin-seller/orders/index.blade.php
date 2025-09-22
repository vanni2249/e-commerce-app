<div>
    <div class="px-4">
        <x-card>
            <header class="flex justify-between items-center mb-4">
                <h1 class="text-lg font-bold">Orders</h1>
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
                        <th class="p-4">Numbers</th>
                        <th class="p-4">Date</th>
                        <th class="p-4">Customer</th>
                        <th class="p-4">Address</th>
                        <th class="p-4">Items</th>
                        <th class="p-4">Products</th>
                        <th class="p-4">Total</th>
                        <th class="p-4">Shipped</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 w-14">Action</th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @forelse ($orders as $order)
                        <tr class="border-t border-gray-200">
                            <td class="p-4">
                                <a href="{{ route($admin ? 'admin.orders.show' : 'sellers.orders.show', $order) }}"
                                    class="text-blue-600 hover:underline" wire:navigate>
                                    {{ $order->number }}
                                </a>
                            </td>
                            <td class="p-4">
                                {{ $order->created_at->format('m/d/Y h:m a') }}
                            </td>
                            <td class="p-4">
                                {{ $order->user->name }}
                            </td>
                            <td class="p-4">
                                <span class="capitalize">
                                    {{ $order->address->type }}
                                </span>
                                <br>
                                <span class="">
                                    {{ $order->address->city->name }}
                                </span>
                            </td>
                            <td class="p-4">
                                @if ($admin)
                                    {{ $order->sales->count() }}
                                @else
                                    {{ $order->sales->where('product.item.seller_id', Auth::user()->seller->id)->count() }}
                                @endif
                            </td>
                            <td class="p-4">
                                @if ($admin)
                                    {{ $order->sales->sum('quantity') }}
                                @else
                                    {{ $order->sales->where('product.item.seller_id', Auth::user()->seller->id)->sum('quantity') }}
                                @endif
                            </td>
                            <td class="p-4">
                                ${{ number_format($order->transaction->amount, 2) }}
                            </td>
                            <td class="p-4">
                                0/
                                @if ($admin)
                                    {{ $order->sales->count() }}
                                @else
                                    {{ $order->sales->where('product.item.seller_id', Auth::user()->seller->id)->count() }}
                                @endif
                            </td>
                            <td class="p-4">
                                <x-badge color="danger">Processing</x-badge>
                            </td>
                            <td class="p-4 flex justify-end">
                                <x-icon-link href="{{ route($admin ? 'admin.orders.show' : 'sellers.orders.show', $order) }}"
                                    icon="eye" wire:navigate />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-2 text-center text-gray-500">
                                No orders found.
                            </td>
                        </tr>
                    @endforelse
                </x-slot>
            </x-table>
        </x-card>
        {{-- </div> --}}
    </div>
</div>
