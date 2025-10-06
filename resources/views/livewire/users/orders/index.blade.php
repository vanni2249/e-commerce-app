<div>
    <div class="grid grid-cols-12 gap-4">
        <div class="hidden lg:block lg:col-span-3">
            <x-card>
                <header class="mb-6">
                    <h2 class="text-lg font-semibold">Filters</h2>
                </header>
                @include('users.orders.filters')
            </x-card>
        </div>
        <div class="col-span-12 lg:col-span-9 space-y-4">
            <x-card>
                <header class="flex justify-between item-center">
                    <h2 class="text-lg font-semibold">Your Orders</h2>
                    <div class="lg:hidden">
                        <x-icon-button wire:click="filterOrderModal" icon="filter" />
                    </div>
                </header>
            </x-card>
            <div class="space-y-2">
                @forelse ($orders as $order)
                    <a href="{{ route('orders.show', $order) }}"
                        class=" bg-white hover:shadow-lg block p-4 rounded-lg" wire:navigate>
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
                @empty
                    <x-card>
                        <p class="text-center text-gray-500">No orders found.</p>
                    </x-card>
                @endforelse
            </div>

            @if ($orders->hasPages())
                <x-card>
                    {{ $orders->links() }}
                </x-card>
                
            @endif
        </div>
    </div>

    <!-- Filter modal -->
    <x-modal name="filter-orders" title="Filter">
        @include('users.orders.filters')
    </x-modal>
</div>
