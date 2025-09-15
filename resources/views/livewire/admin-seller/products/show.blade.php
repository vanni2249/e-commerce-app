<div>
    <div class="px-4 space-y-4">
        <x-card>
            <header class="flex justify-between items-center">
                <h1 class="text-md font-bold">{{ $product->number }}</h1>
                <x-dropdown>
                    <x-slot name="trigger">
                        <x-icon-button icon="ellipsis-vertical" />
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link
                            href="{{ $admin
                                ? route('admin.products.inventories.index', ['product' => $product->id])
                                : route('sellers.products.inventories.index', ['product' => $product->id]) }}"
                            wire:navigate>
                            Inventories
                        </x-dropdown-link>
                        <x-dropdown-link
                            href="{{ $admin
                                ? route('admin.products.sales.index', ['product' => $product->id])
                                : route('sellers.products.sales.index', ['product' => $product->id]) }}"
                            wire:navigate>
                            Sales
                        </x-dropdown-link>
                        <x-dropdown-link
                            href="{{ $admin
                                ? route('admin.products.refunds.index', ['product' => $product->id])
                                : route('sellers.products.refunds.index', ['product' => $product->id]) }}"
                            wire:navigate>
                            Refunds
                        </x-dropdown-link>
                        <x-dropdown-link
                            href="{{ $admin
                                ? route('admin.items.show', ['item' => $product->item->id])
                                : route('sellers.items.show', ['item' => $product->item->id]) }} "
                            wire:navigate>
                            Item
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </header>
        </x-card>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($widgets as $widget)
                <x-card>
                    <header class="flex justify-between items-center">
                        <h3 class="text-sm text-gray-600 font-semibold">{{ $widget['label'] }}</h3>

                        <p class="text-lg font-bold">{{ $widget['value'] }}</p>
                    </header>
                </x-card>
            @endforeach
        </div>

        <x-card>
            <header class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold">Sales</h2>
                <a href="#" class="text-sm text-blue-800 font-medium hover:underline" wire:navigate>View all</a>
            </header>
            <x-table>
                <x-slot name="head">
                    <tr>
                        <th class="p-4">Number</th>
                        <th class="p-4">Order</th>
                        <th class="p-4">Quantity</th>
                        <th class="p-4">Price</th>
                        <th class="p-4">Shipping</th>
                        <th class="p-4">Seller</th>
                        <th class="p-4 w-14">Actions</th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    <tr>
                        <td class="p-4 text-center" colspan="6">
                            No sales found.
                        </td>
                    </tr>
                </x-slot>
            </x-table>
        </x-card>
    </div>
</div>
