<x-layouts.customer>
    <div class="grid grid-cols-12 gap-4">
        <!-- Cart Items -->
        <div class="col-span-12 md:col-span-8 order-last md:order-first">
            <x-card class="space-y-4">
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Items in Cart</h2>
                </header>
                <div class="space-y-2">
                    @for ($i = 0; $i < 5; $i++) 
                    <div class="bg-gray-50 rounded-xl flex">
                        <div class="p-2 md:p-0">
                            <img src="{{ asset('images/'.rand(1, 4).'-512.png') }}"
                                class="w-24 md:w-32 lg:w-40  rounded md:rounded-none md:rounded-l-xl" alt="">
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
                                  Quantity:  {{ rand(1, 5) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </x-card>
        </div>
        <!-- Order Summary -->
        <div class="col-span-12 md:col-span-4 space-y-4">
            <!-- Shipping Address -->
            <x-card>
                <header class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Shipping address</h2>
                    <a href="#" class="text-blue-500 text-sm hover:underline">Change</a>
                </header>
                <x-address />
            </x-card>
            <!-- Checkout Summary -->
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-semibold">Checkout summary</h2>
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
                    <a href="#"
                        class="w-full block text-center bg-blue-500 text-white text-lg py-2 rounded mt-4 hover:bg-blue-600 transition-colors duration-200">
                        Make Payment
                    </a>
                </footer>
            </x-card>
        </div>
    </div>
</x-layouts.customer>