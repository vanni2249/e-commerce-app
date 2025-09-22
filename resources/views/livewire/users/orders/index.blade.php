<div>
    <div class="grid grid-cols-12 gap-4">
        <div class="hidden lg:block lg:col-span-3">
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Filters</h2>
                </header>
                @php
                    $items = ['All Orders', 'Pending', 'Shipped', 'Delivered', 'Cancelled', 'Returns', 'Refunds'];
                    $active = 'All Orders';
                    $activeClass = 'text-blue-600 bg-blue-50 block py-2 px-2 rounded';
                    $inactiveClass = 'text-gray-500 hover:bg-blue-50 hover:text-blue-600 block py-2 px-2 rounded';
                @endphp
                <ul class="space-y-1">
                    @foreach ($items as $item)
                        <li>
                            <a href="#"
                                class="text-sm font-bold  capitalize {{ $active === $item ? $activeClass : $inactiveClass }}">{{ $item }}</a>
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
                    @foreach ($orders as $order)
                        <a href="{{ route('orders.show', $order) }}"
                            class=" bg-blue-50 hover:bg-blue-100 block p-4 rounded-lg" wire:navigate>
                            <div class="flex space-x-4 items-start">
                                <ul class="grow">
                                    <li class="font-semibold">{{ $order->number }}</li>
                                    <li class="text-gray-600">
                                        <span class="text-sm">
                                            Placed on:
                                        </span>
                                        <span class="font-medium text-gray-800">
                                            {{ $order->created_at->format('M d, Y') }}
                                        </span>
                                    </li>
                                    <li class="">
                                        <span class="font-medium text-gray-800">
                                            ${{ number_format($order->transaction->amount, 2) }}
                                        </span>
                                        <span class="px-1"> &middot; </span>
                                        <span class="text-sm text-gray-600">
                                            {{ $order->sales->sum('quantity') }}
                                            Item{{ $order->sales->sum('quantity') > 1 ? 's' : '' }}
                                        </span>
                                    </li>
                                </ul>
                                <x-badge value="Completed" color="success" class="shrink-0 mt-1" />
                            </div>
                        </a>
                    @endforeach
                </div>
            </x-card>
        </div>

    </div>
</div>
