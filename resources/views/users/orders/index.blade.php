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
                @livewire('users.orders.list-orders')
        </x-card>
    </div>

    </div>
</x-layouts.customer>