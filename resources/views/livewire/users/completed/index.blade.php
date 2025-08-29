<div>
    <div class="grid grid-cols-12 gap-4">
        <!-- Cart Items -->
        <div class="col-span-12">
            <x-card class="">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-lg font-semibold text-green-700">
                            Your order has been placed successfully!
                        </h2>
                        <p class="text-gray-600 text-sm">Thank you for your purchase. Your order is being processed and
                            will be
                            shipped soon.</p>
                    </div>
                    <div>

                        <a href="/"
                            class="inline-block bg-blue-600 text-white px-4 text-center py-2 rounded hover:bg-blue-600 transition-colors" wire:navigate>
                            Continue Shopping
                        </a>
                        <a href="{{ route('orders.show', ['order' => $order]) }}"
                            class="inline-block bg-gray-200 text-gray-800 px-4 text-center py-2 rounded hover:bg-gray-300 transition-colors ml-2" wire:navigate>
                            View Orders
                        </a>
                    </div>
                </div>
            </x-card>
        </div>
        <div class="col-span-12 md:col-span-8 order-last md:order-0">
            {{-- @livewire('users.completed.list-items', ['order' => $order]) --}}
            <x-card class="space-y-4">
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Items in order</h2>
                </header>
                <div class="space-y-2">
                    @foreach ($order->sales as $sale)
                        <div class="bg-gray-100 rounded-xl flex">
                            <div class="p-2">
                                <img src="{{ asset('images/' . rand(1, 4) . '-512.png') }}"
                                    class="w-24 md:w-32 lg:w-40  rounded-xl" alt="">
                            </div>
                            <div class="grow p-2">
                                <header class="md:flex md:justify-between items-start mb-2">
                                    <h2 class="text-gray-800 text-sm md:text-base lg:text-lg font-semibold">
                                        {{ $sale->product->item->title }}
                                    </h2>
                                    <ul class="md:text-right">
                                        <li class="text-blue-500 font-semibold text-sm md:text-base lg:text-lg">
                                            ${{ $sale->price }}
                                        </li>
                                        <li class="text-xs text-gray-500 whitespace-nowrap">
                                            @if ($sale->shipping_cost > 0)
                                                +${{ $sale->shipping_cost }} shipping
                                            @else
                                                Free
                                            @endif
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
                    @endforeach
                </div>
            </x-card>

        </div>
        <!-- Order Summary -->
        <div class="col-span-12 md:col-span-4 space-y-4">
            <x-card>
                <header class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Shipping address</h2>
                </header>
                <x-address />
                </ul>
            </x-card>
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Summary</h2>
                </header>
                <ul class="text-sm text-gray-600">
                    <li class="flex justify-between items-center py-1">
                        <span>Items in Cart</span>
                        <span class="font-bold">2</span>
                    </li>
                    <li class="flex justify-between items-center py-1">
                        <span>Subtotal</span>
                        <span>$49.98</span>
                    </li>
                    <li class="flex justify-between items-center py-1">
                        <span>Tax</span>
                        <span>$0.00</span>
                    </li>
                    <li class="flex justify-between items-center py-1">
                        <span>Total</span>
                        <span class="font-bold">$49.98</span>
                    </li>
                    <li class="flex justify-between items-center py-1">
                        <span>Discount</span>
                        <span class="text-red-600">-$5.00</span>
                    </li>
                    <li class="flex justify-between items-center py-1">
                        <span>Shipping</span>
                        <span class="text-green-600">Free</span>
                    </li>
                    <li class="flex justify-between items-center py-1 border-t border-gray-200 font-bold">
                        <span>Grand Total</span>
                        <span>$49.98</span>
                    </li>
                </ul>
            </x-card>
        </div>
    </div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
</div>
