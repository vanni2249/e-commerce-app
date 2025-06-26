<x-layouts.customer>
    <div class="grid grid-cols-12 gap-4">
        @if (session()->get('cart'))
        <!-- Cart Items -->
        <div class="col-span-12 md:col-span-8">
            @livewire('users.carts.list-items')

        </div>
        <!-- Order Summary -->
        <div class="col-span-12 md:col-span-4">
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Order Summary</h2>
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
                <footer>
                    <a href="{{ route('checkout') }}"
                        class="w-full block text-center bg-blue-500 text-white text-lg py-2 rounded mt-4 hover:bg-blue-600 transition-colors duration-200">
                        Proceed to Checkout
                    </a>
                </footer>
            </x-card>
        </div>

        @else
        <div class="col-span-12">
            <x-card>
                <div class="flex items-center justify-center h-64">
                    <div class="flex items-center flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-12 h-12 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <div class="text-center text-gray-500">
                            Your cart is empty.
                        </div>
                    </div>
                </div>
            </x-card>
        </div>
        @endif
    </div>
</x-layouts.customer>