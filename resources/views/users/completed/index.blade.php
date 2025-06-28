<x-layouts.customer>
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
                            class="inline-block bg-blue-500 text-white px-4 text-center py-2 rounded hover:bg-blue-600 transition-colors">
                            Continue Shopping
                        </a>
                        <a href="{{ route('orders.show', ['order' => $order]) }}"
                            class="inline-block bg-gray-200 text-gray-800 px-4 text-center py-2 rounded hover:bg-gray-300 transition-colors ml-2">
                            View Orders
                        </a>
                    </div>
                </div>
            </x-card>
        </div>
        <div class="col-span-12 md:col-span-8 order-last md:order-0">
            @livewire('users.completed.list-items', ['order' => $order])

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
</x-layouts.customer>
