<x-layouts.customer>
    <div class="grid grid-cols-12 gap-4">
        <div class="hidden lg:block lg:col-span-3">
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Filters</h2>
                </header>
                @php
                $items = [
                'All Orders',
                'Pending',
                'Shipped',
                'Delivered',
                'Cancelled',
                'Returns',
                'Refunds'
                ];
                $active = 'All Orders';
                $activeClass = 'text-blue-600 bg-blue-50 block py-1 px-2 rounded-xl';
                $inactiveClass = 'text-gray-600 hover:bg-blue-50 hover:text-blue-600 block py-1 px-2 rounded-xl';
                @endphp
                <ul class="space-y-0.5">
                    @foreach ($items as $item)
                    <li>
                        <a href="#" class="{{ $active === $item ? $activeClass : $inactiveClass }}">{{ $item }}</a>
                    </li>
                    @endforeach
                </ul>
            </x-card>
        </div>
        <div class="col-span-12 lg:col-span-9">
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Your Orders</h2>
                </header>
                <div class="space-y-2">
                    @for ($i = 0; $i < rand(1, 15); $i++)
                        <a href="{{ route('orders.show', ['order' => $i]) }}" class="border border-blue-50 hover:bg-blue-50 block p-2 md:p-4 rounded-xl">
                            <div class="flex space-x-4 items-start">
                                <div class="bg-blue-100 flex flex-col justify-center items-center p-2 rounded">
                                    <span class="text-xs font-bold text-gray-600">Items</span>
                                    <span class="text-blue-600 font-bold">
                                        {{ rand(1, 5) }}
                                    </span>
                                </div>
                                <ul class="grow">
                                    <li class="text-xs">Order #12345</li>
                                    <li class="text-gray-500 text-xs">Placed on January 1, 2023</li>
                                    <li class="text-sm font-bold">$45.60</li>
                                </ul>
                                <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-medium">
                                    Shipped
                                </div>
                            </div>
                        </a>
                    @endfor
                </div>
        </x-card>
    </div>

    </div>
</x-layouts.customer>