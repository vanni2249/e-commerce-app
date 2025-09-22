<div>
    <div class="px-4">
        <x-card>
            <header class="flex justify-between items-center mb-4">
                <h1 class="text-lg font-bold">Sales</h1>
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
                        <th class="p-4 w-16"></th>
                        <th class="p-4">Number</th>
                        <th class="p-4">Product</th>
                        <th class="p-4">Price</th>
                        <th class="p-4">Quantity</th>
                        <th class="p-4">Sub <br />Total</th>
                        <th class="p-4">Shipping</th>
                        <th class="p-4">Total</th>
                        <th class="p-4 w-14">Actions</th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @forelse ($sales as $sale)
                        <tr class="border-t border-gray-200">
                            <td class="p-1 flex items-center space-x-2">
                                <img src="" alt="" class="w-16 h-16 object-cover">
                            </td>
                            <td class="p-4">
                                <span>{{ $sale->number }}</span>
                            </td>
                            <td class="p-4">
                                {{ $sale->product->number }}
                            </td>
                            <td class="p-4">
                                ${{ $sale->price }}
                            </td>
                            <td class="p-4">
                                {{ $sale->quantity }}
                            </td>
                            <td class="p-4">
                                ${{ number_format($sale->price * $sale->quantity, 2) }}
                            </td>
                            <td class="p-4">
                                ${{ $sale->shipping_cost ?? 'Free' }}
                            </td>
                            <td class="p-4">
                                ${{ number_format($sale->price * $sale->quantity + ($sale->shipping_cost ?? 0), 2) }}
                            </td>
                            <td class="p-4">
                                <div class="flex justify-end">
                                    <x-icon-link href="{{ route($admin ? 'admin.sales.show' : 'sellers.sales.show', ['sale' => $sale->id]) }}" icon="eye" wire:navigate />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="p-4 text-center text-gray-500">
                                No sales found.
                            </td>
                        </tr>
                    @endforelse
                </x-slot>
            </x-table>
        </x-card>
    </div>
</div>
