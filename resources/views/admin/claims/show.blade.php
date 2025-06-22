<x-layouts.admin>
     <div class="grid grid-cols-12 gap-4 px-4">
        <div class="col-span-full md:col-span-6 ">
            <x-card class="h-full">
                 <header class="mb-4">
                    <h2 class="text-lg font-semibold">Claim</h2>
                </header>
                @php
                    $collection = collect([
                        ['title' => 'Number', 'value' => '12345'],
                        ['title' => 'Date', 'value' => 'January 1, 2023'],
                        ['title' => 'Type claim', 'value' => rand(0, 1) ? 'Product Issue' : 'Shipping Issue'],
                        ['title' => 'Create by', 'value' => 'Generic User'],
                        ['title' => 'Created at', 'value' => 'January 1, 2023'],
                        ['title' => 'Amount', 'value' => '$45.60'],
                        ['title' => 'Total', 'value' => '$45.60'],
                        ['title' => 'Status', 'value' => rand(0, 1) ? 'Pending' : 'Resolved'],
                        ['title' => 'Action', 'value' => 
                            (function () {
                                $actions = [
                                    0 => 'Return sent',
                                    1 => 'Refund sent',
                                    2 => 'Replacement sent',
                                ];
                                $rand = rand(0, 2);
                                return $actions[$rand];
                            })()
                        ]
                    ]);
                @endphp
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($collection as $item)
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
     
        <div class="col-span-full md:col-span-6">
            <x-card class="h-full">
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Claim products</h2>
                </header>
                 <div class="space-y-2">
                    @for ($i = 0; $i < rand(1,5); $i++) <div class="bg-gray-50 rounded-xl flex">
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
    </div>
</x-layouts.admin>