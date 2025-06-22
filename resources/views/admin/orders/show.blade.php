<x-layouts.admin>
    <div class="grid grid-cols-12 gap-4 px-4">
        <div class="col-span-full md:col-span-6 ">
            <x-card class="h-full">
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Order</h2>
                </header>
                @php
                $collection = collect([
                ['title' => 'Number', 'value' => '12345'],
                ['title' => 'Date', 'value' => 'January 1, 2023'],
                ['title' => 'Status', 'value' => 'Shipped'],
                ['title' => 'Tracking number', 'value' => '123456789'],
                ['title' => 'Total', 'value' => '$45.60'],
                ['title' => 'Shipping address', 'value' => 'Urbanizacion Villas del Prado, Calle del Sol 125, Juana Diaz
                PR 00795'],
                ['title' => 'Phone', 'value' => '+1 (555) 123-4567'],
                ['title' => 'Payment method', 'value' => 'Credit Card (**** **** **** 1234)'],
                ['title' => 'Order placed on', 'value' => 'January 1, 2023'],
                ['title' => 'Estimated delivery', 'value' => 'January 5, 2023'],
                ['title' => 'Shipping method', 'value' => 'Standard Shipping'],
                ['title' => 'Tracking URL', 'value' => '<a href="#" class="text-blue-600 hover:underline">Track your
                    order</a>']
                ]);
                @endphp
                <ul class="space-y-4 text-sm text-gray-600">
                    @foreach ($collection as $item)
                    <li class="flex flex-col">
                        <span class="text-xs font-semibold">{{ $item['title'] }}</span>
                        <span class="text-gray-800 text-sm">{!! $item['value'] !!}</span>
                    </li>
                    @endforeach
                </ul>
            </x-card>
        </div>

        <div class="col-span-full md:col-span-6">
            <x-card class="h-full">
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Items in order</h2>
                </header>
                <div class="space-y-2">
                    @for ($i = 0; $i < 5; $i++) <div class="bg-gray-50 rounded-xl flex">
                        <div class="p-2 md:p-0">
                            <img src="{{ asset('images/'.rand(1, 4).'-512.png') }}"
                                class="w-24 md:w-32  rounded md:rounded-none md:rounded-l-xl" alt="">
                        </div>
                        <div class="grow p-2">
                            <header class="md:flex md:justify-between items-start mb-2">
                                <h2 class="text-gray-800 text-sm md:text-base lg:text-lg font-semibold">
                                    Lorem ipsum dolor sit amet.
                                </h2>
                                <ul class="md:text-right">
                                    <li class="text-blue-500 font-semibold text-sm md:text-base lg:text-lg">
                                        $19.99
                                    </li>
                                    <li class="text-xs text-gray-500 whitespace-nowrap">
                                        +$1.99 shipping
                                    </li>
                                </ul>
                            </header>
                            <div class="flex">
                                <!-- Quantity Selector -->
                                <span class="bg-blue-100 rounded text-gray-600 px-2 py-1 text-xs">
                                    Quantity: {{ rand(1, 5) }}
                                </span>
                            </div>
                        </div>
                </div>
                @endfor
        </div>
        </x-card>
    </div>
    <!-- Actions -->
    <div class="col-span-full">

        <x-card class="h-full">
            <header class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold">Order actions</h2>
            </header>
            <div>
                <x-table>
                    <x-slot name="head">
                        <tr>
                            <th class="p-4 w-1/6">Actions</th>
                            <th class="p-4 w-1/6">Created<br>At</th>
                            <th class="p-4 w-1/6">Created<br>By</th>
                            <th class="p-4 w-64">Comment</th>
                        </tr>
                    </x-slot>
                    <x-slot name="body">
                        @for ($i = 0; $i < rand(2,10); $i++) <tr class="border-t border-gray-200">
                            <td class="p-4">Order picking</td>
                            <td class="p-4">2023-10-01</td>
                            <td class="p-4">John Doe</td>
                            <td class="p-4 whitespace-nowrap line-clamp-3">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero molestiae veritatis
                                sint.
                            </td>
                            </tr>
                            @endfor
                    </x-slot>
                </x-table>
            </div>
        </x-card>
    </div>

    </div>
</x-layouts.admin>