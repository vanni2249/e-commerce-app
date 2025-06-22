<x-layouts.admin>
    <div class="grid grid-cols-12 gap-4 px-4">
        <div class="col-span-12">
            <x-card>
                <header class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Product Description</h2>
                    <div class="flex items-center space-x-2">
                    </div>
                </header>
                @php
                $data = [
                    [
                        'title' => 'Id',
                        'value' => 'fhur83h',
                    ],
                    [
                        'title' => 'Sku',
                        'value' => 'SKU123456',
                    ],
                    [
                        'title' => 'Items #',
                        'value' => '10'
                    ],
                    [
                        'title' => 'Variants #',
                        'value' => [
                            [
                                'name' => 'Color',
                                'value' => 'Red'
                            ],
                            [
                                'name' => 'Size',
                                'value' => 'M'
                            ]
                        ]
                    ],
                    [
                    'title' => 'Status',
                    'value' => 'Active'
                    ],
                    [
                    'title' => 'Inventories Qty',
                    'value' => '100'
                    ],
                    [
                    'title' => 'Sales Qty',
                    'value' => '50'
                    ],
                    [
                    'title' => 'Balance Qty',
                    'value' => '50'
                    ],
                    [
                    'title' => 'Avg Price',
                    'value' => '$20.00'
                    ],
                    [
                    'title' => 'Total Price',
                    'value' => '$1000.00'
                    ]
                ];
                @endphp
                <ul class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @foreach ($data as $item)
                    <li class="flex flex-col">
                        <span class="text-xs font-bold  text-gray-500">{{ $item['title'] }}</span>
                        @if(is_array($item['value']))
                            <span class="text-gray-700 text-sm">
                                @foreach($item['value'] as $subitem)
                                    @if(is_array($subitem) && isset($subitem['name']) && isset($subitem['value']))
                                        <div>{{ $subitem['name'] }}: {{ $subitem['value'] }}</div>
                                    @else
                                        <div>{{ $subitem }}</div>
                                    @endif
                                @endforeach
                            </span>
                        @else
                            <span class="text-gray-700 text-sm">{{ $item['value'] }}</span>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </x-card>
        </div>
        <div class="col-span-12 lg:col-span-6">
            <x-card class="h-full">
                <header class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Product Inventories</h2>
                     <div class="flex items-center space-x-2">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <x-button variant="light" size="sm">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-deep"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6h16" /><path d="M7 12h13" /><path d="M10 18h10" /></svg>
                                </x-button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ route('admin.products.inventories.index', ['product' => $product]) }}">View all inventories</x-dropdown-link>
                                <x-dropdown-link href="{{ route('admin.products.inventories.create', ['product' => $product]) }}">Add Inventory</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </header>
                <div>
                    <x-table>
                        <x-slot name="head">
                            <tr>
                                <th class="p-4">ID</th>
                                <th class="p-4">Created<br>At</th>
                                <th class="p-4">Quantity</th>
                                <th class="p-4">Cost<br>Unit</th>
                            </tr>
                        </x-slot>
                        <x-slot name="body">
                            @for ($i = 0; $i < rand(2,10); $i++)
                                <tr class="border-t border-gray-200">
                                    <td class="p-4">INV123456</td>
                                    <td class="p-4">2023-10-01</td>
                                    <td class="p-4">50</td>
                                    <td class="p-4">$10.00</td>
                                </tr>
                            @endfor 
                        </x-slot>
                    </x-table>
                </div>
            </x-card>
        </div>
        <div class="col-span-12 lg:col-span-6">
            <x-card class="h-full">
                <header class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Product Sales</h2>
                    <div class="flex items-center space-x-2">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <x-button variant="light" size="sm">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-deep"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6h16" /><path d="M7 12h13" /><path d="M10 18h10" /></svg>
                                </x-button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ route('admin.products.sales.index', ['product' => $product]) }}">View all sales</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </header>
                <x-table>
                    <x-slot name="head">
                        <tr>
                            <th class="p-4">ID</th>
                            <th class="p-4">Created<br>At</th>
                            <th class="p-4">Quantity</th>
                            <th class="p-4">Cost<br>Unit</th>
                        </tr>
                    </x-slot>
                    <x-slot name="body">
                        @for ($i = 0; $i < rand(5,15); $i++) 
                        <tr class="border-t border-gray-200">
                            <td class="p-4">INV123456</td>
                            <td class="p-4">2023-10-01</td>
                            <td class="p-4">50</td>
                            <td class="p-4">$10.00</td>
                        </tr>
                        @endfor
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>
</x-layouts.admin>