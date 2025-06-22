<x-layouts.admin>
     <div class="grid grid-cols-12 gap-4 px-4">
        <div class="col-span-12">
            <x-card>
                <header class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Return</h2>
                    <div class="flex items-center space-x-2">
                    </div>
                </header>
                @php
                $data = [
                [
                'title' => 'Product ID',
                'value' => 'fhur83h',
                ],
                [
                'title' => 'Status',
                'value' => 'Processing'
                ],
                [
                'title' => 'Quantity',
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
                'title' => 'Price Unit',
                'value' => '25.25'
                ],
                [
                'title' => 'Amount',
                'value' => '100'
                ],
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
        <div class="col-span-full">
            <!-- Actions -->
            <x-card class="h-full">
                <header class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Actions</h2>
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
                            @for ($i = 0; $i < rand(2,10); $i++)
                                <tr class="border-t border-gray-200">
                                    <td class="p-4">Order picking</td>
                                    <td class="p-4">2023-10-01</td>
                                    <td class="p-4">John Doe</td>
                                    <td class="p-4 whitespace-nowrap line-clamp-3">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero molestiae veritatis sint.
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